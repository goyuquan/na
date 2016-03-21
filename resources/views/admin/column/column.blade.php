@extends('admin.layouts.admin')

@section('content')

<h1>{{$category->name}}</h1>
@if(count($columns) > 0)
    <ul>
    @foreach($columns as $column)
        <li>{{$column->name}}
            <a href="/admin/column/edit/{{$column->id}}">编辑</a>
            <a class="del" href="/admin/column/delete/{{$column->id}}">删除</a>
        </li>
    @endforeach
    </ul>
@endif
<form id="column" method="POST" action="{{ url('/admin/column/create/'.$category->id) }}">
    <input type="hidden" name="category" value="{{$category->id}}">
	{!! csrf_field() !!}
	<section>
		<label for="name">字段名称</label>
		<input type="text" name="name" id="name">
		@if ($errors->has('name'))
			<strong>{{ $errors->first('name') }}</strong>
		@endif
	</section>

	<input type="submit" value="添加">
</form>

@endsection
@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
$(function(){

    $(".del").click(function(e){
        var r=confirm("确认删除");
        if (r==false) {
            e.preventDefault();
        }
    });

	var validate = $("#column").validate({
	    debug: true, //调试模式取消submit的默认提交功能
	    submitHandler: function(form){   //表单提交句柄,为一回调函数,带一个参数：form
	        form.submit();   //提交表单
	    },

		rules : {
			name : {
				required : true,
				minlength : 1,
				maxlength : 50
			}
		},

		messages : {
			name : {
				required : '名称不能为空',
				max : '名称最长不能大于50'
			}
		}

	});
});
</script>
@endsection
