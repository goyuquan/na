@extends('admin.layouts.admin')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/form.css')}}" />
<link rel="stylesheet" href="{{url('/css/admin/list.css')}}" />
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/admin/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>分类管理</span>
</div>

<div class="main_wrap container">

    <div class="content_wrap">

        <form id="category" method="POST" action="{{ url('/admin/category/create') }}">
            {!! csrf_field() !!}
            <section>
                <label for="name">分类名称</label>
                <input type="text" name="name" id="name">
                @if ($errors->has('name'))
                <strong>{{ $errors->first('name') }}</strong>
                @endif

                <label for="alias">别名</label>
                <input type="text" name="alias" id="alias">
                @if ($errors->has('alias'))
                <strong>{{ $errors->first('alias') }}</strong>
                @endif

                @if(count($categories) > 0)
                <label for="parent">父类别</label>
                <select name="parent" id="parent">
                    <option value=NULL>无</option>
                    @foreach ( $categories as $category )
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @endif

                <input type="submit" value="添加">
            </section>
        </form>

        <hr>

        @if(count($categoriess) > 0)
        <ul>
            @foreach ( $categoriess as $category )
            <li><span>{{ $category->name }}</span>
                <span>{{ $category->alias }}</span>
                <a href="/admin/category/edit/{{$category->id}}">编辑</a>
                <a class="del" href="/admin/category/delete/{{$category->id}}">删除</a>
                @if ( !App\Category::where('parent_id',$category->id)->get()->isEmpty() )
                <ul> @foreach ( $categories as $category_ )
                    @if ($category_->parent_id === $category->id)
                    <li>
                        <b> {{$category_->name}} </b>
                        <span>{{$category_->alias}}</span>
                        <a href="/admin/category/edit/{{$category_->id}}">编辑</a>
                        <a class="del" href="/admin/category/delete/{{$category_->id}}">删除</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
@endsection

@section('script')
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
$(function(){

    $(".del").click(function(e){
        var r=confirm("确认删除");
        if (r==false) {
            e.preventDefault();
        }
    });

    $(".content_wrap > ul > li > ul").hide();

    $(".content_wrap > ul > li").find("span,a,ul").click(function(e){
        e.stopPropagation();
    });

    $(".content_wrap > ul > li").click(function(){
        $(this).children("ul").slideToggle("fast");
    });

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
				min : '别名最长不能小于2',
				max : '别名最长不能大于20'
			}
		}

	});
});
</script>
@endsection
