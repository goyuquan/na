@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<style media="screen">
    form {
        display: inline-block;
    }
</style>
@endsection

@section('content')

<h1>用户 > 信息 > 列表</h1>
@if(count($infos) > 0)
<table>
    <thead>
        <th> 标题 </th>
        <th> 时间 </th>
        <th>  </th>
    </thead>
    @foreach($infos as $info)
    <tr>
        <td>{{$info->title}}</td>
        <td>{{$info->publish_at}}</td>
        <td>&nbsp;
            <a href="/user/info/refresh/{{$info->id}}">刷新</a>
            <form method="POST" action="{{ url('/user/info/edit/') }}">
            	{!! csrf_field() !!}
                <input type="hidden" name="refresh" value="/user/info/edit/{{$info->id}}">
                <button type="submit">编辑</button>
            </form>
            <a href="/user/info/edit/{{$info->id}}">编辑</a>
            <a class="del" href="/user/info/delete/{{$info->id}}">删除</a>
        </td>
    </tr>
    @endforeach
</table>
@endif
<p> {{$infos->links()}} </p>

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
