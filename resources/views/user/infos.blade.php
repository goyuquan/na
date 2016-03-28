@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')

@if(count($infos) > 0)
<ul>
    @foreach($infos as $info)
    <li>{{$info->title}}<a href="/user/info/edit/{{$info->id}}">编辑</a><a href="/user/info/delete/{{$info->id}}">删除</a></li>
    @endforeach
</ul>
@endif
@endsection
