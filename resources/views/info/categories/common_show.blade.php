@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')
<h6>全部类别 > {{$category->name}} (common)</h6>

<h1>{{$info->title}}</h1>
<p> {{$info->text}} </p>



@endsection
