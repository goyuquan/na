@extends('layouts.app')

@section('title','用户注册')
@section('description','title_description')
@section('keywords','title_keywords')

@section('content')

<form id="register" method="POST" action="{{ url('/register') }}">
	{!! csrf_field() !!}
	<section>
		<label for="name">用户名</label>
		<input type="text" name="name" id="name" value="{{old('name')}}">
		@if ($errors->has('name'))
			<strong>{{ $errors->first('name') }}</strong>
		@endif
	</section>
	<section>
		<label for="email">E-mail</label>
		<input type="email" name="email" id="email" value="{{old('email')}}">
		@if ($errors->has('email'))
			<strong>{{ $errors->first('email') }}</strong>
		@endif
	</section>
	<section>
		<label for="phone">手机号</label>
		<input type="text" name="phone" id="phone" value="{{old('phone')}}">
		@if ($errors->has('phone'))
		<strong>{{ $errors->first('phone') }}</strong>
		@endif
	</section>
	<section>
		<label for="password">密码</label>
		<input type="password" name="password" id="password" value="{{old('password')}}">
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
	<section>
		<label for="distinguished">填写:abcedfg</label>
		<input type="hidden" id="distinguished" name="distinguished" value="abcedfg">
		<input type="text" class="form-control" name="distinguish" placeholder="机器人识别">
	</section>

	<input type="submit" value="注册">
</form>

@if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/additional-methods.js')}}"></script>
<script type="text/javascript">
$(function(){
	var validate = $("#register").validate({
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
				required : '输入abcedfg'
			}
		},
	});
});
</script>
@endsection
