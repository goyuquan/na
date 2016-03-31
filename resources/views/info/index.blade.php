@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')
<h1>全部类别</h1>
@if(count($categoriess) > 0)
<ul>
    @foreach ( $categoriess as $category )
        <li><b>{{ $category->name }}</b>
            @if ( !App\Category::where('parent_id',$category->id)->get()->isEmpty() )
                <ul>
                    @foreach ( $categories as $category_ )
                        @if ($category_->parent_id === $category->id)
                            <li>
                                <a href="{{ url('/infos/category/'.$category_->id.'/page/1') }}">{{ $category_->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
@endif

@endsection
