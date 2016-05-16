@extends('layouts.app')

@section('title','用户登陆_宁安信息网')
@section('description','宁安信息网用户登录,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网用户登录,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
	<link rel="stylesheet" href="{{url('/css/login.css')}}" />
	<style media="screen">
		.add_a {
			color: #fff;
		}
	</style>
@endsection

@section('content')

<div class="main_wrap container">
	<div class="login">
		<h1>登&nbsp;录</h1>
		<form id="login" method="POST" action="{{ url('/login') }}">
			{!! csrf_field() !!}
			<section>
				<input type="text" name="name" value="{{old('name')}}" placeholder="用户名">
				@if ($errors->has('name'))
				<strong>{{ $errors->first('name') }}</strong>
				@endif
				@if( session('login'))
					<strong>{{session('login')}}</strong>
				@endif
			</section>
			<section>
				<input type="password" name="password" value="{{old('password')}}" placeholder="密码">
				@if ($errors->has('password'))
				<strong>{{ $errors->first('password') }}</strong>
				@endif
			</section>

			<input type="submit" value="登&nbsp;陆"><br><br>
			<a class="add_a" href="{{url('/register')}}">没有帐号？注册</a>
		</form>
	</div>

	<div class="main">
		<h2>宁安本地服务网站</h2>

		<ul>
			<!-- <li>
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
			</li> -->
			<li>
				<div class="icon">
					<img src="{{url('/img/icon_34564364.png')}}" />
				</div>
				<span>响应式设计，电脑、平板电脑、手机显示更合理，可以智能地根据用户行为以及使用的设备环境
					（系统平台、屏幕尺寸、屏幕定向等）进行相对应的布局。。</span>
			</li>
		</ul>
	</div>

</div>
@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/validate-phone-additional-methods.js')}}"></script>
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
				minlength : '密码长度不能小于6位',
				minlength : '密码长度不能大于50位'
			}
		},
	});

});
</script>
@endsection
