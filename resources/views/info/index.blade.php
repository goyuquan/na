@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')


@foreach($contents as $content)
    {{$content}}<br>
@endforeach

@endsection
