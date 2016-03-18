<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = $categoriess = Category::all();
        return view('admin.category.index',[
            'categories' => $categories,
            'categoriess' => $categoriess
        ]);
    }

    public function create(Request $request)
    {
        $messages = [
            'name.required' => '分类名不能为空',
            'name.unique' => '分类名已被使用',
            'name.max' => '分类名不能大于:max位',
            'name.min' => '分类名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|unique:categories|min:1|max:20',
        ],$messages);

        $category = new Category;

        $category->name = $request->name;
        $category->parent_id = $request->parent;
        $category->save();

        Session()->flash('category', 'category create was successful!');

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
