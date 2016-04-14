<?php

namespace App\Http\Controllers;

use App\Info;
use App\Img;
use Image;
use File;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{

    public function home()
    {
        return view('home');
    }


    public function search_push(Request $request)
    {
        $word = $request->word;

        if ($word){
            return redirect('search/'.$word);
        }
    }


    public function search($word)
    {
        $results = Info::where('title', 'LIKE', '%'. $word .'%')
        ->orWhere('text', 'LIKE', '%'. $word .'%')
        ->orWhere('content', 'LIKE', '%'. $word .'%')
        ->paginate(10);

        return view('search',[
            'results' => $results
        ]);
    }


    public function thumbnail(Request $request)
    {
        if ($request->hasFile('thumbnail'))//文件是否上传
        {
            $messages = [
                'thumbnail.image' => '上传文件必须是图片',
                'thumbnail.max' => '上传文件不能大于:maxkb',
            ];
            $this->validate($request, [
                'thumbnail' => 'image|max:1000'//kilobytes
            ],$messages);
            if ($request->file('thumbnail')->isValid())//上传文件是否有效
            {
                $OriginalName = $request->file('thumbnail')->getClientOriginalName();
                $file_pre = sha1(time().$OriginalName);//取得当前时间戳
                $file_suffix = substr(strchr($request->file('thumbnail')->getMimeType(),"/"),1);//取得文件后缀
                $destinationPath = 'uploads';//上传路径
                $fileName = $file_pre.'.'.$file_suffix;//上传文件名
                Image::make($request->file('thumbnail'))//生成缩略图
                                    ->resize(100, null, function ($constraint) { $constraint->aspectRatio(); })
                                    ->save('uploads/thumbnails/'.$fileName);
                Session()->flash('img',$fileName);
                return $fileName;
            } else {
                return "上传缩略图无效！";
            }
        } else {
            return "缩略图上传失败！";
        }
    }

    public function thumbnail_($id,$url)
    {
        // File::delete(['uploads/thumbnails/'.$url]);
        $page = Info::find($id);
        $content = collect(json_decode($page->content,true));
        $content->forget('thumbnail');
        $page->content = $content->toJson();
        $page->update();

        return "thumbnail was deleted.";
    }

    public function photos(Request $request,$id)
    {
        if ($request->hasFile('file'))//文件是否上传
        {
            if ($request->file('file')->isValid())//上传文件是否有效
            {
                $OriginalName = $request->file('file')->getClientOriginalName();
                $file_pre = sha1(time().$OriginalName);//取得当前时间戳
                $file_suffix = substr(strchr($request->file('file')->getMimeType(),"/"),1);//取得文件后缀
                $destinationPath = 'uploads';//上传路径
                $fileName = $file_pre.'.'.$file_suffix;//上传文件名
                Image::make($request->file('file'))//生成缩略图
                ->resize(100, null, function ($constraint) { $constraint->aspectRatio(); })
                ->save('uploads/thumbnails/'.$fileName);
                $request->file('file')->move($destinationPath, $fileName);
                $img = new Img;
                $img->name = $fileName;
                $img->label = $id;
                $img->save();
                Session()->flash('img',$fileName);
                return $fileName;
            } else {
                return "上传图片无效！";
            }
        } else {
            return "图片上传失败！";
        }
    }
}
