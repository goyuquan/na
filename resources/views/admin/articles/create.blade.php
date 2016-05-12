@extends('admin.layouts.admin')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="/css/admin/form.css">
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/admin/index')}}">后台首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/admin/articles')}}">文章管理</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>创建文章</span>
</div>

<div class="main_wrap container">
    <div class="content_wrap">

        <form id="create" method="POST" action="{{ url('/admin/article/create') }}">
            {!! csrf_field() !!}

            <section>
                <label for="title">标题</label>
                <input type="text" name="title">
                @if ($errors->has('title'))
                <label>{{ $errors->first('title') }}</label>
                @endif
            </section>
            <section>
                <label for="text">正文</label>
                <textarea type="text" name="text" ></textarea>
                @if ($errors->has('text'))
                <label>{{ $errors->first('text') }}</label>
                @endif
            </section>
            <section>
                <label for="publish_at">发布时间</label>
                <input type="date" name="publish_at" id="publish_at">
                @if ($errors->has('publish_at'))
                <label>{{ $errors->first('publish_at') }}</label>
                @endif
            </section>

            <input type="submit" value="提交">
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script>
$(function(){

    var $creat_form = $("#create").validate({//表单验证
		// Rules for form validation
		rules : {
			title : {
				required : true,
				minlength : 5,
				maxlength : 200
			},
			category : {
				required : true,
			}
		},

		// Messages for form validation
		messages : {
			title : {
				required : '请输入标题',
                minlength : '不能小于5位',
                maxlength : '不能大于200位',
			},
			category : {
				required : '请选择分类'
			}
		},

		// Do not change code below
		errorPlacement : function(error, element) {
			error.insertAfter(element.parent());
		}
	});

});
</script>

@endsection
