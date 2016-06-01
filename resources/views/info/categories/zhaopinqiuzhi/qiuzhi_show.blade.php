@extends('layouts.app')

@section('title',$info->title.'_'.$category->name.'_'.$parent_category->name.'_分类信息_宁安信息网')
@section('description',$info->title.'_宁安信息网分类信息,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords',$info->title.'_宁安分类信息,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/show.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/categories')}}">分类信息</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/infos/category/'.$category->id)}}">{{$category->name}}</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>{{$info->title}}</span>
    &nbsp;<button type="button" name="返回" onclick="history.go(-1)">返回</button>
</div>

<div class="main_wrap container">
    @include('info.categories.show_top')
    <div class="sidebar">
        @include('info.categories.show_sidebar')
    </div>
    <div class="content">
        <h1>{{$info->title}}</h1>
        <div class="sub_info">
            <div class="info_id">信息ID:&nbsp;<span>{{ $info->id }}</span></div>
            <span>发布日期:&nbsp;{{ substr($info->publish_at,0,10) }}</span>
            <span class="info_category">分类信息:&nbsp;<a href="{{url('/infos/category/'.$info->category_id)}}">{{$info->category->name}}</a></span>
        </div>
        <div class="text_wrap">
            @include('info.categories.text_ad')
            <?php $edu = array(
                'ben' => '大学本科',
                'zhuan' => '大学专科',
                'gao' => '高中',
                'chu' => '初中',
                'xiao' => '小学'
            ); ?>
            <span class="item">期望职位: {{$info->title}}</span>
            <span class="item">姓名: {{$content->name}}</span>
            <span class="item">性别: {{$content->sex}}</span>
            <span class="item">年龄: {{$content->age}}</span>
            <span class="item">工作年限: {{$content->year}}</span>
            <span class="item">学历: {{ $edu[$content->edu] }}</span>
            <span class="item">电话号码: {{$content->phone}}</span>
            <span class="item">期望工作地点: {{$content->didian}}</span>
            <span class="item">
                期望薪资:&nbsp;
                <?php if(!empty($content->price)){
                    echo "￥".$content->price;
                } else {
                    echo "面议";
                }
                ?>
            </span>
            <br>
            <br>
            期望职位描述:   {{$info->text}}
        </div>
        @include('info.categories.show_bottom')
    </div>
</div>




@endsection
