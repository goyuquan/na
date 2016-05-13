<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
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

        $articles = Article::where('publish_at','<',date("Y-m-d h:i:s"))
        ->orderBy('id', 'desc')->paginate(20);
        return view('articles.index', [
            'articles' => $articles,
            'categories' => $categories,
            'type' => $type,
            'category_active' => ""
         ]);
    }


    public function articles()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(20);
        return view('admin.articles.index', [ 'articles' => $articles ]);
    }


    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show',['article'=>$article]);
    }


    public function create()
    {
        return view('admin.articles.create');
    }


    public function store(Request $request)
    {
        $messages = [
            'title.required' => '标题不能为空',
            'title.max' => '标题不能大于:max位',
            'title.min' => '标题不能小于:min位'
        ];
        $this->validate($request, [
            'title' => 'required|min:2|max:255'
        ],$messages);

        $article = new Article;

        $article->title = $request->title;
        $article->text = $request->text;
        $article->publish_at = $request->publish_at;

        $article->save();

        Session()->flash('status', 'Article create was successful!');

        return redirect('/admin/articles');
    }


    public function edit($id)
    {
        $article = Article::find($id);

        return view('admin.articles.edit',[ 'article'=>$article ]);
    }


    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $messages = [
            'title.required' => '标题不能为空',
            'title.max' => '标题不能小于:max位',
            'title.min' => '标题不能小于:min位',
            'text.required' => '内容不能为空',
        ];
        $this->validate($request, [
            'title' => 'required|min:2|max:255',
            'text' => 'required',
        ],$messages);

        $article = Article::find($id);
        $article->title = $request->title;
        $article->text = $request->text;
        $article->publish_at = $request->publish_at;
        $article->save();

        Session()->flash('status', 'Article update was successful!');

        return redirect('/admin/articles');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        Article::destroy($id);

        return redirect('/admin/articles');
    }


}
