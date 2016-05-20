@extends('layouts.app')

@section('title','本地服务_宁安信息网')
@section('description','宁安本地服务,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安本地服务,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/home.css')}}" />
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>本地服务</span>
</div>


<div class="services container">
    <div class="head">
        <h2><a href="{{url('/services')}}">宁安本地服务</a></h2>
    </div>
    <ul class="list">
        <li>
            <a href="{{ url('/pages/10') }}">
                <i class="fa fa-phone-square" aria-hidden="true"></i>
                <h3>公共服务电话</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/19') }}">
                <i class="fa fa-train" aria-hidden="true"></i>
                <h3>火车时刻表</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/20') }}">
                <i class="fa fa-code-fork" aria-hidden="true"></i>
                <h3>公交线路</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/21') }}">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <h3>客运站时刻表</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/23') }}">
                <i class="fa fa-bus" aria-hidden="true"></i>
                <h3>宁安哈尔滨客车</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/22') }}">
                <i class="fa fa-truck" aria-hidden="true"></i>
                <h3>快递</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/9') }}">
                <i class="fa fa-cutlery" aria-hidden="true"></i>
                <h3>餐厅饭店</h4>
                </a>
            </li>
        <li>
            <a href="{{ url('/pages/24') }}">
                <i class="fa fa-internet-explorer" aria-hidden="true"></i>
                <h3>网吧</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/25') }}">
                <i class="fa fa-microphone" aria-hidden="true"></i>
                <h3>KTV</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/26') }}">
                <i class="fa fa-gamepad" aria-hidden="true"></i>
                <h3>娱乐</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/28') }}">
                <i class="fa fa-glass" aria-hidden="true"></i>
                <h3>酒吧</h4>
            </a>
        </li>
        <li>
            <a href="{{ url('/pages/27') }}">
                <i class="fa fa-spinner" aria-hidden="true"></i>
                <h3>洗浴</h4>
            </a>
        </li>
    </ul>
</div>


@endsection
