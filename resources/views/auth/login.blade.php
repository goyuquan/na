@extends('layouts.app')

@section('title','用户登陆')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
	<link rel="stylesheet" href="{{url('/css/login.css')}}" />
@endsection

@section('content')

<div class="main_wrap container">
	<div class="login">
		<h1>登&nbsp;录</h1>
		<form id="login" method="POST" action="{{ url('/login') }}">
			{!! csrf_field() !!}
			<section>
				<input type="text" name="name" id="name" value="{{old('name')}}" placeholder="用户名">
				@if ($errors->has('name'))
				<strong>{{ $errors->first('name') }}</strong>
				@endif
			</section>
			<section>
				<input type="password" name="password" id="password" value="{{old('password')}}" placeholder="密码">
				@if ($errors->has('password'))
				<strong>{{ $errors->first('password') }}</strong>
				@endif
			</section>

			<input type="submit" value="登&nbsp;陆">
		</form>
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

	var validate = $("#login2").validate({
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
