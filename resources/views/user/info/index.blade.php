@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')
<h1>用户 > 信息 > 列表</h1>
@if(count($infos) > 0)
<ul>
    @foreach($infos as $info)
    <li>
        {{$info->title}}
        <a href="/user/info/edit/{{$info->id}}">编辑</a>
        <a class="del" href="/user/info/delete/{{$info->id}}">删除</a>
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
