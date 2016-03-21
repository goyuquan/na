@extends('admin.layouts.admin')

@section('content')

<h1>{{$category->name}}</h1>

<form id="column" method="POST" action="{{ url('/admin/column/update/'.$edit) }}">
{!! csrf_field() !!}
@if(count($columns) > 0)
    <ul>
    @foreach($columns as $column)
        <li>
        @if($column->id == $edit)
            <input type="text" name="name" id="name" value="{{$column->name}} ">
            @if ($errors->has('name'))
            <strong>{{ $errors->first('name') }}</strong>
            @endif
            <input type="submit" value="修改">
        @else
            {{$column->name}}
        @endif
        </li>
    @endforeach
    </ul>
@endif

</form>

@endsection
@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
$(function(){

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
