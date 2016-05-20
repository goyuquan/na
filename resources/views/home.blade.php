@extends('layouts.app')

@section('title','宁安信息网_宁安本地服务网站')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/home.css')}}" />
@endsection

@section('content')

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

<div class="category container">
    <div class="head">
        <h2><a href="{{url('/categories')}}">宁安分类信息目录</a></h2>
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
</div>

<h2 class="latest_title">宁安最新信息</h2>
<div class="latest_list container">
    <div class="content">

        @if(count($infos) > 0)
        <ul>
            @foreach($infos as $info)
            <li>
                <span class="date">{{ substr($info->publish_at,0,10) }}</span>
                <h4><a href="{{url('/info/'.$info->id)}}">{{ str_limit($info->title,30) }}</a></h4>
                <span class="price">
                    <?php if(isset(json_decode($info->content)->price)){
                        echo "￥".json_decode($info->content)->price;
                    } else {
                        echo "面议";
                    }
                    ?>
                </span>

                <span class="phone">{{ json_decode($info->content)->phone }}</span>

                <p> {{ str_limit($info->text,100) }} </p>
            </li>
            @endforeach
        </ul>
        @endif

    </div>
    <div class="sidebar">
        @include('includes.home_sidebar_pic_ad')

        <h2 class="news_list"> <a href="{{url('/articles')}}"> 宁安新闻 </a> </h2>
        @if(count($articles) > 0)
        <ul>
            @foreach( $articles as $article )
            <li><a href="{{url('/article/'.$article->id)}}">{{ str_limit($article->title,16) }}</a></li>
            @endforeach
        </ul>
        @endif
    </div>
</div>

@endsection
