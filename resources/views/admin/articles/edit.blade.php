@extends('admin.layouts.admin')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="/css/admin/form.css">
<style media="screen">
    label:first-child {
        width: auto!important;
    }
</style>
@endsection
<?php $dashboard_="";$user_="";$_category_="";$page_="";$article_="active" ?>

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/admin/index')}}">后台首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/admin/articles')}}">文章管理</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>创建文章</span>
</div>

<div class="main_wrap container">
    <div class="content_wrap">

        <form id="create" method="POST" action="{{ url('/admin/article/update/'.$article->id) }}">
            {!! csrf_field() !!}

            <section>
                <label for="title">标题</label>
                <input type="text" name="title" value="{{$article->title}}">
                @if ($errors->has('title'))
                <label>{{ $errors->first('title') }}</label>
                @endif
            </section>
            <section>
                <label for="publish_at">发布时间</label>
                <input type="date" name="publish_at" value="{{substr($article->publish_at,0,10)}}">
                @if ($errors->has('publish_at'))
                <label>{{ $errors->first('publish_at') }}</label>
                @endif
            </section>
            <section>
                <textarea name="text" >{{$article->text}}</textarea>
                @if ($errors->has('text'))
                <label>{{ $errors->first('text') }}</label>
                @endif
            </section>

            <input type="submit" value="提交">
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/tinymce.min.js')}}"></script>
<script>

tinymce.init({
  selector: '#text',
  a_plugin_option: true,
  a_configuration_option: 400,
  height: 500,
  plugins : 'advlist autolink link image lists charmap print preview',
  toolbar: 'undo, redo, selectall, removeformat'
});

$(function(){

    var $creat_form = $("#create").validate({//表单验证
		// Rules for form validation
		rules : {
			title : {
				required : true,
				minlength : 2,
				maxlength : 200
			}
		},

		// Messages for form validation
		messages : {
			title : {
				required : '请输入标题',
                minlength : '不能小于2位',
                maxlength : '不能大于200位',
			}
		}
	});

});
</script>

@endsection
