<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info;
use App\Column;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{

    public function index()
    {
        $info = Info::find(2);
        $contents = collect(json_decode($info->content))->except(['_token', 'query_string']);
        return view('info.index',[
            'info' => $info,
            'contents' => $contents,
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
        $content = collect($request->input());

        $info = new Info;
        $info->title = $request->title;
        $info->content = $content;
        $info->save();

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
            'name.required' => '分类名不能为空',
            'name.max' => '分类名不能大于:max位',
            'name.min' => '分类名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|min:1|max:20',
        ],$messages);

        $category = Category::find($id);
        if ($category->name != $request->name){
            $category->name = $request->name;
        }
        if ($category->parent_id && $category->parent_id != $request->parent){
            $category->parent_id = $request->parent;
        }
        $category->save();

        Session()->flash('category', 'category update was successful!');

        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/admin/categories');
    }

}
