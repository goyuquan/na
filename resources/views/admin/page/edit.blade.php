@extends('admin.layouts.admin')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/list.css')}}" />
<link rel="stylesheet" href="{{url('/css/admin/form.css')}}" />
<style media="screen">


</style>
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/admin/pages')}}">页面管理</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>页面修改</span>
</div>

<div class="main_wrap container">

    <div class="content_wrap">
        <form id="page" method="POST" action="{{ url('/admin/page/update/'.$name->id) }}">
            {!! csrf_field() !!}
            <section>
                <label for="name">分类名称</label>
                <input type="text" name="name" id="name" value="{{$name->name}}">
                @if ($errors->has('name'))
                <strong>{{ $errors->first('name') }}</strong>
                @endif

                <label for="alias">别名</label>
                <input type="text" name="alias" id="alias" value="{{$name->alias}}">
                @if ($errors->has('alias'))
                <strong>{{ $errors->first('alias') }}</strong>
                @endif

                <!-- @if(count($pages) > 0)
                <section>
                    <label for="parent">父页面</label>
                    <select name="parent" id="parent">
                        <option value="0">无</option>
                        @foreach ( $pages as $page )
                        <option value="{{$page->id}}"
                            @if($page->id == $name->parent_id)
                            selected="selected"
                            @endif
                            >{{$page->name}}
                        </option>
                        @endforeach
                    </select>
                </section>
                @endif -->
            <input type="submit" value="修改">
        </section>
        </form>

        <hr>

        @if(count($pagess) > 0)
        <ul>
            @foreach ( $pagess as $page )
            <li><span>{{ $page->name }}</span>
                <span>{{ $page->alias }}</span>
                @if ( !App\Category::where('parent_id',$page->id)->get()->isEmpty() )

                <ul> @foreach ( $pages as $page_ )
                    @if ($page_->parent_id === $page->id)
                    <li>
                        <b> {{$page_->name}} </b>
                        <span> {{$page_->alias}} </span>
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

    $(".content_wrap > ul > li > ul").hide();

    $(".content_wrap > ul > li").find("span,a,ul").click(function(e){
        e.stopPropagation();
    });

    $(".content_wrap > ul > li").click(function(){
        $(this).children("ul").slideToggle("fast");
    });

	var validate = $("#page").validate({

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
