<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdmincategoryController extends Controller
{

    public function index($id=1)
    {
        $users = User::orderBy('id', 'desc')
        ->paginate($perPage = 20, $columns = ['*'], $pageName = 'page', $page = $id);
        return view('admin.user.index',['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function update(Request $request,$id)
    {
        $messages = [
            'name.required' => '用户名不能为空',
            'name.max' => '用户名不能大于:max位',
            'name.min' => '用户名不能小于:min位',
            'email.email' => 'email格式不正确',
            'email.max' => 'email不能超过:max位',
            'phone.required' => '手机号不能为空',
            'phone.min' => '手机号长度不正确',
            'phone.max' => '手机号长度不正确',
            'password.max' => 'password不能大于:max位',
            'password.min' => 'password不能小于:min位',
            'password.confirmed' => '密码不一致'
        ];
        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'email' => 'email|max:50',
            'phone' => 'required|min:11|max:11',
            'password' => 'confirmed|min:6|max:50'
        ],$messages);

        $user = User::find($id);
        if ($user->name != $request->name){
            $user->name = $request->name;
        }
        if ($user->email && $user->email != $request->email){
            $user->email = $request->email;
        }
        if ($user->phone != $request->phone){
            $user->phone = $request->phone;
        }
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        Session()->flash('user', 'user update was successful!');

        return redirect('/admin/users/');
    }

    public function destroy($id)
    {
        user::destroy($id);
        return redirect('/admin/users/');
    }

}
