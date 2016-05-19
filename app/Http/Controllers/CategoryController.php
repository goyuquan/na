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
        $categoriess = Category::where('parent_id',0)->get();
        $categories = Category::where('parent_id','>',0)->get();
        return view('admin.category.index',[
            'categoriess' => $categoriess,
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $messages = [
            'name.required' => '分类名不能为空',
            'name.max' => '分类名不能大于:max位',
            'name.min' => '分类名不能小于:min位',
            'alias.unique' => '别名已被使用',
            'alias.required' => '别名不能为空',
            'alias.max' => '别名不能大于:max位',
            'alias.min' => '别名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|min:1|max:20',
            'alias' => 'required|min:2|max:50',
        ],$messages);

        $category = new Category;

        $category->name = $request->name;
        $category->alias = $request->alias;
        $category->parent_id = $request->parent;
        $category->save();

        Session()->flash('category', 'category create was successful!');

        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        $categoriess = Category::where('parent_id',0)->get();
        $categories = Category::where('parent_id','>',0)->get();
        $name = Category::find($id);
        return view('admin.category.edit',[
            'name' => $name,
            'categoriess' => $categoriess,
            'categories' => $categories
        ]);
    }

    public function update(Request $request,$id)
    {
        $messages = [
            'name.required' => '分类名不能为空',
            'name.max' => '分类名不能大于:max位',
            'name.min' => '分类名不能小于:min位',
            'alias.required' => '别名不能为空',
            'alias.max' => '别名不能大于:max位',
            'alias.min' => '别名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|min:1|max:20',
            'alias' => 'required|min:1|max:20',
        ],$messages);

        $category = Category::find($id);
        if ($category->name != $request->name){
            $category->name = $request->name;
        }
        if ($category->alias != $request->alias){
            $category->alias = $request->alias;
        }

        if ($category->parent_id != $request->parent){
            $category->parent_id = $request->parent;
        }
        $category->update();

        Session()->flash('category', 'category update was successful!');

        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/admin/categories');
    }

}
