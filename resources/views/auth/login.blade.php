@extends('layouts.app')

@section('title','用户登陆')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')

<form id="login" method="POST" action="{{ url('/login') }}">
	{!! csrf_field() !!}
	<section>
		<label for="name">用户名</label>
		<input type="text" name="name" id="name" value="{{old('name')}}">
		@if ($errors->has('name'))
			<strong>{{ $errors->first('name') }}</strong>
		@endif
	</section>
	<section>
		<label for="password">密码</label>
		<input type="password" name="password" id="password" value="{{old('password')}}">
		@if ($errors->has('password'))
			<strong>{{ $errors->first('password') }}</strong>
		@endif
	</section>

	<input type="submit" value="登陆">
</form>

@endsection

@section('script')
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="{{url('/js/additional-methods.js')}}"></script>
<script type="text/javascript">
$(function(){
	var validate = $("#login").validate({
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
			password : {
				required : true,
				minlength : 6,
				maxlength : 50
			}
		},

		messages : {
			name : {
				required : '请输入用户名'
			},
			password : {
				required : '请输入密码',
				min : '密码长度不能小于6位',
				max : '密码长度不能大于50位'
			}
		},
	});
});
</script>
@endsection
