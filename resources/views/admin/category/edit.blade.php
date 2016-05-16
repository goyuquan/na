@extends('admin.layouts.admin')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

<?php $dashboard_="";$user_="";$_category_="active";$page_="";$article_="" ?>

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/form.css')}}" />
<link rel="stylesheet" href="{{url('/css/admin/list.css')}}" />
<style media="screen">
label:first-child {
    width:6rem!important;
}
input[type="submit"] {
    display: inline-block!important;
    padding: 0.2rem 1rem!important;
    margin: 0 0 0 1rem!important;
}
.content_wrap form section label {
    margin-right: 0!important;
}
</style>
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/admin/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>分类管理</span>
</div>

<div class="main_wrap container">

    <div class="content_wrap">

        <form id="category" method="POST" action="{{ url('/admin/category/update/'.$name->id) }}">
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

                @if(count($categoriess) > 0)
                    <label for="parent">父类别</label>
                    <select name="parent" id="parent">
                        <option value="0">无</option>
                        @foreach ( $categoriess as $category )
                        <option value="{{$category->id}}"
                            @if($category->id == $name->parent_id)
                            selected="selected"
                            @endif
                            >{{$category->name}}
                        </option>
                        @endforeach
                    </select>
                @endif

                <input type="submit" value="修改">
            </section>
        </form>

        <hr>

        @if(count($categoriess) > 0)
        <ul>
            @foreach ( $categoriess as $category )
            <li><span>{{ $category->name }}</span>
                <span>{{ $category->alias }}</span>
                @if ( !App\Category::where('parent_id',$category->id)->get()->isEmpty() )

                <ul> @foreach ( $categories as $category_ )
                    @if ($category_->parent_id === $category->id)
                    <li>
                        <b> {{$category_->name}} </b>
                        <span> {{$category_->alias}} </span>
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
