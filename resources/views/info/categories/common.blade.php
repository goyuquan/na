@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')
<h1>全部类别 > {{$category->name}}</h1>

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

@endsection
