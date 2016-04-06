@extends('layouts.app')

@section('title',"搜索")
@section('description',"搜索")
@section('keywords',"搜索")

@section('content')

@if(count($results) > 0)
    <ul>
        @foreach($results as $result)
            <li>
                <a href="/info/{{$result->id}}">{{$result->title}}</a>
            </li>
        @endforeach
    </ul>
    {{$results->links()}}
@endif

@endsection

@section('script')

<script type="text/javascript">

</script>
@endsection
