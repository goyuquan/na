@extends('layouts.app')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')
<h1>用户 > 信息 > 创建 </h1>
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
	<section>
		<label for="muqian">目前</label>
		<input type="text" name="muqian" id="muqian">
	</section>
	<section>
		<label for="chengshi">城市</label>
		<input type="text" name="chengshi" id="chengshi">
	</section>


	<input type="submit" value="提交">
</form>

@endsection

@section('script')
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
