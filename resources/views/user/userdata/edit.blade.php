@extends('user.layouts.app')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="/css/user/create.css">
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/user/index')}}">用户中心</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>修改资料</span>
</div>

<div class="main_wrap container">
    @include('user.layouts.sidebar')

    <div class="content_wrap">
		<form id="edit" method="POST" action="{{ url('/user/userdata/update/'.$user->id) }}">
			{!! csrf_field() !!}
			<section>
				<label for="name">用户名</label>
				<input type="text" name="name" value="{{$user->name}}" disabled="disabled">
                @if ($errors->has('name'))
                <strong>{{ $errors->first('name') }}</strong>
                @endif
			</section>
			<section>
				<label for="email">email</label>
				<input type="text" name="email" value="{{$user->email}}">
                @if ($errors->has('email'))
                <strong>{{ $errors->first('email') }}</strong>
                @endif
			</section>
			<section>
				<label for="phone">手机号</label>
				<input type="text" name="phone" value="{{$user->phone}}">
                @if ($errors->has('phone'))
                <strong>{{ $errors->first('phone') }}</strong>
                @endif
			</section>
			<section>
				<label for="password">密码</label>
				<input type="password" name="password" id="password">
                @if ($errors->has('password'))
                <strong>{{ $errors->first('password') }}</strong>
                @endif
			</section>
			<section>
				<label for="password_confirmation">重复密码</label>
				<input type="password" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                <strong>{{ $errors->first('password_confirmation') }}</strong>
                @endif
			</section>
			<input type="submit" value="提交">
		</form>
	</div>
</div>

@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/validate-phone-additional-methods.js')}}"></script>
<script type="text/javascript">
$(function(){

	var validate = $("#edit").validate({
	    debug: true,
	    submitHandler: function(form){
	        form.submit();
	    },

        rules : {
			email : {
				email : true
			},
			phone : {
				required : true,
				isMobile : true
			},
			password : {
				required : false,
				minlength : 6,
				maxlength : 50
			},
			password_confirmation : {
				required : false,
				equalTo : '#password'
			}
		},

		messages : {
			email : {
				required : '请输入 email',
				email : 'email 格式不正确'
			},
			phone : {
				required : '手机号码必须填写',
				isMobile : '手机号码不正确'
			},
			password : {
				minlength : '密码长度不能小于6位',
				maxlength : '密码长度不能大于50位'
			},
			password_confirmation : {
				required : '重复密码不能为空',
				equalTo : '两次输入密码不一致'
			}
		},

	});
});
</script>
@endsection
