@extends('user.layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/user/info_list.css')}}" />
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/user/index')}}">用户中心</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>信息管理</span>
</div>

<div class="main_wrap container">
    @include('user.layouts.sidebar')

    <div class="content_wrap">

        <a class="add" href="{{url('/user/info/create_category')}}">发布新信息</a>
         <span> 用户信息每天可以刷新一次置顶 </span>

         <hr>
        @if(count($infos) > 0)

        <table>
            <thead>
                <th> 标题 </th>
                <th> 时间 </th>
                @if($user->role > 4)
                    <th> 用户 </th>
                @endif
                <th> 管理 </th>
            </thead>
            @foreach($infos as $info)
            <tr>
                <td>{{$info->title}}</td>
                <td>{{ substr($info->publish_at,0,10) }}</td>
                @if($user->role > 4)
                <td> {{$info->user->name}} </td>
                @endif
                <td>&nbsp;
                    @if( time() - strtotime($info->publish_at) > (60*60*24))
                        <a href="/user/info/refresh/{{$info->id}}">刷新</a>
                    @endif
                    <a href="/user/info/edit/{{$info->id}}">编辑</a>
                    <a class="del" href="/user/info/delete/{{$info->id}}">删除</a>
                </td>
            </tr>
            @endforeach
        </table>
        @endif
        <p> {{$infos->links()}} </p>
    </div>
</div>

@endsection

@section('script')
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
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
