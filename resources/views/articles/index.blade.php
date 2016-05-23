@extends('layouts.app')

@section('title','宁安新闻_宁安信息网')
@section('description','宁安新闻,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安新闻')

@section('style')
<link rel="stylesheet" href="{{url('/css/category.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>宁安新闻</span>
    &nbsp;<button type="button" name="返回" onclick="history.go(-1)">返回</button>
</div>

<div class="main_wrap container">

    <div class="category">
        <h3>分类信息</h3>

        @include('info.categories.sidebar_catelist')

    </div>
    <div class="content">
        <div class="headbar">
            宁安新闻
        </div>

        @if(count($articles) > 0)
        <ul class="list">
            @foreach( $articles as $article )
            <li>
                <span class="date">{{ substr($article->publish_at,0,10) }}</span>
                <h4><a href="{{url('/article/'.$article->id)}}">{{ str_limit($article->title,60) }}</a></h4>
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
