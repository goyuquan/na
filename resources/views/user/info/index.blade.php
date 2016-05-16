@extends('user.layouts.app')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="{{url('/css/user/info_list.css')}}" />
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">宁安信息网</a>
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
