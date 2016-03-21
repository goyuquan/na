@extends('admin.layouts.admin')

@section('content')

@if(count($categories) > 0)
<ul>
    @foreach ( $categories as $category )
        @if ( $category->parent_id == NULL)
            <li><b>{{ $category->name }}</b>
                @if ( !App\Category::where('parent_id',$category->id)->get()->isEmpty() )

                    <ul> @foreach ( $categoriess as $category_ )
                        @if ($category_->parent_id === $category->id)
                        <li>
                            <a href="/admin/column/category/{{$category->id}}"><small> {{$category_->name}} </small></a>
                        </li>
                        @endif
                    @endforeach </ul>

                @endif
            </li>
        @endif
    @endforeach
</ul>
@endif
@endsection
