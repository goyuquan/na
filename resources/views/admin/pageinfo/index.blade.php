@extends('admin.layouts.admin')

@section('content')

<h1>{{$page->name}}</h1>
<a href="/admin/pageinfo/create/{{$page->id}}">添加</a>
@if(count($pageinfos) > 0)
    <ul>
        @foreach($pageinfos as $pageinfo)
        <li>
            {{$pageinfo->title}}&nbsp;
            <a href="/admin/pageinfo/edit/{{$pageinfo->id}}">编辑</a>
            <a class="del" href="/admin/pageinfo/delete/{{$pageinfo->id}}">删除</a>
        </li>
        @endforeach
    </ul>
@endif

@endsection
@section('script')
<script type="text/javascript">
$(function(){
    $(".del").click(function(e){
        var r=confirm("确认删除");
        if (r==false) {
            e.preventDefault();
        }
    });
});
</script>
@endsection
