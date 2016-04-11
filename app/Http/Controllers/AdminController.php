<?php

namespace App\Http\Controllers;

use App\Img;
use Image;
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
                // $request->file('thumbnail')->move($destinationPath, $fileName);
                Session()->flash('img',$fileName);
                return $fileName;
            } else {
                return "上传文件无效！";
            }
        } else {
            return "文件上传失败！";
        }
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
