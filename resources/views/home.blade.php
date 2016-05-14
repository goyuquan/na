@extends('layouts.app')

@section('title','宁安信息网_宁安本地服务信息网站')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/home.css')}}" />
@endsection

@section('content')

<div class="services container">
    <div class="head">
        <h2>宁安本地服务信息</h2>
    </div>
    <ul class="list">
        <li>
            <a href="#">
                <i class="fa fa-phone-square" aria-hidden="true"></i>
                <h3>公共服务电话</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-train" aria-hidden="true"></i>
                <h3>火车时刻表</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-bus" aria-hidden="true"></i>
                <h3>公交线路</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cutlery" aria-hidden="true"></i>
                <h3>餐厅饭店</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-truck" aria-hidden="true"></i>
                <h3>快递</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-internet-explorer" aria-hidden="true"></i>
                <h3>网吧</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-microphone" aria-hidden="true"></i>
                <h3>KTV</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-external-link-square" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-glass" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
    </ul>
</div>


<div class="category container">
    <div class="head">
        <h2><a href="{{url('/categories')}}">宁安分类信息目录</a></h2>
    </div>
    <div class="column">

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
