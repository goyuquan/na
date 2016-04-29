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
        $categoriess = Category::where('parent_id',0)->get();
        $categories = Category::where('parent_id','>',0)->get();
        return view('info.index',[
            'categoriess' => $categoriess,
            'categories' => $categories
        ]);
    }

    public function category($category)
    {
        $categoriess = Category::where('parent_id',0)->get();
        $categories = Category::where('parent_id','>',0)->get();
        $category_data = Category::find($category);
        $folder = Category::find($category_data->parent_id);
        $infos = $category_data->info()
        ->orderBy('publish_at', 'desc')
        ->paginate(10);

        if(View::exists('info.categories.'.$folder->alias.'.'.$category_data->alias)){
            return view('info.categories.'.$folder->alias.'.'.$category_data->alias,[
                'infos' => $infos,
                'category' => $category_data,
                'categoriess' => $categoriess,
                'categories' => $categories
            ]);
        } else {
            return view('info.categories.common',[
                'infos' => $infos,
                'category' => $category_data,
                'categoriess' => $categoriess,
                'categories' => $categories
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
