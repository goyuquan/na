<?php

namespace App\Http\Controllers;

use App\Album;
use App\Img;
use App\Video;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function homepage()
    {
        $album_latsed = Album::where('published_at','<',date("Y-m-d h:i:s"))
            ->where('display_id',0)->orderBy('id','desc')->take(8)->get();
        $Video_latsed = Video::where('published_at','<',date("Y-m-d h:i:s"))
            ->orderBy('id','desc')->take(8)->get();
        $banner = Album::where('display_id',2)->get();
        return view('welcome',[
            'album_latsed' => $album_latsed,
            'video_latsed' => $Video_latsed,
            'banners' => $banner,
        ]);
    }

    public function pay($price)
    {
        return view('pay',['price'=>$price]);
    }

    public function price()
    {
        return view('price');
    }


}
