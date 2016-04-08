@extends('layouts.app')

@section('style')
<style media="screen">

</style>
@endsection
@section('content')
<h1>用户 > 信息 > 编辑 > {{$info->title}}</h1>

<form id="edit" method="POST" action="{{ url('/user/info/update/'.$info->id) }}">
	{!! csrf_field() !!}
	<section>
		<label for="title">标题</label>
		<input type="text" name="title" id="title" value="{{$info->title}}">
		@if ($errors->has('title'))
			<strong>{{ $errors->first('title') }}</strong>
		@endif
	</section>
	<section>
		<label for="text">描述</label>
		<input type="text" name="text" id="text" value="{{$info->text}}">
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

		@if(count($categories) > 0)
		<label for="category">类别</label>
		<select name="category" id="category">
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

	<input type="submit" value="修改">
</form>

@endsection

@section('script')
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function(){

	$("#category option").hide();
	$("#category option[data-parent='"+ $("#parent_category").val() +"']").show();
	$("#parent_category").change(function(){
		$("#category option").hide();
		$("#category option[data-parent='"+ $(this).val() +"']").show();
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
