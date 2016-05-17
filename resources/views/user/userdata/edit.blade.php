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
				<input type="text" name="name" value="{{$user->name}}">
			</section>
			<section>
				<label for="email">email</label>
				<input type="text" name="email" value="{{$user->email}}">
			</section>
			<section>
				<label for="phone">手机号</label>
				<input type="text" name="phone" value="{{$user->phone}}">
			</section>
			<section>
				<label for="password">密码</label>
				<input type="password" name="password">
			</section>
			<section>
				<label for="password">重复密码</label>
				<input type="password" name="password">
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
			name : {
				required : true,
				minlength : 2,
				maxlength : 30
			},
			email : {
				required : true,
				minlength : 10,
				maxlength : 1000
			},
			phone : {
				required : true,
				isMobile : true
			},
		},

		messages : {
			name : {
				required : '标题不能为空',
				minlength : '标题最长不能小于2位',
				maxlength : '标题最长不能大于30'
			},
			email : {
				required : '正文内容不能为空',
				minlength : '正文内容最长不能小于10',
				maxlength : '正文内容最长不能大于1000'
			},
			phone : {
				required : '手机号不能为空',
				isMobile : '手机号格式不正确'
			},
		},
	});
});
</script>
@endsection
