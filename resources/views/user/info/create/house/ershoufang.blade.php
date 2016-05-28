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
				<label for="price">总价</label>
				<input class="short" type="text" name="price">&nbsp;万
			</section>
			<section>
				<label for="area">小区(楼盘)</label>
				<input type="text" name="area">
			</section>
			<section>
				<label for="addr">地址</label>
				<input class="long" type="text" name="addr">
			</section>
            <section>
                <label for="huxing">户型</label>
                <select name="huxing">
                    <option value="3_2">三室两厅</option>
                    <option value="3_1">三室一厅</option>
                    <option value="2_2">两室两厅</option>
                    <option value="2_1">两室一厅</option>
                    <option value="1_1">一室一厅</option>
                    <option value="other">其他</option>
                </select>
            </section>
            <section>
				<label for="floor">楼层</label>
				<input class="tiny" type="text" name="floor">
			</section>
            <section>
				<label for="maxfloor">最高楼层</label>
				<input class="tiny" type="text" name="maxfloor">
			</section>
            <section>
                <label for="zhuangxiu">装修程度</label>
                <select name="zhuangxiu">
                    <option value="hifi">豪华装修</option>
                    <option value="high">精装修</option>
                    <option value="middle">中等装修</option>
                    <option value="base">简单装修</option>
                    <option value="low">毛坯</option>
                    <option value="other">其他</option>
                </select>
            </section>
			<section>
				<label for="text">正文</label>
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
			<section class="photo_wrap">
				<label for="photos">图片</label>
				<input type="hidden" id="photos_sha1" name="photos_sha1" value="{{sha1(time())}}">
				<button type="button" id="photos_bt">上传图片</button>
			</section>


			<input type="submit" value="提交">
		</form>
	</div>
</div>

@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/validate-phone-additional-methods.js')}}"></script>
<script src="{{url('/js/thumbnail.js')}}"></script>
<script src="{{url('/js/dropzone.min.js')}}"></script>
<script type="text/javascript">
$(function(){

    $("#my-awesome-dropzone").dropzone({
        url: "/upload/photos/"+$("#photos_sha1").val(),
        parallelUploads: 1,
        maxFilesize: 0.5,
		maxFiles:10,
        thumbnailWidth: 100,
        thumbnailHeight: 100,
        dictFileTooBig:"文件太大了",
        dragenter:function(){
			$("#my-awesome-dropzone").css("border-color","#eea236");
		},
		dragleave:function(){
			$("#my-awesome-dropzone").css("border-color","#398439");
		}
     });

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
			text : {
				required : '正文内容不能为空',
				minlength : '正文内容最长不能小于10',
				maxlength : '正文内容最长不能大于1000'
			}
		},
	});
});
</script>
@endsection
