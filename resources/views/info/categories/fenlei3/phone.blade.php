@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')
<h1>全部类别 > phone</h1>

@if(count($infos) > 0)
<ul>
    @foreach( $infos as $info )
        <li><b>{{ $info->title }}</b> </li>
    @endforeach
</ul>
@endif

@endsection
