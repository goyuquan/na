@extends('layouts.app')

@section('title',$page->name.'_宁安信息网')
@section('description',$page->name.'_宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords',$page->name.'_宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/page.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>{{$page->name}}</span>
    &nbsp;<button type="button" name="返回" onclick="history.go(-1)">返回</button>
</div>
<?php $category_active = ''; ?>
<div class="main_wrap container">

    <div class="category">
        <h3>分类菜单</h3>

        @include('info.categories.sidebar_catelist')

    </div>
    <div class="content">
        <div class="headbar">
            <h2>{{$page->name}}</h2>
        </div>

        @if(count($items) > 0)
        <table>
            <thead>
                <th> 名称 </th>
            </thead>
            <hr>
            <tbody>
                @foreach( $items as $item )
                <tr>
                    <td><h4><a href="{{url('/page/'.$item->id)}}">{{ str_limit($item->title,30) }}</a></h4></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        {{$items->links()}}

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
