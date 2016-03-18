@extends('admin.layouts.admin')

@section('content')

<form id="edit" method="POST" action="{{ url('/admin/user/update/'.$user->id) }}">
	{!! csrf_field() !!}
	<section>
		<label for="name">用户名</label>
		<input type="text" name="name" id="name" value="{{$user->name}}">
		@if ($errors->has('name'))
			<strong>{{ $errors->first('name') }}</strong>
		@endif
	</section>
	<section>
		<label for="email">E-mail</label>
		<input type="email" name="email" id="email" value="{{$user->email}}">
		@if ($errors->has('email'))
			<strong>{{ $errors->first('email') }}</strong>
		@endif
	</section>
	<section>
		<label for="phone">手机号</label>
		<input type="text" name="phone" id="phone" value="{{$user->phone}}">
		@if ($errors->has('phone'))
		<strong>{{ $errors->first('phone') }}</strong>
		@endif
	</section>
	<section>
		<label for="password">密码</label>
		<input type="password" name="password" id="password" value="">
		@if ($errors->has('password'))
		<strong>{{ $errors->first('password') }}</strong>
		@endif
	</section>
	<section>
		<label for="password_confirmation">重复密码</label>
		<input type="password" name="password_confirmation" id="password_confirmation">
		@if ($errors->has('password_confirmation'))
		<strong>{{ $errors->first('password_confirmation') }}</strong>
		@endif
	</section>

	<input type="submit" value="修改">
</form>

@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/additional-methods.js')}}"></script>
<script type="text/javascript">
$(function(){
	var validate = $("#edit").validate({
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
				minlength : 6,
				maxlength : 50
			},
			password_confirmation : {
				minlength : 6,
				maxlength : 50,
				equalTo : '#password'
			}
		},

		messages : {
			email : {
				email : 'email 格式不正确'
			},
			phone : {
				required : '手机号码必须填写',
				isMobile : '手机号码不正确'
			},
			password : {
				min : '密码长度不能小于6位',
				max : '密码长度不能大于50位'
			},
			password_confirmation : {
				equalTo : '两次输入密码不一致'
			}
		},
	});
});
</script>
@endsection
