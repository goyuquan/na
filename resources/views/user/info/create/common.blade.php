@extends('layouts.app')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<style media="screen">
	#background {
		background: rgba(0, 0, 0, 0.5);
		position: absolute;
		top:0;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
		display: none;
		z-index: 1;
	}
	#myModal {
		position: absolute;
		width: 350px;
		height: 100px;
		position: absolute;
		top:0;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
		background: #fff;
		padding: 2em;
		border: 1px solid #666;
		z-index: 2;
	}
	#progress {
		width: 1%;
		height: 20px;
		line-height: 20px;
		background: #337ab7;
		margin: 1em 0;
		border: 1px solid #333;
		color:#fff;
		text-align: right;
		box-sizing: border-box;
	}
</style>
@endsection
@include('common.thumbnail')
@section('content')
<h1>用户 > 信息 > 创建(common) </h1>
<form id="create" method="POST" action="{{ url('/user/info/create/') }}">
	<input type="hidden" name="category_id" value="{{$category->id}}">
	{!! csrf_field() !!}
	<section>
		<label for="title">标题</label>
		<input type="text" name="title" id="title">
	</section>
	<section>
		<label for="text">正文</label>
		<input type="text" name="text" id="text">
	</section>
	@if(Auth::User()->role > 1)
		<section>
			<label for="publish_at">发布时间</label>
			<input type="date" name="publish_at" id="publish_at">
		</section>
	@endif
	<section>
		<label for="thumbnail">缩略图</label>
		<button type="button" name="button"  id="thumbnail_bt">上传缩略图</button>
	</section>


	<input type="submit" value="提交">
</form>

@endsection

@section('script')
<script src="{{url('/js/thumbnail.js')}}"></script>
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function(){

	var validate = $("#create").validate({
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
