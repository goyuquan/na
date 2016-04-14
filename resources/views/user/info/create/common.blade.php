@extends('layouts.app')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')

@include('common.thumbnail')
@section('content')
<h1>用户 > 信息 > 创建(common) </h1>
<form id="create" method="POST" action="{{ url('/user/info/create/') }}">
	<input type="hidden" name="category_id" value="{{$category->id}}">
	{!! csrf_field() !!}
	<section>
		<label for="title">标题</label>
		<input type="text" name="title" id="title">
	</section>
	<section>
		<label for="text">正文</label>
		<input type="text" name="text" id="text">
	</section>
	@if(Auth::User()->role > 1)
		<section>
			<label for="publish_at">发布时间</label>
			<input type="date" name="publish_at" id="publish_at">
		</section>
	@endif
	<section class="thumb_wrap">
		<label for="thumbnail">缩略图</label>
		<button type="button" id="thumbnail_bt">上传缩略图</button>
	</section>
	<section class="photo_wrap">
		<label for="photos">图片</label>
		<input type="hidden" id="photos_sha1" name="photos_sha1" value="{{sha1(time())}}">
		<button type="button" id="photos_bt">上传图片</button>
	</section>


	<input type="submit" value="提交">
</form>

@endsection

@section('script')
<script src="{{url('/js/thumbnail.js')}}"></script>
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="http://apps.bdimg.com/libs/dropzone/3.8.4/dropzone.min.js"></script>
<script type="text/javascript">
$(function(){

    $("#my-awesome-dropzone").dropzone({
        url: "/upload/photos/"+$("#photos_sha1").val(),
        parallelUploads: 1,
        maxFilesize: 0.5,
		maxFiles:10,
        thumbnailWidth: 100,
        thumbnailHeight: 100,
        dictFileTooBig:"文件太大了",
        dragenter:function(){
			$("#my-awesome-dropzone").css("border-color","#eea236");
		},
		dragleave:function(){
			$("#my-awesome-dropzone").css("border-color","#398439");
		}
     });

	var validate = $("#create").validate({
	    debug: true, //调试模式取消submit的默认提交功能
	    submitHandler: function(form){   //表单提交句柄,为一回调函数,带一个参数：form
	        form.submit();   //提交表单
	    },

		rules : {
			title : {
				required : true,
				minlength : 5,
				maxlength : 50
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
				minlength : '标题最长不能小于5',
				maxlength : '标题最长不能大于50'
			},
			text : {
				required : '内容不能为空',
				minlength : '内容最长不能小于10',
				maxlength : '内容最长不能大于1000'
			}
		},
	});
});
</script>
@endsection
