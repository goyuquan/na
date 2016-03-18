@extends('admin.layouts.admin')

@section('content')

@if(count($categories) > 0)
<ul>
    @foreach ( $categories as $category )
        @if ( $category->parent_id == NULL)
            <li><span>{{ $category->name }}</span>
                @if ( !App\Category::where('parent_id',$category->id)->get()->isEmpty() )

                    <ul> @foreach ( $categoriess as $category_ )
                        @if ($category_->parent_id === $category->id)
                            <li> <b> {{$category_->name}} </b> </li>
                        @endif
                    @endforeach </ul>

                @endif
            </li>
        @endif
    @endforeach
</ul>
@endif

<form id="category" method="POST" action="{{ url('/admin/category/update/'.$name->id) }}">
	{!! csrf_field() !!}
	<section>
		<label for="name">分类名称</label>
		<input type="text" name="name" id="name" value="{{$name->name}}">
		@if ($errors->has('name'))
			<strong>{{ $errors->first('name') }}</strong>
		@endif
	</section>
    @if(count($categories) > 0)
	<section>
		<label for="parent">父类别</label>
        <select name="parent" id="parent">
            <option value="0">无</option>
            @foreach ( $categories as $category )
            <option value="{{$category->id}}"
                @if($category->id == $name->parent_id)
                 selected="selected"
                 @endif
                >{{$category->name}}</option>
            @endforeach
        </select>
	</section>
    @endif

	<input type="submit" value="添加">
</form>

@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/additional-methods.js')}}"></script>
<script type="text/javascript">
$(function(){
	var validate = $("#category").validate({
	    debug: true, //调试模式取消submit的默认提交功能
	    submitHandler: function(form){   //表单提交句柄,为一回调函数,带一个参数：form
	        form.submit();   //提交表单
	    },

		rules : {
			name : {
				required : true,
				minlength : 1,
				maxlength : 20
			}
		},

		messages : {
			name : {
				required : '名称不能为空',
				max : '名称最长不能大于20'
			}
		}

	});
});
</script>
@endsection
