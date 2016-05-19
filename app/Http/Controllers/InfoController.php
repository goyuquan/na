<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info;
use View;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{

    public function index()
    {
        $categories = Category::where('parent_id',0)->get(['id','name']);

        for ($i=0; $i < count($categories) ; $i++) {
            $data = Category::where( 'parent_id',$categories[$i]->id )->get(['id']);
            if ( !$data->isEmpty() ){
                $type[$i] = Category::where('parent_id',$categories[$i]->id)->get(['id','name']);
            }
        }

        return view('info.index',[
            'categories' => $categories,
            'type' => $type,
        ]);
    }

    public function category($category)
    {
        $categories = Category::where('parent_id',0)->get(['id','name']);
        $category_data = Category::find($category);
        $parent_category = Category::find($category_data->parent_id);
        $folder = Category::find($category_data->parent_id);
        $infos = $category_data->info()
        ->orderBy('publish_at', 'desc')
        ->paginate(10);

        for ($i=0; $i < count($categories) ; $i++) {
            $data = Category::where( 'parent_id',$categories[$i]->id )->get(['id','name']);
            if ( !$data->isEmpty() ){
                $type[$i] = Category::where('parent_id',$categories[$i]->id)->get(['id','name']);
            }
        }

        if(View::exists('info.categories.'.$folder->alias.'.'.$category_data->alias)){
            return view('info.categories.'.$folder->alias.'.'.$category_data->alias,[
                'type' => $type,
                'infos' => $infos,
                'category' => $category_data,
                'categories' => $categories,
                'parent_category' => $parent_category
            ]);
        } else {
            return view('info.categories.common',[
                'type' => $type,
                'infos' => $infos,
                'category' => $category_data,
                'categories' => $categories,
                'parent_category' => $parent_category
            ]);
        }
    }

    public function info($id)
    {
        $info = Info::find($id);
        $content = json_decode($info->content);
        $category = $info->category;
        $parent_category =  Category::find($category->parent_id);
        if(View::exists('info.categories.'.$parent_category->alias.'.'.$category->alias.'_show')){
            return view('info.categories.'.$parent_category->alias.'.'.$category->alias.'_show',[
                'info' => $info,
                'category' => $category,
                'parent_category' => $parent_category,
                'content' => $content
            ]);
        } else {
            return view('info.categories.common_show',[
                'info' => $info,
                'category' => $category,
                'parent_category' => $parent_category,
                'content' => $content
            ]);
        }
    }



}
