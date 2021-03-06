@extends('user.layouts.app')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<style media="screen">
    .add {
        display: inline-block;
        padding: 0.5em 1em;
        color: #fff;
        font-size: 1rem;
        border-radius: 0.3rem;
        background: #3378af;
    }
</style>
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">用户中心</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>信息发布</span>
</div>

<div class="main_wrap container">
    @include('user.layouts.sidebar')
    <div class="content_wrap">
        <ul>
            <li>用户名：{{$user->name}}</li>
            <li>email：{{$user->email}}</li>
            <li>手机号：{{$user->phone}}</li>
        </ul>
        <br>
        <a class="add" href="{{url('/user/userdata/edit')}}">修改资料</a>
    </div>
</div>

@endsection
