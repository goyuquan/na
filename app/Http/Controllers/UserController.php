<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',['users' => $users]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function _register(Request $request)
    {
        $messages = [
            'name.required' => '用户名不能为空',
            'name.max' => '用户名不能大于:max位',
            'name.min' => '用户名不能小于:min位',
            'email.email' => 'email格式不正确',
            'email.unique' => 'email不能重复',
            'email.max' => 'email不能超过:max位',
            'phone.required' => '手机号不能为空',
            'phone.min' => '手机号长度不正确',
            'phone.max' => '手机号长度不正确',
            'password.required' => 'password不能为空',
            'password.max' => 'password不能大于:max位',
            'password.min' => 'password不能小于:min位',
            'password.confirmed' => '密码不一致'
        ];
        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'email' => 'email|unique:users|max:50',
            'phone' => 'required|min:11|max:11',
            'password' => 'confirmed|required|min:6|max:50'
        ],$messages);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        Session()->flash('user', 'user create was successful!');

        return redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function _login(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect('/');
        } else {
            return "wrong";
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('/admin/users/edit',['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $messages = [
            'password.max' => '密码不能大于:max位',
            'password.min' => '密码不能小于:min位',
            'password.confirmed' => '密码不一致'
        ];
        $this->validate($request, [
            'password' => 'confirmed|min:6|max:20'
        ],$messages);

        $user = User::findOrFail($id);
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        Session()->flash('status', 'User update was successful!');

        return redirect('/admin/users');
    }



    public function destroy($id)
    {
        user::destroy($id);

        return redirect('/admin/users');
    }

}
