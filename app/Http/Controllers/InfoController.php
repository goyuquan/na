<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info;
use App\Column;
use Gate;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{

    public function index()
    {
        $categories = $categoriess = Category::all();
        return view('info.index',[
            'categories' => $categories,
            'categoriess' => $categoriess
        ]);
    }

    public function create_category()
    {
        $categories = Category::all();
        return view('info.create_category',[
            'categories' => $categories
        ]);
    }

    public function create($id)
    {
        $category = Category::find($id);
        return view('info.create.'.$category->alias,[
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
        $categories = $categoriess = Category::all();
        $name = Category::find($id);
        return view('admin.category.edit',[
            'name' => $name,
            'categories' => $categories,
            'categoriess' => $categoriess
        ]);
    }

    public function update(Request $request,$id)
    {
        $messages = [
            'name.required' => '名不能为空',
            'name.max' => '名不能大于:max位',
            'name.min' => '名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|min:1|max:20',
        ],$messages);

        $info = Info::find($id);

        if (Gate::denies('album_authorize', $info)) {
            return "authorize fails";
        }

        if ($info->name != $request->name){
            $info->name = $request->name;
        }
        if ($info->parent_id && $info->parent_id != $request->parent){
            $info->parent_id = $request->parent;
        }
        $info->save();

        Session()->flash('category', 'category update was successful!');

        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        Info::destroy($id);
        return redirect('/admin/categories');
    }

}
