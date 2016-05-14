@extends('layouts.app')

@section('title',$info->title.'_'.$category->name.'_'.$parent_category->name.'_宁安信息网')
@section('description',$info->title)
@section('keywords',$info->title)

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
    <div class="sidebar">
        <h3>分类菜单</h3>
    </div>
    <div class="content">
        <h1>{{$info->title}}</h1>
        <div class="sub_info">
            <div class="info_id">信息ID:&nbsp;<span>{{ $info->id }}</span></div>
            <span>发布日期:&nbsp;{{ substr($info->publish_at,0,10) }}</span>
            <span class="info_category">分类信息:&nbsp;<a href="{{url('/infos/category/'.$info->category_id)}}">{{$info->category->name}}</a></span>
        </div>
        <div class="text_wrap">
            <div class="text_ad">
                text_ad
            </div>
            <span>
                价格:&nbsp;
                <?php if(isset(json_decode($info->content)->price)){
                    echo "￥".json_decode($info->content)->price;
                } else {
                    echo "面议";
                }
                ?>
            </span>
            <span>电话:&nbsp;{{ json_decode($info->content)->phone }}</span>
            {{$info->text}}
        </div>

    </div>
</div>




@endsection
