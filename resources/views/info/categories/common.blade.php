@extends('layouts.app')

@section('title',$category->name.'_'.$parent_category->name.'_宁安信息网')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/category.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/categories')}}">信息分类</a>
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
            headbar
        </div>

        @if(count($infos) > 0)
        <ul class="list">
            @foreach( $infos as $info )
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
                <span class="phone">{{ $info->user->phone }}</span>
                <p> {{ str_limit($info->text,100) }} </p>
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
