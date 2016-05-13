@extends('layouts.app')

@section('title',$article->title)
@section('description',$article->title)
@section('keywords',$article->title)

@section('style')
<link rel="stylesheet" href="{{url('/css/show.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">首页</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/articles')}}">新闻</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>{{$article->title}}</span>
    &nbsp;<button type="button" name="返回" onclick="history.go(-1)">返回</button>
</div>

<div class="main_wrap container">
    <div class="sidebar">
        <h3>分类菜单</h3>
    </div>
    <div class="content">
        <h1>{{$article->title}}</h1>
        <div class="sub_info">
            <span>发布日期:&nbsp;{{ substr($article->publish_at,0,10) }}</span>
        </div>
        <div class="text_wrap">
            <div class="text_ad">
                text_ad
            </div>
            <?php echo(html_entity_decode($article->text, ENT_QUOTES, 'UTF-8')); ?>
        </div>

    </div>
</div>




@endsection
