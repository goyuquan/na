@extends('admin.layouts.admin')


@section('content')
<h1>页面 > 记录 > 新建  </h1>
<form id="create" method="POST" action="{{ url('/admin/pageinfo/create/'.$page->id) }}">
	{!! csrf_field() !!}
	<section>
		<label for="title">单位名称</label>
		<input type="text" name="title" id="title">
	</section>
	<section>
		<label for="tele">电话号码</label>
		<input type="text" name="tele" id="text">
	</section>
	<section>
		<label for="text">内容</label>
		<input type="text" name="text" id="text">
	</section>
	<section>
		<label for="publish_at">发布时间</label>
		<input type="date" name="publish_at" id="publish_at">
	</section>


	<input type="submit" value="提交">
</form>

@endsection

@section('script')
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function(){

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
				required : false,
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
