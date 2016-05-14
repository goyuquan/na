@extends('layouts.app')

@section('title','搜索结果_宁安信息网')
@section('description','宁安信息网搜索结果,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安分类信息搜索结果,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/category.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>信息搜索</span>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span></span>
    &nbsp;<button type="button" name="返回" onclick="history.go(-1)">返回</button>
</div>

<div class="main_wrap container">

    <div class="category">
        <h3>分类菜单</h3>

    </div>
    <div class="content">
        <div class="headbar">
            宁安信息搜索结果
        </div>

        @if(count($results) > 0)
        <ul class="list">
            @foreach( $results as $result )
            <li>
                <span class="date">{{ substr($result->publish_at,0,10) }}</span>
                <h4><a href="{{url('/info/'.$result->id)}}">{{ str_limit($result->title,30) }}</a></h4>
                <span class="price">
                    <?php if(isset(json_decode($result->content)->price)){
                        echo "￥".json_decode($result->content)->price;
                    } else {
                        echo "面议";
                    }
                    ?>
                </span>
                <span class="phone">{{ $result->user->phone }}</span>
                <p> {{ str_limit($result->text,100) }} </p>
            </li>
            @endforeach
        </ul>
        @endif
        {{$results->links()}}

    </div>

</div>

@endsection
@section('script')
<script type="text/javascript">
    $(function(){
        $(".category > ul > li").click(function(){
            $(this).find('ul').slideToggle('fast');
        });
        $(".category li").click(function(e){
            e.stopPropagation();
        });
    });
</script>
@endsection
