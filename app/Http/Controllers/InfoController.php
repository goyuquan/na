<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info;
use App\Column;
use View;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{

    public function index()
    {
        $categories = $categoriess = Category::all();
        return view('info.index',[
            'categories' => $categories,
            'categoriess' => $categoriess
        ]);
    }

    public function category($category)
    {
        $category_data = Category::find($category);
        $folder = Category::find($category_data->parent_id);
        $infos = $category_data->info;
        if(View::exists('info.categories.'.$folder->alias.'.'.$category_data->alias)){
            return view('info.categories.'.$folder->alias.'.'.$category_data->alias,[
                'infos' => $infos,
                'category' => $category_data
            ]);
        } else {
            return view('info.categories.common',[
                'infos' => $infos,
                'category' => $category_data
            ]);
        }
    }

    public function info($id)
    {
        $info = Info::find($id);
        $category = $info->category;
        $parent_category =  Category::find($category->parent_id);
        if(View::exists('info.categories.'.$parent_category->alias.'.'.$category->alias)){
            return view('info.categories.'.$parent_category->alias.'.'.$category->alias,[
                'info' => $info,
                'category' => $category,
                'parent_category' => $parent_category
            ]);
        } else {
            return view('info.info',[
                'infos' => $infos,
                'category' => $category,
                'parent_category' => $parent_category
            ]);
        }
    }

}
