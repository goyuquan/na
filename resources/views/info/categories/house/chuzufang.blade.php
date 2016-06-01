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

    <div class="category">
        <h3>分类菜单</h3>

        @include('info.categories.sidebar_catelist')

    </div>
    <div class="content">
        <div class="headbar">
            <h2>宁安{{$category->name}}</h2>
        </div>

        @if(count($infos) > 0)
        <ul class="list">
            @foreach( $infos as $info )
            <?php
            $huxing = array(
                '3_2' => '三室两厅',
                '3_1' => '三室一厅',
                '2_2' => '两室两厅',
                '2_1' => '两室一厅',
                '1_1' => '一室一厅',
                'other' => '其他户型'
             );
             $zhuangxiu = array(
                 'hifi' => '豪华装修',
                 'high' => '精装修',
                 'middle' => '中等装修',
                 'base' => '简单装修',
                 'low' => '毛坯',
                 'other' => '其他装修'
              );
             ?>
            <li>
                <?php
                $img = isset(json_decode($info->content)->thumbnail) ? json_decode($info->content)->thumbnail : null;
                ?>
                @if($img)
                <a class="thumbnail" href="{{url('/info/'.$info->id)}}">
                    <img src="{{url('/uploads/thumbnails/'.$img )}}" alt="宁安信息网"/>
                </a>
                @endif
                <div class="item_body">
                    <span class="date">{{ substr($info->publish_at,0,10) }}</span>
                    <h4><a href="{{url('/info/'.$info->id)}}">{{ str_limit($info->title,30) }}</a></h4>
                    <span class="price">
                        <?php if(empty(json_decode($info->content)->price)){
                            echo "￥".json_decode($info->content)->price;
                        } else {
                            echo "面议";
                        }
                        ?>
                    </span>
                    <p>
                        <span class="item">{{ json_decode($info->content)->area }}小区</span>
                        @if(!empty(json_decode($info->content)->huxing))
                            <span class="item">{{ $huxing[json_decode($info->content)->huxing] }}</span>
                        @endif
                        <span class="item">{{ json_decode($info->content)->floor.'/'.json_decode($info->content)->maxfloor }}层</span>
                        @if(!empty(json_decode($info->content)->zhuangxiu))
                            <span class="item">{{ $zhuangxiu[json_decode($info->content)->zhuangxiu] }}</span>
                        @endif
                        <span class="item size">{{ json_decode($info->content)->mianji }}㎡</span>
                    </p>

                    <p> {{ str_limit($info->text,100) }} </p>
                    <p>
                        <span class="item">地址:  {{ json_decode($info->content)->addr }}</span>
                        <span class="phone">电话号码:   {{ json_decode($info->content)->phone }}</span>
                        <span class="item">联系人:  {{ json_decode($info->content)->who }}</span>
                    </p>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
        {{$infos->links()}}

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
