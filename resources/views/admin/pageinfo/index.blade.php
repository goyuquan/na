@extends('admin.layouts.admin')

@section('content')

<h1>{{$page->name}}</h1>
<a href="/admin/pageinfo/create/{{$page->id}}">添加</a>
@if(count($pageinfos) > 0)
    <ul>
        @foreach($pageinfos as $pageinfo)
        <li>
            {{$pageinfo->title}}&nbsp;
            <a href="#">编辑</a>
            <a href="#">删除</a>
        </li>
        @endforeach
    </ul>
@endif

@endsection
