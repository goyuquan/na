@extends('user.layouts.app')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/categories.css')}}" />
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>创建新信息-选择分类</span>
</div>

<div class="category container">
    <div class="head">
        <h2>选择分类</h2>
    </div>
    <div class="column">

        <h3>{{ $categories[0]->name }}</h3>
        @if (count($type[0]) > 0)
        <ul>
            @foreach ($type[0] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{url('/user/info/create/category/'.$cate->id)}}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        <h3>{{ $categories[1]->name }}</h3>
        @if ( isset($type[1]) && count($type[1]) > 0)
        <ul>
            @foreach ($type[1] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{url('/user/info/create/category/'.$cate->id)}}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        <h3>{{ $categories[2]->name }}</h3>
        @if ( isset($type[2]) && count($type[2]) > 0)
        <ul>
            @foreach ($type[2] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{url('/user/info/create/category/'.$cate->id)}}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

    </div>
    <div class="column">
        <h3>mobile phone</h3>
        <ul>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
        </ul>
        <h3><a href="#">老中青</a></h3>
        <ul>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">温暖</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">噢民</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">党中央</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">一缺抽</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">的脱掉</a>
            </li>
        </ul>
    </div>
    <div class="column">
        <h3>mobile phone</h3>
        <ul>
            <li>
                <a href="#">mobile phhone</a>
            </li>
        </ul>
    </div>
    <div class="column">
        <h3>mobile phone</h3>
        <ul>
            <li>
                <a href="#">mobile phhone</a>
            </li>
        </ul>
    </div>
    <div class="column">
        <h3>mobile phone</h3>
        <ul>
            <li>
                <a href="#">mobile phhone</a>
            </li>
        </ul>
    </div>
</div>


@endsection
