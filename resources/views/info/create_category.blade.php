@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')

@if(count($categories) > 0)
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{url('/info/create/category/'.$category->id)}}">{{$category->name}}</a>
            </li>
        @endforeach
    </ul>
@endif
@endsection
