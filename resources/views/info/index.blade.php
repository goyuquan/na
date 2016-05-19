@extends('layouts.app')

@section('title','分类信息_宁安信息网')
@section('description','宁安信息网分类信息,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安分类信息,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/categories.css')}}" />
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>分类信息目录</span>
</div>


<div class="category container">
    <div class="head">
        <h2>宁安分类信息目录</h2>
    </div>
    <div class="column">
        <h3>{{ $categories[1]->name }}</h3>
        @if ( isset($type[1]) && count($type[1]) > 0)
        <ul>
            @foreach ($type[1] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        <h3>{{ $categories[0]->name }}</h3>
        @if ( isset($type[0]) && count($type[0]) > 0)
        <ul>
            @foreach ($type[0] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
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
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="column">

        <h3>{{ $categories[3]->name }}</h3>
        @if ( isset($type[3]) && count($type[3]) > 0)
        <ul>
            @foreach ($type[3] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        <h3>{{ $categories[4]->name }}</h3>
        @if ( isset($type[4]) && count($type[4]) > 0)
        <ul>
            @foreach ($type[4] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="column">

        <h3>{{ $categories[5]->name }}</h3>
        @if ( isset($type[5]) && count($type[5]) > 0)
        <ul>
            @foreach ($type[5] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        <h3>{{ $categories[8]->name }}</h3>
        @if ( isset($type[8]) && count($type[8]) > 0)
        <ul>
            @foreach ($type[8] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

    </div>
    <div class="column">


        <h3>{{ $categories[7]->name }}</h3>
        @if ( isset($type[7]) && count($type[7]) > 0)
        <ul>
            @foreach ($type[7] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        <h3>{{ $categories[10]->name }}</h3>
        @if ( isset($type[10]) && count($type[10]) > 0)
        <ul>
            @foreach ($type[10] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

    </div>
    <div class="column">
        <h3>{{ $categories[6]->name }}</h3>
        @if ( isset($type[6]) && count($type[6]) > 0)
        <ul>
            @foreach ($type[6] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        <h3>{{ $categories[9]->name }}</h3>
        @if ( isset($type[9]) && count($type[9]) > 0)
        <ul>
            @foreach ($type[9] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>

</div>


@endsection
