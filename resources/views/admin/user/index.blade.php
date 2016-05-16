@extends('admin.layouts.admin')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

<?php $dashboard_="";$user_="active";$_category_="";$page_="";$article_="" ?>

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/table.css')}}" />
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>用户管理</span>
</div>

<div class="main_wrap container">

    <div class="content_wrap">

        @if(count($users) > 0)
        <table>
            <thead>
                <th> ID </th>
                <th> 用户名 </th>
                <th> email </th>
                <th> 手机号 </th>
                <th> 权限 </th>
                <th> 注册时间 </th>
                <th> 更新时间 </th>
                <th>  </th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->phone}} </td>
                    <td> {{$user->role}} </td>
                    <td> {{substr($user->created_at,0,10)}} </td>
                    <td> {{substr($user->updated_at,0,10)}} </td>
                    <td>
                        <a href="{{url('/admin/user/edit/'.$user->id)}}">编辑</a>
                        <a class="del" href="{{url('/admin/user/delete/'.$user->id)}}">删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <div class="pagenation">
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
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
