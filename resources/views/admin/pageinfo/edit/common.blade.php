@extends('admin.layouts.admin')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

<?php $dashboard_="";$user_="";$_category_="";$page_="active";$article_="" ?>

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/form.css')}}" />
<style media="screen">
    h1 {
        text-align: center;
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
    <span>内容编辑</span>
</div>

<div class="main_wrap container">

	<div class="content_wrap">
		<h1>{{$page->name}}</h1>
		<hr>
		<form id="edit" method="POST" action="{{ url('/admin/pageinfo/update/'.$pageinfo->id) }}">
			{!! csrf_field() !!}
			<section>
				<label for="title">标题</label>
				<input type="text" name="title" value="{{$pageinfo->title}}">
			</section>
			<section>
				<label for="text">正文</label>
                <textarea name="text" rows="10" cols="50">{{$pageinfo->text}}</textarea>
			</section>
			<section>
				<label for="muqian">目前</label>
				<input type="text" name="muqian" value="{{$content->muqian}}">
			</section>
			<section>
				<label for="publish_at">发布时间</label>
				<input type="date" name="publish_at" value="{{ substr($pageinfo->publish_at,0,10) }}">
			</section>


			<input type="submit" value="提交">
		</form>
	</div>
</div>
@endsection

@section('script')
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
<script type="text/javascript">
$(function(){

	var validate = $("#edit").validate({
	    debug: true, //调试模式取消submit的默认提交功能
	    submitHandler: function(form){   //表单提交句柄,为一回调函数,带一个参数：form
	        form.submit();   //提交表单
	    },
		rules : {
			title : {
				required : true,
				minlength : 5,
				maxlength : 50
			},
			text : {
				required : true,
				minlength : 10,
				maxlength : 1000
			}
		},
		messages : {
			title : {
				required : '标题不能为空',
				minlength : '标题最长不能小于5',
				maxlength : '标题最长不能大于50'
			},
			text : {
				required : '内容不能为空',
				minlength : '内容最长不能小于10',
				maxlength : '内容最长不能大于1000'
			}
		},
	});
});
</script>
@endsection
