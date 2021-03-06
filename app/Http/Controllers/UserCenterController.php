<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info;
use App\Column;
use App\Img;
use App\User;
use Gate;
use Auth;
use View;
use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserCenterController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('user.index',[
            'user' => $user
        ]);
    }

    public function infos()
    {
        $user = Auth::user();
        if($user->role > 4){
            $infos = Info::where('page_id',0)->orderBy('publish_at', 'desc')
            ->paginate(20);
        } else {
            $infos = $user->info()->where('page_id',0)->orderBy('publish_at', 'desc')
            ->paginate(20);
        }
        return view('user.info.index',[
            'infos' => $infos,
            'user' => $user
        ]);
    }

    public function create_category()
    {
        $categories = Category::where('parent_id',0)->get();

        for ($i=0; $i < count($categories) ; $i++) {
            $data = Category::where( 'parent_id',$categories[$i]->id )->get(['id']);
            if ( !$data->isEmpty() ){
                $type[$i] = Category::where('parent_id',$categories[$i]->id)->get(['id','name']);
            }
        }

        return view('user.info.create_category',[
            'categories' => $categories,
            'type' => $type
        ]);
    }

    public function create($id)
    {
        $category = Category::find($id);
        $folder = Category::find($category->parent_id);
        if(View::exists('user.info.create.'.$folder->alias.'.'.$category->alias)){
            return view('user.info.create.'.$folder->alias.'.'.$category->alias,[
                'category' => $category,
            ]);
        } else {
            return view('user.info.create.common',[
                'category' => $category,
            ]);
        }
    }

    public function _create(Request $request)
    {
        $messages = [
            'title.required' => '标题不能为空',
            'title.max' => '标题不能大于:max位',
            'title.min' => '标题不能小于:min位',
            'text.required' => '内容不能为空',
            'text.max' => '内容不能大于:max位',
            'text.min' => '内容不能小于:min位',
        ];
        $this->validate($request, [
            'title' => 'required|min:2|max:30',
            'text' => 'required|min:10|max:1000',
        ],$messages);

        $content = collect($request->input())->except(['_token', 'query_string','category_id','title','text','publish_at']);
        $publish_at = $request->publish_at ? $request->publish_at : date("Y-m-d H:i:s",time()+8*60*60);

        $request->user()->info()->create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'text' => $request->text,
            'content' => $content,
            'publish_at' => $publish_at,
        ]);

        Session()->flash('info', '信息发布成功!');

        return redirect('/user/infos');

        return view('common.infomation');
    }

    public function edit($id)
    {
        $info = Info::find($id);
        $user = Auth::user();
        if (Gate::allows('info_authorize', $info) || $user->role > 4) {
            $category = $info->category;
            $content = json_decode($info->content);
            $photos = NULL;
            if (isset($content->photos_sha1)) {
                $photos = Img::where('label',$content->photos_sha1)->get(['name']);
            }
            $folder = Category::find($category->parent_id);

            $data = [
                'info' => $info,
                'content' => $content,
                'category' => $category,
                'photos' => $photos
            ];
            
            if(View::exists('user.info.edit.'.$folder->alias.'.'.$category->alias)){
                return view('user.info.edit.'.$folder->alias.'.'.$category->alias,$data);
            } else {
                return view('user.Info.edit.common',$data);
            }
        } else {
            return view('common.info_authorize',['info' => "无权编辑!"]);
        }
    }


    public function edit_userdata()
    {
        $user = Auth::User();

        return view('user.userdata.edit',['user' => $user]);
    }


    public function update_userdata(Request $request, $id)
    {
        $messages = [
            'email.email' => 'email格式不正确',
            'email.required' => '请输入email',
            'phone.required' => '请填写手机号',
            'password.max' => '密码不能大于:max位',
            'password.min' => '密码不能小于:min位',
            'password.confirmed' => '两次密码不一致'
        ];
        $this->validate($request, [
            'email' => 'email|required',
            'phone' => 'required',
            'password' => 'confirmed|min:6|max:50',
        ],$messages);

        $user = User::find($id);

        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return view('user.index',['user' => $user]);
    }


    public function update(Request $request,$id)
    {
        $messages = [
            'title.required' => '标题不能为空',
            'title.max' => '标题不能大于:max位',
            'title.min' => '标题不能小于:min位',
            'text.required' => '内容不能为空',
            'text.max' => '内容不能大于:max位',
            'text.min' => '内容不能小于:min位',
        ];
        $this->validate($request, [
            'title' => 'required|min:2|max:30',
            'text' => 'required|min:10|max:1000',
        ],$messages);

        $content = collect($request->input())->except(['_token', 'query_string','category_id','title','text','publish_at']);

        $info = Info::find($id);

        if (Gate::allows('info_authorize', $info)) {
            if ($info->title != $request->title){
                $info->title = $request->title;
            }
            if ($info->text != $request->text){
                $info->text = $request->text;
            }
            if ($info->content != $content){
                $info->content = $content;
            }
            $info->update();

            Session()->flash('info', 'info update was successful!');

            return redirect('/user/infos');
        } else {
            return view('common.info_authorize',['info' => "无权编辑!"]);
        }

    }


    public function refresh($id)
    {
        $info = Info::find($id);
        if (Gate::allows('info_authorize', $info)) {
            $publish_at = date("Y-m-d H:i:s",time()+8*60*60);
            $info->publish_at = $publish_at;
            $info->update();
            Session()->flash('info', 'info refresh was successful!');
            return redirect('/user/infos');
        } else {
            return view('common.info_authorize',['info' => "无权刷新!"]);
        }
    }


    public function destroy($id)
    {
        $info = Info::find($id);
        if (Gate::allows('info_authorize', $info)) {
            $content = json_decode($info->content);
            if (isset($content->thumbnail)) {
                $url = $content->thumbnail;
                File::delete(['uploads/thumbnails/'.$url]);
            }

            if(isset($content->photos_sha1)) {
                $photo = $content->photos_sha1;
                File::delete(['uploads/'.$photo]);
                Img::where('label',$photo)->delete();
            }
            Info::destroy($id);
            return redirect('/user/infos');
        } else {
            return view('common.info_authorize',['info' => "无权删除!"]);
        }
    }

}
