<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info;
use App\Column;
use Gate;
use Auth;
use View;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserCenterController extends Controller
{

    public function index()
    {
        return view('user.index');
    }

    public function infos($page_id)
    {
        $infos = Auth::user()->info()->orderBy('publish_at', 'desc')
        ->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page = $page_id);
        return view('user.info.index',[
            'infos' => $infos
        ]);
    }

    public function create_category()
    {
        $categoriess = Category::where('parent_id',0)->get();
        $categories = Category::where('parent_id','>',0)->get();
        return view('user.info.create_category',[
            'categoriess' => $categoriess,
            'categories' => $categories
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

    public function create_save(Request $request)
    {
        $content = collect($request->input()) ->except(['_token', 'query_string','category_id','title','text','publish_at']);
        $publish_at = $request->publish_at ? $request->publish_at : date("Y-m-d H:i:s",time()+8*60*60);

        $request->user()->info()->create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'text' => $request->text,
            'content' => $content,
            'publish_at' => $publish_at,
        ]);

        Session()->flash('info', 'info create was successful!');

        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        $info = Info::find($id);
        $categories = $categoriess = Category::all();
        return view('user.Info.edit',[
            'info' => $info,
            'categories' => $categories,
            'categoriess' => $categoriess
        ]);
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
            'title' => 'required|min:5|max:50',
            'text' => 'required|min:10|max:1000',
        ],$messages);

        $info = Info::find($id);

        if (Gate::allows('info_authorize', $info)) {

            if ($info->name != $request->name){
                $info->name = $request->name;
            }
            if ($info->parent_id && $info->parent_id != $request->parent){
                $info->parent_id = $request->parent;
            }
            $info->save();

            Session()->flash('category', 'category update was successful!');

            return redirect('/user/infos');

        } else {
            return "无权编辑！";
        }

    }

    public function destroy($id)
    {
        $info = Info::find($id);
        if (Gate::allows('info_authorize', $info)) {
            Info::destroy($id);
            return redirect('/user/infos');
        } else {
            return "无权删除！";
        }
    }

}
