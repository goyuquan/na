@extends('layouts.app')

@section('title','用户登陆')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
	<link rel="stylesheet" href="{{url('/css/login.css')}}" />
@endsection

@section('content')

<div class="main_wrap container">
	<div class="form">

		<div class="register">
			<h1>注&nbsp;册</h1>
			<form id="register" method="POST" action="{{ url('/register') }}">
				{!! csrf_field() !!}
				<section>
					<input type="text" name="name" value="{{old('name')}}" placeholder="用户名">
					@if ($errors->has('name'))
					<strong>{{ $errors->first('name') }}</strong>
					@endif
				</section>
				<section>
					<input type="email" name="email" value="{{old('email')}}" placeholder="Email">
					@if ($errors->has('email'))
					<strong>{{ $errors->first('email') }}</strong>
					@endif
				</section>
				<section>
					<input type="text" name="phone" value="{{old('phone')}}" placeholder="手机号">
					@if ($errors->has('phone'))
					<strong>{{ $errors->first('phone') }}</strong>
					@endif
				</section>
				<section>
					<input type="password" name="password" id="password" value="{{old('password')}}" placeholder="密码">
					@if ($errors->has('password'))
					<strong>{{ $errors->first('password') }}</strong>
					@endif
				</section>
				<section>
					<input type="password" name="password_confirmation" placeholder="重复密码">
					@if ($errors->has('password_confirmation'))
					<strong>{{ $errors->first('password_confirmation') }}</strong>
					@endif
				</section>
				<section>
					<input type="hidden" id="distinguished" name="distinguished" value="abcedfg" >
					<input type="text" name="distinguish" placeholder="填写:abcedfg" >
				</section>

				<input type="submit" value="注&nbsp;册">
			</form>

		</div>
	</div>
	<div class="main">
		<h2>this is a useful website</h2>

		<ul>
			<li>
				<div class="icon">
					<img src="{{url('/img/icon_3456464653364.png')}}" />
				</div>
				<span>Lorem ipsum dolor sit amet, consectetuipsum dolor sit amet, consectetuipsum dolor sit amet, consectetur</span>
			</li>
			<li>
				<div class="icon">
					<img src="{{url('/img/icon_34564365464.png')}}" />
				</div>
				<span>Lorem ipsum dolor sit amet, consectetuipsum dolor sit amet, consectetuipsum dolor sit amet, consectetur</span>
			</li>
			<li>
				<div class="icon">
					<img src="{{url('/img/icon_34564364.png')}}" />
				</div>
				<span>Lorem ipsum dolor sit amet, consectetuipsum dolor sit amet, consectetuipsum dolor sit amet, consectetur</span>
			</li>
		</ul>
	</div>

</div>
@endsection

@section('script')
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="{{url('/js/validate-phone-additional-methods.js')}}"></script>
<script type="text/javascript">
$(function(){

	var validate = $("#register2").validate({
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
				minlength : '密码长度不能小于6位',
				maxlength : '密码长度不能大于50位'
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
