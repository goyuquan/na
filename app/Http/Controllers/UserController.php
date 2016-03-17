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


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $messages = [
            'name.required' => '角色名称不能为空',
            'name.max' => '角色名称不能大于:max位',
            'name.min' => '角色名称不能小于:min位',
            'email.required' => 'email不能为空',
            'email.unique' => 'email不能重复',
            'email.email' => 'email格式不正确',
            'password.required' => 'password不能为空',
            'password.max' => 'password不能大于:max位',
            'password.min' => 'password不能小于:min位',
            'password_confirmation.confirmed' => '密码不一致'
        ];
        $this->validate($request, [
            'name' => 'required|min:1|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'confirmed|required|min:6|max:20'
        ],$messages);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Session()->flash('user', 'user create was successful!');

        return redirect('/admin/users');
    }


    public function show($id)
    {
        //
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


        if ($request->member) {
            $later_time = $user->member ? $user->member : time();
            switch ($request->member)
                {
                    case 30: $member = ($later_time + 30*86400); break;
                    case 90: $member = ($later_time + 90*86400); break;
                    case 180: $member = ($later_time + 180*86400); break;
                    case 360: $member = ($later_time + 360*86400); break;
                    default: $member = null;
                }
            $user->member = $member;
        } else {
            if ($request->member2) {
                $user->member = strtotime($request->member2);
            }
        }

        $user->save();

        Session()->flash('status', 'User update was successful!');

        return redirect('/admin/users');
    }


    public function loginm()
    {
        return view('auth.loginm');
    }

    public function loginm_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin/users/mobile/1');
        } else {
            return "wrong";
        }
    }


    public function destroy($id)
    {
        user::destroy($id);

        return redirect('/admin/users');
    }

}
