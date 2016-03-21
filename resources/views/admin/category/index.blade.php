@extends('admin.layouts.admin')

@section('content')

@if(count($categories) > 0)
<ul>
    @foreach ( $categories as $category )
        @if ( $category->parent_id == NULL)
            <li><span>{{ $category->name }}</span>
                <a href="/admin/category/edit/{{$category->id}}">编辑</a>
                <a class="del" href="/admin/category/delete/{{$category->id}}">删除</a>
                @if ( !App\Category::where('parent_id',$category->id)->get()->isEmpty() )

                    <ul> @foreach ( $categoriess as $category_ )
                        @if ($category_->parent_id === $category->id)
                        <li>
                            <b> {{$category_->name}} </b>
                            <a href="/admin/category/edit/{{$category_->id}}">编辑</a>
                            <a class="del" href="/admin/category/delete/{{$category_->id}}">删除</a>
                        </li>
                        @endif
                    @endforeach </ul>

                @endif
            </li>
        @endif
    @endforeach
</ul>
@endif

<form id="category" method="POST" action="{{ url('/admin/category/create') }}">
	{!! csrf_field() !!}
	<section>
		<label for="name">分类名称</label>
		<input type="text" name="name" id="name">
		@if ($errors->has('name'))
			<strong>{{ $errors->first('name') }}</strong>
		@endif
	</section>
    @if(count($categories) > 0)
	<section>
		<label for="parent">父类别</label>
        <select name="parent" id="parent">
            <option value=NULL>无</option>
            @foreach ( $categories as $category )
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
	</section>
    @endif

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
