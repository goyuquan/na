<?php

namespace App\Http\Controllers;

use Image;
use App\Img;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function thumbnail(Request $request)
    {
        if ($request->hasFile('thumbnail_file'))//文件是否上传
        {
            $messages = [
                'photo.image' => '上传文件必须是图片',
                'photo.max' => '上传文件不能大于:maxkb',
            ];
            $this->validate($request, [
                'photo' => 'image|max:100000'//kilobytes
            ],$messages);

            if ($request->file('thumbnail_file')->isValid())//上传文件是否有效
            {
                $OriginalName = $request->file('thumbnail_file')->getClientOriginalName();
                $file_pre = sha1(time().$OriginalName);//取得当前时间戳
                $file_suffix = substr(strchr($request->file('thumbnail_file')->getMimeType(),"/"),1);//取得文件后缀
                $destinationPath = 'uploads';//上传路径
                $fileName = $file_pre.'.'.$file_suffix;//上传文件名

                Image::make($request->file('thumbnail_file'))//生成缩略图
                                    ->resize(300, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    })
                                    ->save('uploads/thumbnails/'.$fileName);

                $request->file('thumbnail_file')->move($destinationPath, $fileName);

                $img = new Img;
                $img->name = $fileName;
                $img->save();

                Session()->flash('img',$fileName);

                return $fileName;
            } else {
                return "上传文件无效！";
            }
        } else {
            return "文件上传失败！";
        }
    }



    public function thumbnail2(Request $request)
    {
        if ($request->hasFile('thumbnail_file2'))//文件是否上传
        {
            $messages = [
                'photo.image' => '上传文件必须是图片',
                'photo.max' => '上传文件不能大于:maxkb',
            ];
            $this->validate($request, [
                'photo' => 'image|max:100000'//kilobytes
            ],$messages);

            if ($request->file('thumbnail_file2')->isValid())//上传文件是否有效
            {
                $OriginalName = $request->file('thumbnail_file2')->getClientOriginalName();
                $file_pre = sha1(time().$OriginalName);//取得当前时间戳
                $file_suffix = substr(strchr($request->file('thumbnail_file2')->getMimeType(),"/"),1);//取得文件后缀
                $destinationPath = 'uploads';//上传路径
                $fileName = $file_pre.'.'.$file_suffix;//上传文件名

                Image::make($request->file('thumbnail_file2'))//生成缩略图
                                    ->resize(300, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    })
                                    ->save('uploads/thumbnails/'.$fileName);

                $request->file('thumbnail_file2')->move($destinationPath, $fileName);

                $img = new Img;
                $img->name = $fileName;
                $img->save();

                Session()->flash('img2',$fileName);

                return $fileName;
            } else {
                return "上传文件无效！";
            }
        } else {
            return "文件上传失败！";
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
