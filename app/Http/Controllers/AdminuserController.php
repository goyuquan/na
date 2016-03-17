<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminuserController extends Controller
{
    public function index($id=1)
    {
        $users = User::orderBy('id', 'desc')
        ->paginate($perPage = 1, $columns = ['*'], $pageName = 'page', $page = $id);
        return view('admin.users.index',['users' => $users]);
    }

    public function destroy($id)
    {
        user::destroy($id);
        return redirect('/admin/users');
    }

}
