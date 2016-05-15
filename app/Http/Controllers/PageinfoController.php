<?php

namespace App\Http\Controllers;

use App\Page;
use App\Info;
use View;
use Auth;
use Gate;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageinfoController extends Controller
{


    public function index($id)
    {
        $page = Page::find($id);
        $pageinfos = $page->info()->orderBy('id','desc')->paginate(20);

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
        $page_ = Page::find($page);

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

            return redirect('/admin/pageinfo/'.$page_->id );
        }
    }


    public function edit($id)
    {
        $pageinfo = Info::find($id);
        $page = $pageinfo->page;
        $content = json_decode($pageinfo->content);
        if(View::exists('admin.pageinfo.edit.'.$page->alias)){
            return view('admin.pageinfo.edit.'.$page->alias,[
                'pageinfo' => $pageinfo ,
                'page' => $page,
                'content' => $content
            ]);
        } else {
            return view('admin.pageinfo.edit.common',[
                'pageinfo' => $pageinfo,
                'page' => $page,
                'content' => $content
             ]);
        }
    }


    public function update(Request $request,$id)
    {

        $content = collect($request->input())->except(['_token', 'query_string','category_id','title','text','publish_at']);

        $info = Info::find($id);

        if (Gate::allows('info_authorize', $info) || Auth::user()->role > 5) {
            if ($info->title != $request->title){
                $info->title = $request->title;
            }
            if ($info->text != $request->text){
                $info->text = $request->text;
            }
            if ($info->content != $content){
                $info->content = $content;
            }
            if ($info->publish_at != $request->publish_at){
                $info->publish_at = $request->publish_at;
            }
            $info->update();

            Session()->flash('pageinfo', 'pageinfo update was successful!');
            return redirect('/admin/pageinfo/'.$info->page_id );
        } else {
            return view('common.info_authorize',['info' => "无权编辑!"]);
        }

    }


    public function destroy($id)
    {
        $info = Info::find($id);
        if (Gate::allows('info_authorize', $info)) {
            Info::destroy($id);
            return redirect('/admin/pageinfo/'.$info->page_id );
        } else {
            return view('common.info_authorize',['info' => "无权删除!"]);
        }
    }

}
