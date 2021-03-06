@extends('user.layouts.app')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="/css/upload.css">
<link rel="stylesheet" href="/css/user/edit.css">
@endsection

@include('common.thumbnail')
@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/user/index')}}">用户中心</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>信息发布</span>
</div>

<div class="main_wrap container">
    @include('user.layouts.sidebar')

    <div class="content_wrap">
		<form id="edit" method="POST" action="{{ url('/user/info/update/'.$info->id) }}">
			<input type="hidden" name="page" value="{{$info->id}}">
			{!! csrf_field() !!}
			<section>
				<label for="title">标题</label>
				<input type="text" name="title" value="{{$info->title}}">
				@if ($errors->has('title'))
					<strong>{{ $errors->first('title') }}</strong>
				@endif
			</section>
			<section>
				<label for="text">描述</label>
				<textarea type="text" name="text" rows="5" cols="51">{{$info->text}}</textarea>
				@if ($errors->has('text'))
					<strong>{{ $errors->first('text') }}</strong>
				@endif
			</section>
            <section>
                <label for="who">联系人</label>
                <input type="text" name="who" value="{{ $content->who }}">
            </section>
            <section>
                <label for="phone">电话号码</label>
                <input type="text" name="phone" value="{{ $content->phone }}">
            </section>
			@if(Auth::User()->role > 1)
			<section>
				<label for="publish_at">发布时间</label>
				<input type="date" name="publish_at" value="{{ substr($info->publish_at,0,10) }}">
			</section>
			@endif
			<section class="thumb_wrap">
				<label for="thumbnail">缩略图</label>
				@if(isset($content->thumbnail))
                <input type="hidden" name="thumbnail" value="{{$content->thumbnail}}">
				<img id="thumbnail" name="{{$content->thumbnail}}" src="{{url('/uploads/thumbnails/'.$content->thumbnail)}}" />
				<button type="button" id="delete_thumb">删除</button>
				@else
				<button type="button" id="thumbnail_bt">上传缩略图</button>
				@endif
			</section>

            @include('common.photo_edit')

			<input type="submit" value="修改">
		</form>
	</div>
</div>
@endsection

@section('script')
<script src="{{url('/js/thumbnail.js')}}"></script>
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/validate-phone-additional-methods.js')}}"></script>
@include('common.photo_edit_js')
<script type="text/javascript">
$(function(){

	var validate = $("#edit").validate({
	    submitHandler: function(form){   //表单提交句柄,为一回调函数,带一个参数：form
	        form.submit();   //提交表单
	    },
		rules : {
			title : {
				required : true,
				minlength : 4,
				maxlength : 30
			},
            text : {
				required : true,
				minlength : 10,
				maxlength : 1000
			}
		},
		messages : {
			title : {
				required : '标题不能为空',
				minlength : '标题最长不能小于4',
				maxlength : '标题最长不能大于30'
			},
            text : {
				required : '内容不能为空',
				minlength : '内容最长不能小于10',
				maxlength : '内容最长不能大于1000'
			}
		}
	});

});
</script>
@endsection
