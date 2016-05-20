@extends('layouts.app')

@section('title',$item->title.'_'.$page->name.'_宁安信息网')
@section('description',$item->title.'_宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords',$item->title.'_宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/page_show.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/pages/'.$page->id)}}">{{ $page->name }}</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>{{$item->title}}</span>
    &nbsp;<button type="button" name="返回" onclick="history.go(-1)">返回</button>
</div>

<div class="main_wrap container">
    @include('page.include.top_body_full_banner')
    <div class="sidebar">
        @include('page.include.sidebar_ad')
        <h3>分类菜单</h3>
    </div>
    <div class="content">
        @include('page.include.content_top_full_banner')
        <h1>{{$item->title}}</h1>
        <div class="sub_info">
            <div class="info_id">信息ID:&nbsp;<span>{{ $item->id }}</span></div>
            <span>发布日期:&nbsp;{{ substr($item->updated_at,0,10) }}</span>
            <span class="info_category">分类信息:&nbsp;<a href="{{url('/pages/'.$page->id)}}">{{$page->name}}</a></span>
        </div>
        <div class="text_wrap">
            @include('info.categories.text_ad')
            <?php echo(html_entity_decode($item->text, ENT_QUOTES, 'UTF-8')); ?>
        </div>
        @include('page.include.content_bottom_full_banner')

    </div>
</div>




@endsection
