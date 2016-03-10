<?php

namespace App\Http\Controllers;

use App\Video;
use App\Img;
use App\Display;
use Image;
use File;
use Gate;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{

    public function index($id = 1)
    {
        $videos = Video::orderBy('id', 'desc')
        ->paginate($perPage = 20, $columns = ['*'], $pageName = 'page', $page = $id);
        return view('admin.video.index',['videos' => $videos]);
    }


    public function videos($id = 1)
    {
        $videos = Video::orderBy('id', 'desc')
        ->paginate($perPage = 20, $columns = ['*'], $pageName = 'page', $page = $id);
        return view('video.index',['videos' => $videos]);
    }


    public function page($id)
    {
        $video = Video::find($id);
        return view('video.page',['video' => $video]);
    }


    public function create()
    {
        $displays = $displayss = Display::all();
        return view('admin.video.create',[
            "displays" => $displays,
            "displayss" => $displayss
        ]);
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => '标题不能为空',
            'title.unique' => '标题不能重复',
            'title.max' => '标题不能大于:max位',
            'title.min' => '标题不能小于:min位',
            'published_at.required' => '发布时间不能为空',
        ];
        $this->validate($request, [
            'title' => 'required|min:2|max:255',
            'published_at' => 'required',
        ],$messages);

        $request->user()->video()->create([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'thumbnail2' => $request->thumbnail2,
            'display_id' => $request->display,
            'content' => $request->content,
            'video' => $request->video,
            'free' => $request->free,
            'published_at' => $request->published_at,
        ]);

        Session()->flash('status', 'video create was successful!');

        return redirect('/admin/videos/');
    }


    public function edit($id)
    {
        $video = Video::find($id);
        $displays = $displayss = Display::all();

        return view('admin.video.edit',[
            'video'=>$video,
            "displays" => $displays,
            "displayss" => $displayss
        ]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        if (Gate::denies('video_authorize', $video)) {
            return "authorize fails";
        }

        $messages = [
            'title.required' => '标题不能为空',
            'title.max' => '标题不能小于:max位',
            'title.min' => '标题不能小于:min位',
        ];
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
        ],$messages);

        $video = Video::find($id);
        $video->title = $request->title;
        $video->content = $request->content;
        $video->display_id = $request->display;
        $video->thumbnail = $request->thumbnail;
        $video->thumbnail2 = $request->thumbnail;
        $video->video = $request->video;
        $video->free = $request->free;
        $video->published_at = $request->published_at;
        $video->save();

        Session()->flash('status', 'video update was successful!');

        return redirect('/admin/videos/');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        if (Gate::denies('video_authorize', $video)) {
            return "authorize fails";
        }

        File::delete('videos/'.$video->video);
        File::delete('uploads/thumbnails/'.$video->thumbnail);
        File::delete('uploads/'.$video->thumbnail);
        File::delete('uploads/thumbnails/'.$video->thumbnail2);
        File::delete('uploads/'.$video->thumbnail2);

        Video::destroy($id);

        return redirect('/admin/videos/');
    }


    public function uploadstore(Request $request)
    {
        if ($request->hasFile('file'))//文件是否上传
        {
            if ($request->file('file')->isValid())//上传文件是否有效
            {
                $OriginalName = $request->file('file')->getClientOriginalName();
                $file_pre = sha1(time().$OriginalName);//取得当前时间戳
                $file_suffix = substr(strchr($request->file('file')->getMimeType(),"/"),1);//取得文件后缀

                $mine_type  = array(
                    'mp4' => 'mp4',
                    'x-msvideo' => 'avi',
                    'msvideo' => 'avi',
                    'avi' => 'avi',
                    'x-troff-msvideo' => 'avi'
                 );

                $destinationPath = 'videos';//上传路径
                $fileName = $file_pre.'.'.$mine_type[$file_suffix];//上传文件名

                $request->file('file')->move($destinationPath, $fileName);

                // return $request->file('file')->getClientOriginalName();
                Session()->flash('video',$fileName);

                return $fileName;
            } else {
                return "视频文件无效！";
            }
        } else {
            return "视频上传失败！";
        }
    }


}
