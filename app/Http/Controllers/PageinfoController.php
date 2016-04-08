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
            $request->user()->info()->create([
                'title' => $request->title,
                'text' => $request->text,
                'page_id' => $page,
                'content' => $content,
                'publish_at' => $request->publish_at,
                ]);

            Session()->flash('pageinfo', 'pageinfo create was successful!');

            return redirect('/admin/pages');
        }
    }


    public function edit($id)
    {
        $pageinfo = Info::find($id);
        $page = $pageinfo->page;
        if(View::exists('user.info.edit.'.$page->alias)){
            return view('user.info.edit.'.$page->alias,[ 'pageinfo' => $pageinfo ]);
        } else {
            return view('user.info.edit.common',[ 'pageinfo' => $pageinfo ]);
        }

    }

}
