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
            <?php
            $huxing = array(
                '3_2' => '三室两厅',
                '3_1' => '三室一厅',
                '2_2' => '两室两厅',
                '2_1' => '两室一厅',
                '1_1' => '一室一厅',
                'other' => '其他'
             );
             $zhuangxiu = array(
                 'hifi' => '豪华装修',
                 'high' => '精装修',
                 'middle' => '中等装修',
                 'base' => '简单装修',
                 'low' => '毛坯',
                 'other' => '其他'
              );
             ?>
            <span class="item">{{$content->area or ""}}小区</span>
            @if(isset($content->huxing))
            <span class="item">户型:  {{ $huxing[$content->huxing]  or ""}}</span>
            @endif

            <span class="item">{{ $content->floor.'/'.$content->maxfloor }}层</span>

            @if(isset($content->zhuangxiu))
            <span class="item">{{ $zhuangxiu[$content->zhuangxiu] }}</span>
            @endif

            <span class="item">{{ $content->mianji  or ""}}㎡</span>
            <span class="item">电话号码: {{$content->phone or ""}}</span>
            <span class="item">联系人:  {{$content->who or ""}}</span>
            <span class="item">
                总价:&nbsp;
                <?php if(!empty($content->price)){
                    echo "￥".$content->price;
                } else {
                    echo "面议";
                }
                ?>
            </span>
            <br>
            <br>
            详细描述:   {{$info->text}}

            @if( $photos || count($photos) > 0)
            <ul class="imgs">
                @foreach( $photos as $photo )
                    <li><img src="{{ url('/uploads/'.$photo->name) }}" alt="" /></li>
                @endforeach
            </ul>
            @endif
        </div>
        @include('info.categories.show_bottom')
    </div>
</div>




@endsection
