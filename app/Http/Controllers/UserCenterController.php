<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info;
use App\Column;
use Gate;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserCenterController extends Controller
{

    public function index()
    {
        $categories = $categoriess = Category::all();
        return view('user.index',[
            'categories' => $categories,
            'categoriess' => $categoriess
        ]);
    }

    public function infos()
    {
        $infos = Auth::user()->info;
        return view('user.info.index',[
            'infos' => $infos
        ]);
    }

    public function create_category()
    {
        $categories = Category::all();
        return view('user.info.create_category',[
            'categories' => $categories
        ]);
    }

    public function create($id)
    {
        $category = Category::find($id);
        return view('user.info.create.'.$category->alias,[
            'category' => $category,
        ]);
    }

    public function create_save(Request $request)
    {
        $content = collect($request->input()) ->except(['_token', 'query_string','category_id','title','text']);

        $request->user()->info()->create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'text' => $request->text,
            'content' => $content,
        ]);

        Session()->flash('info', 'info create was successful!');

        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        $info = Info::find($id);
        $categories = $categoriess = Category::all();
        return view('user.Info.edit',[
            'info' => $info,
            'categories' => $categories,
            'categoriess' => $categoriess
        ]);
    }

    public function update(Request $request,$id)
    {
        $messages = [
            'title.required' => '标题不能为空',
            'title.max' => '标题不能大于:max位',
            'title.min' => '标题不能小于:min位',
            'text.required' => '内容不能为空',
            'text.max' => '内容不能大于:max位',
            'text.min' => '内容不能小于:min位',
        ];
        $this->validate($request, [
            'title' => 'required|min:5|max:50',
            'text' => 'required|min:10|max:1000',
        ],$messages);

        $info = Info::find($id);

        if (Gate::allows('info_authorize', $info)) {

            if ($info->name != $request->name){
                $info->name = $request->name;
            }
            if ($info->parent_id && $info->parent_id != $request->parent){
                $info->parent_id = $request->parent;
            }
            $info->save();

            Session()->flash('category', 'category update was successful!');

            return redirect('/user/infos');

        } else {
            return "无权编辑！";
        }

    }

    public function destroy($id)
    {
        $info = Info::find($id);
        if (Gate::allows('info_authorize', $info)) {
            Info::destroy($id);
            return redirect('/user/infos');
        } else {
            return "无权删除！";
        }
    }

}
