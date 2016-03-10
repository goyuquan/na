<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',['users' => $users]);
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

        if ($request->member) {
            switch ($request->member)
                {
                    case 30: $member = (time() + 30*86400); break;
                    case 90: $member = (time() + 90*86400); break;
                    case 180: $member = (time() + 180*86400); break;
                    case 360: $member = (time() + 360*86400); break;
                    default: $member = null;
                }
            $user->member = $member;
        }


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

    public function index_mobile($id = 1)
    {
        $users = User::orderBy('id', 'desc')
        ->paginate($perPage = 20, $columns = ['*'], $pageName = 'page', $page = $id);
        return view('admin.mobile.users',['users' => $users]);
    }

    public function mobile_search()
    {
        return view('admin.mobile.search');
    }

    public function mobile_search_post(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if ($user) {
            $email = $user;
        } else {
            $email = null;
        }
        return view('admin.mobile.search_result',['user' => $email]);
    }

    public function mobile_edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.mobile.edit',['user' => $user]);
    }

    public function mobile_update(Request $request, $id)
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

        return redirect('/admin/users/mobile/');
    }

    public function destroy($id)
    {
        user::destroy($id);

        return redirect('/admin/users');
    }

}
