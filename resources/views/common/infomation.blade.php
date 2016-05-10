@extends('user.layouts.app')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')


@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>提示信息</span>
</div>

<div class="main_wrap container">
    @include('user.layouts.sidebar')

    <div class="content_wrap">
        <h1>{{Session('info')}}</h1>
    </div>
</div>


@endsection
