@extends('user.layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/user/info_list.css')}}" />
@endsection

@section('style')
<style media="screen">
    form {
        display: inline-block;
    }
</style>
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/user/index')}}">用户中心</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>信息管理</span>
</div>

<div class="main_wrap container">
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
                <a href="/user/info/edit/{{$info->id}}">编辑</a>
                <a class="del" href="/user/info/delete/{{$info->id}}">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
    <p> {{$infos->links()}} </p>
</div>

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
