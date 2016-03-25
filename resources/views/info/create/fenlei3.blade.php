@extends('layouts.app')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')

<form id="create" method="POST" action="{{ url('/info/create/') }}">
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
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
$(function(){
	var validate = $("#creates").validate({
	    debug: true, //调试模式取消submit的默认提交功能
	    submitHandler: function(form){   //表单提交句柄,为一回调函数,带一个参数：form
	        form.submit();   //提交表单
	    },

		rules : {
			name : {
				required : true,
				minlength : 2,
				maxlength : 20
			},
			email : {
				email : true
			},
			phone : {
				required : true,
				isMobile : true
			},
			password : {
				required : true,
				minlength : 6,
				maxlength : 50
			},
			password_confirmation : {
				required : true,
				minlength : 6,
				maxlength : 50,
				equalTo : '#password'
			},
			distinguish : {
				equalTo : '#distinguished',
				required : true
			}
		},

		messages : {
			name : {
				required : '请输入用户名'
			},
			email : {
				required : '请输入 email',
				email : 'email 格式不正确'
			},
			phone : {
				required : '手机号码必须填写',
				isMobile : '手机号码不正确'
			},
			password : {
				required : '请输入密码',
				min : '密码长度不能小于6位',
				max : '密码长度不能大于50位'
			},
			password_confirmation : {
				required : '重复密码不能为空',
				equalTo : '两次输入密码不一致'
			},
			distinguish : {
				required : '输入abcedfg',
				equalTo : '输入abcedfg'
			}
		},
	});
});
</script>
@endsection
