@extends('admin.layouts.admin')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="/css/admin/edit.css">
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/user/index')}}">用户中心</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>信息发布</span>
</div>

<div class="main_wrap container">
	@include('user.layouts.sidebar')

	<div class="content_wrap">

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
				<label for="role">权限</label>
				<select name="role" value="{{$user->role}}">
					<option value="0" <?php  if($user->role == 0){ echo 'selected="selected"';}  ?>>用户</option>
					<option value="5" <?php  if($user->role == 5){ echo 'selected="selected"';}  ?>>编辑</option>
					<option value="9" <?php  if($user->role == 9){ echo 'selected="selected"';}  ?>>管理员</option>
				</select>
				@if ($errors->has('role'))
				<strong>{{ $errors->first('role') }}</strong>
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
	</div>
</div>

@endsection

@section('script')
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{url('/js/validate-phone-additional-methods.js')}}"></script>
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
				minlength : '密码长度不能小于6位',
				minlength : '密码长度不能大于50位'
			},
			password_confirmation : {
				equalTo : '两次输入密码不一致'
			}
		},
	});
});
</script>
@endsection
