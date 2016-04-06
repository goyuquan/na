<?php

namespace App\Http\Controllers;

use App\Info;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
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


}
