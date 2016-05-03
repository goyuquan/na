@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/category.css')}}" >
@endsection

@section('content')
<div class="breadcrumb container">
    <a href="{{url('/')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="#">全部类别</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>{{$category->name}}</span>
    {{ $category_active = $category->name }}
</div>

<div class="main_wrap container">

    <div class="category">
        <h3>分类菜单</h3>
        @if(count($categoriess) > 0)
        <ul>
            @foreach ( $categoriess as $category )
                <li><a href="#">{{ $category->name }}</a>
                    @if ( !App\Category::where('parent_id',$category->id)->get()->isEmpty() )
                        <ul>
                            @foreach ( $categories as $category_ )
                                @if ($category_->parent_id === $category->id)
                                    <li {{ $category_active == $category_->name ? "class=active" : "" }} >
                                        <a href="{{ url('/infos/category/'.$category_->id) }}">{{ $category_->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        @endif

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
                <h4><a href="{{url('/info/'.$info->id)}}">{{ $info->title }}</a></h4>
                <span class="price">
                    <?php if(isset(json_decode($info->content)->price)){
                        echo "￥".json_decode($info->content)->price;
                    } else {
                        echo "面议";
                    }
                    ?>
                </span>
                <span class="phone">{{ $info->user->phone }}</span>
                <p> {{ $info->text }} </p>
            </li>
            @endforeach
        </ul>
        @endif
        {{$infos->links()}}

    </div>

</div>

@endsection
