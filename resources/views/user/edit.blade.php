@extends('admin.layouts.admin')

@section('content')


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

	<input type="submit" value="修改">
</form>

@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/additional-methods.js')}}"></script>
<script type="text/javascript">
$(function(){
	var validate = $("#category").validate({

	    submitHandler: function(form){   //表单提交句柄,为一回调函数,带一个参数：form
	        form.submit();   //提交表单
	    },

		rules : {
			name : {
				required : true,
				minlength : 1,
				maxlength : 20
			},
            alias : {
				required : true,
				minlength : 2,
				maxlength : 20
			}
		},

		messages : {
			name : {
				required : '名称不能为空',
				max : '名称最长不能大于20'
			},
            alias : {
				required : '别名不能为空',
				min : '别名最长不能小于2'
				max : '别名最长不能大于20'
			}
		}

	});
});
</script>
@endsection
