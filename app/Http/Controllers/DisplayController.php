<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Display;
use App\Album;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DisplayController extends Controller
{
    public function __construct()
    {

    }


    public function index()
    {
        $displays = $displayss = Display::all();
        return view('admin.displays.index', [
            "displays" => $displays,
            "displayss" => $displayss
        ]);
    }


    public function store(Request $request)
    {
        $request->parent_id = empty($request->parent_id)?1:$request->parent_id;

        $messages = [
            'name.required' => '分类名不能为空',
        ];
        $this->validate($request, [
            'name' => 'required',
        ],$messages);

        Display::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        Session()->flash('status', 'display create was successful!');

        return redirect('/admin/display');
    }

    public function banner()
    {
        $banners = Album::where("display_id",2)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('admin.displays.banner', [
            "banners" => $banners
        ]);
    }


}
