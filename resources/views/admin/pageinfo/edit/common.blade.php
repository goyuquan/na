@extends('layouts.app')


@section('content')
<h1>页面 > 记录 > 新建  </h1>
<form id="edit" method="POST" action="{{ url('/admin/pageinfo/update/'.$pageinfo->id) }}">
	{!! csrf_field() !!}
	<section>
		<label for="title">标题</label>
		<input type="text" name="title" id="title" value="{{$pageinfo->title}}">
	</section>
	<section>
		<label for="text">正文</label>
		<input type="text" name="text" id="text" value="{{$pageinfo->text}}">
	</section>
	<section>
		<label for="publish_at">发布时间</label>
		<input type="date" name="publish_at" id="publish_at" value="{{ substr($pageinfo->publish_at,0,10) }}">
	</section>


	<input type="submit" value="提交">
</form>

@endsection

@section('script')
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function(){

	var validate = $("#edit").validate({
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