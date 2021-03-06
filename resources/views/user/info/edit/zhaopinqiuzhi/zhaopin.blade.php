@extends('user.layouts.app')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="/css/user/edit.css">
@endsection

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
		<form id="edit" method="POST" action="{{ url('/user/info/update/'.$info->id) }}">
			<input type="hidden" name="page" value="{{$info->id}}">
			{!! csrf_field() !!}
			<section>
				<label for="title">职位名</label>
				<input class="short" type="text" name="title" value="{{$info->title}}">
				@if ($errors->has('title'))
					<strong>{{ $errors->first('title') }}</strong>
				@endif
			</section>
			<section>
				<label for="danwei">招聘单位</label>
				<input class="long" type="text" name="danwei" value="{{$content->danwei}}">
			</section>
			<section>
				<label for="didian">工作地点</label>
				<input class="long" type="text" name="didian" value="{{$content->didian}}">
			</section>
			<section>
				<label for="price">薪资</label>
				<input class="short" type="text" name="price" value="{{$content->price}}">
			</section>
            <section>
                <label for="who">联系人</label>
                <input type="text" name="who" value="{{ $content->who }}">
            </section>
			<section>
				<label for="phone">电话号码</label>
				<input type="text" name="phone" value="{{$content->phone}}">
			</section>
			<section>
				<label for="count">招聘人数</label>
				<input class="tiny" type="text" name="count" value="{{$content->count}}">
			</section>
			<section>
				<label for="yaoqiu">职位要求</label>
				<textarea type="text" name="yaoqiu" rows="5" cols="60">{{$content->yaoqiu}}</textarea>
			</section>
			<section>
				<label for="text">职位描述</label>
				<textarea type="text" name="text" rows="5" cols="60">{{$info->text}}</textarea>
				@if ($errors->has('text'))
					<strong>{{ $errors->first('text') }}</strong>
				@endif
			</section>

			<input type="submit" value="修改">
		</form>
	</div>
</div>
@endsection

@section('script')
<script src="{{url('/js/jquery.validate.min.js')}}"></script>
<script src="{{url('/js/validate-phone-additional-methods.js')}}"></script>
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
				minlength : 2,
				maxlength : 30
			},
			danwei : {
				required : true,
				minlength : 2,
				maxlength : 50
			},
			didian : {
				required : true,
				minlength : 2,
				maxlength : 50
			},
			price : {
				number : true
			},
            who : {
                required : true,
                minlength : 1,
                maxlength : 4
            },
            phone : {
                isMobile : true
            },
            count : {
                number : true
            },
			yaoqiu : {
				required : true,
				maxlength : 1000
			}
			text : {
				required : true,
				minlength : 10,
				maxlength : 1000
			}
		},

		messages : {
			title : {
				required : '职位描述不能为空',
				minlength : '职位描述最长不能小于2位',
				maxlength : '职位描述最长不能大于30'
			},
			danwei : {
				required : '招聘单位不能为空',
				minlength : '招聘单位最长不能小于4位',
				maxlength : '招聘单位最长不能大于30'
			},
			didian : {
				required : '工作地点不能为空',
				minlength : '工作地点最长不能小于4位',
				maxlength : '工作地点最长不能大于30'
			},
			price : {
				number : '请填写数字或不填表示面议'
			},
            who : {
                required : '联系人不能为空',
                minlength : '联系人最长不能小于1位',
                maxlength : '联系人最长不能大于4'
            },
			phone : {
				isMobile : '请填正确的手机号'
			},
			count : {
				number : '请填招聘人数'
			},
			yaoqiu : {
				required : '职位要求不能为空',
				maxlength : '职位要求最长不能大于1000'
			}
			text : {
				required : '职位描述不能为空',
				minlength : '职位描述最长不能小于10',
				maxlength : '职位描述最长不能大于1000'
			}
		}
	});

});
</script>
@endif
@endsection
