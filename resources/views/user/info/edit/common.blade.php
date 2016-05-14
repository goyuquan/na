@extends('user.layouts.app')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')

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
				<textarea type="text" name="text">{{$info->text}}</textarea>
				@if ($errors->has('text'))
					<strong>{{ $errors->first('text') }}</strong>
				@endif
			</section>
			<section>
				@if(count($categoriess) > 0)
				<label for="parent_category">父类别</label>
				<select name="parent_category" id="parent_category">
					@foreach ( $categoriess as $category )
					<option value="{{$category->id}}"
						@if($category->id == $current_category->parent_id)
						 selected="selected"
						 @endif
						>{{$category->name}}</option>
					@endforeach
				</select>
				@endif
                &nbsp;&nbsp;
				@if(count($categories) > 0)
				<label for="category">类别</label>
				<select name="category_id" id="category">
					@foreach ( $categories as $category )
					<option value="{{$category->id}}" data-parent="{{$category->parent_id}}"
						@if($category->id == $current_category->id)
						selected="selected"
						@endif
						>{{$category->name}}</option>
					@endforeach
				</select>
				@endif
			</section>
            <section>
				<label for="phone">电话号码</label>
				<input type="text" name="phone" value="{{ Auth::user()->phone }}">
			</section>
			<section class="thumb_wrap">
				<label for="thumbnail">缩略图</label>
				@if(isset($content->thumbnail))
				<img id="thumbnail" name="{{$content->thumbnail}}" src="{{url('/uploads/thumbnails/'.$content->thumbnail)}}" />
				<button type="button" id="delete_thumb">删除</button>
				@else
				<button type="button" id="thumbnail_bt">上传缩略图</button>
				@endif
			</section>
			<section class="photo_wrap">
				<label for="photos">图片</label>
					@if($photos && count($photos) > 0)
						@foreach($photos as $photo)
						<img src="{{url('uploads/thumbnails/'.$photo->name)}}" />
						@endforeach
						<button type="button" id="delete_photos">删除</button>
					@else
						<button type="button" id="photos_bt">上传图片</button>
					@endif
				<input type="hidden" id="photos_sha1" name="photos_sha1" value="{{ $content->photos_sha1 or sha1(time()) }}">
			</section>

			<input type="submit" value="修改">
		</form>
	</div>
</div>
@endsection

@section('script')
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
@include('user.info.edit.category_select')
<script src="{{url('/js/thumbnail.js')}}"></script>
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/dropzone.min.js')}}"></script>
<script type="text/javascript">
$(function(){

	$('#delete_thumb').click(function(){
		var src = $("#thumbnail").attr("name");
		var page = $("input[name='page']").val();
		$.ajax({
			type:"GET",
			url:"/delete/page/"+page+"/thumbnail/"+src,
			success:function(data){
				console.log(data);
				$("#delete_thumb").after('<label for="thumbnail">缩略图</label> <button type="button" id="thumbnail_bt">上传缩略图</button>')
				$("#delete_thumb,#thumbnail").remove();
			}
		});
	});

	$('#delete_photos').click(function(){
		var page = $("input[name='page']").val();
		var sha1 = $("#photos_sha1").val();
		$.ajax({
			type:"GET",
			url:"/delete/page/"+page+"/photos/"+sha1,
			success:function(data){
				console.log(data);
				$("#delete_photos").after('<button type="button" id="photos_bt">上传图片</button>');
				$("#delete_photos,.photo_wrap img").remove();
			}
		});
	});

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

	var validate = $("#edit").validate({
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
		}
	});

});
</script>
@endsection
