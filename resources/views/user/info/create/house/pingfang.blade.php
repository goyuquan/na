@extends('user.layouts.app')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="/css/upload.css">
<link rel="stylesheet" href="/css/user/create.css">
@endsection

@include('common.thumbnail')
@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">宁安信息网</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/user/index')}}">用户中心</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>信息发布</span>
</div>

<div class="main_wrap container">
    @include('user.layouts.sidebar')

    <div class="content_wrap">
		<form id="create" method="POST" action="{{ url('/user/info/create/') }}">
			<input type="hidden" name="category_id" value="{{$category->id}}">
			{!! csrf_field() !!}
			<section>
				<label for="title">标题</label>
				<input type="text" name="title">
                @if ($errors->has('title')) <strong>{{ $errors->first('title') }}</strong> @endif
			</section>
			<section>
				<label for="mianji">面积</label>
				<input class="short" type="text" name="mianji">&nbsp;平方米
			</section>
			<section>
				<label for="price">价格</label>
				<input class="short" type="text" name="price">
			</section>
			<section>
				<label for="addr">地址</label>
				<input class="long" type="text" name="addr">
			</section>
			<section>
				<label for="text">详细描述</label>
				<textarea name="text" rows="10" cols="60"></textarea>
                @if ($errors->has('text')) <strong>{{ $errors->first('text') }}</strong> @endif
			</section>
            <section>
                <label for="who">联系人</label>
                <input type="text" name="who">
            </section>
            <section>
                <label for="phone">电话号码</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </section>
			@if(Auth::User()->role > 1)
			<section>
				<label for="publish_at">发布时间</label>
				<input type="date" name="publish_at">
			</section>
			@endif
			<section class="thumb_wrap">
				<label for="thumbnail">缩略图</label>
				<button type="button" id="thumbnail_bt">上传缩略图</button>
			</section>

            @include('common.photo_create')

			<input type="submit" value="提交">
		</form>
	</div>
</div>

@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/validate-phone-additional-methods.js')}}"></script>
<script src="{{url('/js/thumbnail.js')}}"></script>
@include('common.photo_create_js')
@if(Auth::User()->role < 5)
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
				maxlength : 30
			},
			mianji : {
				required : true,
                number : true,
				min : 5
			},
			price : {
                number : true
			},
			area : {
				required : true,
				minlength : 2,
				maxlength : 10
			},
			addr : {
				required : true,
				minlength : 4,
				maxlength : 30
			},
			floor : {
				required : true,
                number : true,
				min : 1,
				max : 50
			},
			maxfloor : {
				required : true,
                number : true,
				min: 1,
				max : 500
			},
			who : {
				required : true,
				minlength : 1,
				maxlength : 4
			},
			phone : {
				isMobile : true
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
				minlength : '标题最长不能小于5位',
				maxlength : '标题最长不能大于30'
			},
			mianji : {
				required : '不能为空',
                number : '请填写数字',
				min : '不能小于5'
			},
            price : {
                number : '请填写数字'
            },
            area : {
                required : '不能为空',
                minlength : '不能小于2位',
                maxlength : '不能大于10位'
            },
            addr : {
                required : '不能为空',
                minlength : '不能小于4位',
                maxlength : '不能大于30位'
            },
            floor : {
                required : '不能为空',
                number : '请填写数字',
                min : '不能小于1',
                max : '不能大于50'
            },
            maxfloor : {
                required : '不能为空',
                number : '请填写数字',
                min : '不能小于1',
                max : '不能大于50'
            },
			who : {
				required : '不能为空',
				minlength : '不能小于1位',
				maxlength : '不能大于4'
			},
			phone : {
				isMobile : '请填写正确的手机号'
			},
			text : {
				required : '不能为空',
				minlength : '不能小于10',
				maxlength : '不能大于1000'
			}
		},
	});
});
</script>
@endif
@endsection
