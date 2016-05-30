<?php

namespace App\Http\Controllers;

use App\Page;
use App\Category;
use App\Info;
use View;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function pages($page)
    {
        $page = Page::find($page);
        $items = $page->info()->paginate(20);

        $categories = Category::where('parent_id',0)->get(['id','name']);
        for ($i=0; $i < count($categories) ; $i++) {
            $data = Category::where( 'parent_id',$categories[$i]->id )->get(['id','name']);
            if ( !$data->isEmpty() ){
                $type[$i] = Category::where('parent_id',$categories[$i]->id)->get(['id','name']);
            }
        }

        $data = [
            'page' => $page,
            'items' => $items,
            'categories' => $categories,
            'type' => $type
        ];
        if(View::exists('page.'.$page->alias)){
            return view('page.'.$page->alias,$data);
        } else {
            return view('page.common',$data);
        }

    }

    public function show($id)
    {
        $item = Info::find($id);
        $page = $item->page;
        $content = json_decode($item->content);

        $categories = Category::where('parent_id',0)->get(['id','name']);
        for ($i=0; $i < count($categories) ; $i++) {
            $data = Category::where( 'parent_id',$categories[$i]->id )->get(['id','name']);
            if ( !$data->isEmpty() ){
                $type[$i] = Category::where('parent_id',$categories[$i]->id)->get(['id','name']);
            }
        }

        $data = [
            'item' => $item,
            'page' => $page,
            'content' => $content,
            'categories' => $categories,
            'type' => $type
        ]
        if(View::exists('page.show.'.$page->alias)){
            return view('page.show.'.$page->alias,$data);
        } else {
            return view('page.show.common',$data);
        }

    }

    public function index()
    {
        $pages = Page::where('parent_id','>',0)->get();
        $pagess = Page::where('parent_id',0)->orderBy('id','desc')->get();
        return view('admin.page.index',[
            'pagess' => $pagess,
            'pages' => $pages
        ]);
    }

    public function create(Request $request)
    {

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
