@extends('admin.layouts.admin')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/user/info_list.css')}}" />
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/user/index')}}">用户中心</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>信息管理</span>
</div>

<div class="main_wrap container">

	<div class="content_wrap">
		<div class="main_wrap">
			main
		</div>
	</div>
</div>

@endsection
