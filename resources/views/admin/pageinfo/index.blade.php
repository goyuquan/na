@extends('admin.layouts.admin')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

<?php $dashboard_="";$user_="";$_category_="";$page_="active";$article_="" ?>

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/table.css')}}" />
<style media="screen">
    .content_wrap table tr td:first-child {
        color: #000;
    }
    h1 {
        text-align: center;
    }
    .add {
        padding: 0.5em 1.6em;
        color: #fff;
        font-size: 1rem;
        border-radius: 0.3rem;
        background: #3378af;
    }
    .add:hover {
        color: #fff;
        background: #a94442;
    }
</style>
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/admin/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/admin/pages')}}">页面管理</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>{{$page->name}}</span>
</div>

<div class="main_wrap container">

    <div class="content_wrap">
        <h1>
            {{$page->name}}
            <a class="add" href="/admin/pageinfo/create/{{$page->id}}">添加</a>
        </h1>
        <hr>

        @if(count($pageinfos) > 0)
            <table>
                <thead>
                    <th> 标题 </th>
                    <th> 操作 </th>
                </thead>
                @foreach($pageinfos as $pageinfo)
                <tbody>
                    <tr>
                        <td>
                            {{$pageinfo->title}}
                        </td>
                        <td>
                            <a href="/admin/pageinfo/edit/{{$pageinfo->id}}">编辑</a>
                            <a class="del" href="/admin/pageinfo/delete/{{$pageinfo->id}}">删除</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>

            {{$pageinfos->links()}}
        @endif
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
