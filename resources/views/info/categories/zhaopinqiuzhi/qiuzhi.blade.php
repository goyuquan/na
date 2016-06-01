@extends('layouts.app')

@section('title',$category->name.'_'.$parent_category->name.'_分类信息_宁安信息网')
@section('description',$category->name.'_'.$parent_category->name.'_宁安信息网分类信息,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords',$category->name.'_'.$parent_category->name.'_宁安分类信息,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/category.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/categories')}}">分类信息</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>{{$category->name}}</span>
    &nbsp;<button type="button" name="返回" onclick="history.go(-1)">返回</button>
    <?php $category_active = $category->name ?>
</div>

<div class="main_wrap container">
    @include('info.categories.category_top')
    <div class="category">
        @include('info.categories.category_sidebar_top')
        <h3>分类菜单</h3>
        @include('info.categories.sidebar_catelist')
        @include('info.categories.category_sidebar_bottom')
    </div>
    <div class="content">
        <div class="headbar">
            <h2>宁安{{$category->name}}</h2>
        </div>

        <ul class="list">
            @include('info.categories.topsys')

            <?php $edu = array(
                'ben' => '大学本科',
                'zhuan' => '大学专科',
                'gao' => '高中',
                'chu' => '初中',
                'xiao' => '小学'
            ); ?>
            @if(count($infos) > 0)
            @foreach( $infos as $info )
            <li>
                <span class="date">{{ substr($info->publish_at,0,10) }}</span>
                <h4><a href="{{url('/info/'.$info->id)}}">{{ str_limit($info->title,20) }}</a></h4>
                <span class="item">{{ json_decode($info->content)->name }}</span>
                <span class="item">{{ json_decode($info->content)->sex }}</span>
                <span class="item">年龄:  {{ json_decode($info->content)->age }}</span>
                <span class="item">学历:  {{ $edu[json_decode($info->content)->edu] }}</span>
                <span class="item">工作经验:  {{ json_decode($info->content)->year }}年</span>
                <span class="price">
                    <?php if(!empty(json_decode($info->content)->price)){
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
            @endif
        </ul>
        {{$infos->links()}}

        @include('info.categories.category_bottom')

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
