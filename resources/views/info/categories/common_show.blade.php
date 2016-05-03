@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/show.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">首页</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="#">全部类别</a>
    <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>{{$category->name}}</span>
</div>

<div class="main_wrap container">
    <div class="sidebar">
        <h3>分类菜单</h3>
    </div>
    <div class="content">
        <h1>{{$info->title}}</h1>
        <p> {{$info->text}} </p>

    </div>
</div>




@endsection
