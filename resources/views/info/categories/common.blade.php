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
</div>

<div class="main_wrap container">

    <div class="category">
        55555555555555555
    </div>
    <div class="content">
        @if(count($infos) > 0)
        <ul>
            @foreach( $infos as $info )
            <li><a href="{{url('/info/'.$info->id)}}">{{ $info->title }}</a> </li>
            @endforeach
        </ul>
        <p>
        </p>
        @endif
        {{$infos->links()}}

    </div>

</div>

@endsection
