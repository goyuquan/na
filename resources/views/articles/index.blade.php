@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/category.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>新闻</span>
    &nbsp;<button type="button" name="返回" onclick="history.go(-1)">返回</button>
</div>

<div class="main_wrap container">

    <div class="category">
        <h3>分类菜单</h3>

        @include('info.categories.sidebar_catelist')

    </div>
    <div class="content">
        <div class="headbar">
            headbar
        </div>

        @if(count($articles) > 0)
        <ul class="list">
            @foreach( $articles as $article )
            <li>
                <span class="date">{{ substr($article->publish_at,0,10) }}</span>
                <h4><a href="{{url('/article/'.$article->id)}}">{{ $article->title }}</a></h4>
            </li>
            @endforeach
        </ul>
        @endif
        {{$articles->links()}}

    </div>

</div>

@endsection
@section('script')
<script type="text/javascript">
    $(function(){
        $(".category > ul > li").click(function(){
            $(this).find('ul').slideToggle('fast');
        });
        $(".category li").click(function(e){
            e.stopPropagation();
        });
    });
</script>
@endsection
