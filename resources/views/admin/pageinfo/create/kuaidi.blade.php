@extends('admin.layouts.admin')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

<?php $dashboard_="";$user_="";$_category_="";$page_="active";$article_="" ?>

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/form.css')}}" />
<style media="screen">
    h1 {
        text-align: center;
    }
    .add:hover {
        color: #fff;
        background: #a94442;
    }
    label:first-child {
        width: auto!important;
    }
</style>
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/admin/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/admin/pages')}}">页面管理</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/admin/pageinfo/'.$page->id)}}">{{$page->name}}</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>内容添加</span>
</div>

<div class="main_wrap container">

	<div class="content_wrap">
		<h1>{{$page->name}}</h1>
		<hr>
		<form id="create" method="POST" action="{{ url('/admin/pageinfo/create/'.$page->id) }}">
			{!! csrf_field() !!}

			<section>
				<label for="title">名称</label>
				<input type="text" name="title" >
			</section>
			<section>
				<label for="phone">电话</label>
				<input type="text" name="phone" >
			</section>
			<section>
				<label for="text">地址</label>
				<textarea type="text" name="text" ></textarea>
			</section>

			<input type="submit" value="提交">
		</form>
	</div>
</div>
@endsection
