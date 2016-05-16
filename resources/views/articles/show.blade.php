@extends('layouts.app')

@section('title',$article->title.'_宁安新闻_宁安信息网')
@section('description',$article->title.',宁安新闻,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords',$article->title.',宁安新闻')

@section('style')
<link rel="stylesheet" href="{{url('/css/show.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/articles')}}">宁安新闻</a>
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
