<?php

namespace App\Http\Controllers;

use App\Page;
use App\Info;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageinfoController extends Controller
{


    public function index($id)
    {
        $page = Page::find($id);
        $pageinfos = $page->info;

        return view('admin.pageinfo.index',[
            'page' => $page,
            'pageinfos' => $pageinfos
        ]);
    }


    public function create($page)
    {
        $page = Page::find($page);
        if(View::exists('admin.pageinfo.create.'.$page->alias)){
            return view('admin.pageinfo.create.'.$page->alias,[
                'page' => $page
            ]);
        } else {
            return view('admin.pageinfo.create..common',[
                'page' => $page
            ]);
        }
    }


    public function _create(Request $request,$page)
    {
        $content = collect($request->input())->except(['_token', 'query_string','title','text','publish_at']);
        $publish_at = $request->publish_at ? $request->publish_at : date("Y-m-d H:i:s",time()+8*60*60);

        if(Auth::user()->role > 1)
        {
            $pageinfo = new Info;
            $pageinfo->title = $request->title;
            $pageinfo->text = $request->text;
            $pageinfo->page_id = $page;
            $pageinfo->publish_at = $request->publish_at;
            $pageinfo->content = $content;
            $pageinfo->save();

            Session()->flash('pageinfo', 'pageinfo create was successful!');

            return redirect('/admin/pages');
        }
    }

}
