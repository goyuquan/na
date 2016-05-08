<?php

namespace App\Http\Controllers;

use App\Page;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::where('parent_id','>',0)->get();
        $pagess = Page::where('parent_id',0)->get();
        return view('admin.page.index',[
            'pagess' => $pagess,
            'pages' => $pages
        ]);
    }

    public function create(Request $request)
    {
        $messages = [
            'name.required' => '页面名不能为空',
            'name.unique' => '页面名已被使用',
            'name.max' => '页面名不能大于:max位',
            'name.min' => '页面名不能小于:min位',
            'alias.required' => '别名不能为空',
            'alias.max' => '别名不能大于:max位',
            'alias.min' => '别名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|unique:pages|min:1|max:20',
            'alias' => 'required|min:2|max:50',
        ],$messages);
        return dd($request->name);

        $page = new Page;

        $page->name = $request->name;
        $page->alias = $request->alias;
        $page->parent_id = $request->parent;
        $page->save();

        Session()->flash('page', 'page create was successful!');

        return redirect('/admin/pages');
    }

    public function edit($id)
    {
        $pagess = Page::where('parent_id',0)->get();
        $pages = Page::where('parent_id','>',0)->get();
        $name = Page::find($id);
        return view('admin.page.edit',[
            'name' => $name,
            'pagess' => $pagess,
            'pages' => $pages
        ]);
    }

    public function update(Request $request,$id)
    {
        $messages = [
            'name.required' => '页面名不能为空',
            'name.max' => '页面名不能大于:max位',
            'name.min' => '页面名不能小于:min位',
            'alias.required' => '别名不能为空',
            'alias.max' => '别名不能大于:max位',
            'alias.min' => '别名不能小于:min位',
        ];
        $this->validate($request, [
            'name' => 'required|min:1|max:20',
            'alias' => 'required|min:1|max:20',
        ],$messages);

        $page = Page::find($id);
        if ($page->name != $request->name){
            $page->name = $request->name;
        }
        if ($page->alias != $request->alias){
            $page->alias = $request->alias;
        }
        if ($page->parent_id && $page->parent_id != $request->parent){
            $page->parent_id = $request->parent;
        }
        $page->save();

        Session()->flash('page', 'page update was successful!');

        return redirect('/admin/pages');
    }

    public function destroy($id)
    {
        Page::destroy($id);
        return redirect('/admin/pages');
    }

}
