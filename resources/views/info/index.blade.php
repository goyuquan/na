@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')

@if(count($categories) > 0)
<ul>
    @foreach ( $categories as $category )
        @if ( $category->parent_id == NULL)
            <li><a href="{{ url('/infos/category/'.$category->alias) }}"><b>{{ $category->name }}</b></a>
                @if ( !App\Category::where('parent_id',$category->id)->get()->isEmpty() )

                    <ul>
                        @foreach ( $categoriess as $category_ )
                            @if ($category_->parent_id === $category->id)
                                <li>
                                    <a href="{{ url('/infos/category/'.$category_->alias) }}">{{ $category_->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                @endif
            </li>
        @endif
    @endforeach
</ul>
@endif

@endsection
