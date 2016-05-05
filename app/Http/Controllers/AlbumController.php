<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{

    public function create()
    {
        return view('admin.album.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => '标题不能为空',
            'title.unique' => '标题不能重复',
            'title.max' => '标题不能大于:max位',
            'title.min' => '标题不能小于:min位',
            'published_at.required' => '发布时间不能为空',
        ];
        $this->validate($request, [
            'title' => 'required|min:2|max:255',
            'published_at' => 'required',
        ],$messages);

        $request->user()->album()->create([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'thumbnail2' => $request->thumbnail2,
            'display_id' => $request->display,
            'content' => $request->content,
            'free' => $request->free,
            'published_at' => $request->published_at,
        ]);

        Session()->flash('status', 'Album create was successful!');

        return redirect('/admin/albums/');
    }

}
