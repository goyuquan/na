@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')

@if(count($infos) > 0)
<ul>
    @foreach ( $infos as $info )
        @if ( $info->parent_id == NULL)
            <li><b>{{ $info->name }}</b>
            </li>
        @endif
    @endforeach
</ul>
@endif

@endsection
