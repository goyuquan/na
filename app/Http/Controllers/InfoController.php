<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info;
use App\Img;
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

        $data = [
            'type' => $type,
            'infos' => $infos,
            'category' => $category_data,
            'categories' => $categories,
            'parent_category' => $parent_category
        ];
        if(View::exists('info.categories.'.$folder->alias.'.'.$category_data->alias)){
            return view('info.categories.'.$folder->alias.'.'.$category_data->alias,$data);
        } else {
            return view('info.categories.common',$data);
        }
    }

    public function info($id)
    {
        $info = Info::find($id);
        $content = json_decode($info->content);
        $category = $info->category;
        if($category){
            $parent_category =  Category::find($category->parent_id);

            $photos = isset($content->photos_sha1) ? $content->photos_sha1 : null ;

            if ($photos) {
                $photos = Img::where('label',$photos)->get();
            }

            $data = [
                'info' => $info,
                'category' => $category,
                'parent_category' => $parent_category,
                'content' => $content,
                'photos' => $photos
            ];
            
            if(View::exists('info.categories.'.$parent_category->alias.'.'.$category->alias.'_show')){
                return view('info.categories.'.$parent_category->alias.'.'.$category->alias.'_show',$data);
            } else {
                return view('info.categories.common_show',$data);
            }
        } else {
            return view('page.search_show',[
                'info' => $info,
                'content' => $content
            ]);
        }
    }



}
