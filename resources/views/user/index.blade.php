@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')
<h1>用户首页</h1>
<ul>
    <li><a href="/user/infos">发布的内容</a></li>
</ul>

@endsection
