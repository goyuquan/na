@extends('user.layouts.app')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

@section('style')
<link rel="stylesheet" href="/css/user/create.css">
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
		<form id="create" method="POST" action="{{ url('/user/info/update/'.$info->id) }}">
			<input type="hidden" name="category_id" value="{{$category->id}}">
			{!! csrf_field() !!}
			<section>
				<label for="title">期望职位</label>
				<input class="short" type="text" name="title" value="{{ $info->title }}">
                @if ($errors->has('title')) <strong>{{ $errors->first('title') }}</strong> @endif
			</section>
            <section>
                <label for="name">姓名</label>
                <input class="short" type="text" name="name" value="{{ $content->name }}">
            </section>
            <section>
                <label for="sex">男:</label>
                <input type="radio" <?php if($content->sex == "男" ){ echo 'checked="checked"'; } ?>  name="sex" value="男" />
                <label style="margin-left:60px;" for="female">女:</label>
                <input type="radio" <?php if($content->sex == "女" ){ echo 'checked="checked"'; } ?> name="sex" value="女" />
            </section>
            <section>
                <label for="age">年龄</label>
                <input class="tiny" type="text" name="age" value="{{ $content->age }}">
            </section>
            <section>
                <label for="year">工作年限</label>
                <input class="tiny" type="text" name="year"  value="{{ $content->year }}">年
            </section>
            <section>
                <label for="edu">学历</label>
                <select name="edu">
                    <option>{{null}}</option>
                    <option value="ben" <?php if($content->edu == "ben") {echo 'selected="selected"';} ?>>大学本科</option>
                    <option value="zhuan" <?php if($content->edu == "zhuan") {echo 'selected="selected"';} ?>>大学专科</option>
                    <option value="gao" <?php if($content->edu == "gao") {echo 'selected="selected"';} ?>>高中</option>
                    <option value="chu" <?php if($content->edu == "chu") {echo 'selected="selected"';} ?>>初中</option>
                    <option value="xiao" <?php if($content->edu == "xiao") {echo 'selected="selected"';} ?>>小学</option>
                </select>
            </section>
            <section>
                <label for="phone">电话号码</label>
                <input class="short" type="text" name="phone"  value="{{ $content->phone }}">
            </section>
            <section>
                <label for="price">期望薪资</label>
                <input class="tiny" type="text" name="price"  value="{{ $content->price }}">
            </section>
            <section>
                <label for="didian">期望工作地点</label>
                <input class="short" type="text" name="didian"  value="{{ $content->didian }}">
            </section>
			<section>
				<label for="experience">工作经历</label>
				<textarea name="experience" rows="5" cols="60">{{ $content->experience }}</textarea>
			</section>
			<section>
				<label for="text">期望职位描述</label>
				<textarea name="text" rows="5" cols="60">{{ $info->text }}</textarea>
                @if ($errors->has('text')) <strong>{{ $errors->first('text') }}</strong> @endif
			</section>
			@if(Auth::User()->role > 1)
			<section>
				<label for="publish_at">发布时间</label>
				<input type="date" name="publish_at">
			</section>
			@endif

			<input type="submit" value="提交">
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


	var validate = $("#edit").validate({
	    debug: true,
	    submitHandler: function(form){
	        form.submit();
	    },

		rules : {
			title : {
				required : true,
				minlength : 2,
				maxlength : 30
			},
			name : {
				required : true,
				minlength : 2,
				maxlength : 3
			},
            age : {
                required : true,
                min : 14,
                max : 60
            },
			year : {
				required : true,
				max : 40
			},
            phone : {
                isMobile : true
            },
			price : {
				required : true,
				number : true
			},
            didian : {
                required : true,
                minlength : 2,
                maxlength : 10
            },
			experience : {
                minlength : 2,
                maxlength : 999
			},
			text : {
				required : true,
				minlength : 2,
				maxlength : 999
			}
		},

		messages : {
			title : {
				required : '期望职位不能为空',
				minlength : '期望职位不能小于2位',
				maxlength : '期望职位不能大于30'
			},
			name : {
				required : '姓名不能为空',
				minlength : '姓名不能小于2位',
				maxlength : '姓名不能大于3'
			},
			age : {
				required : '年龄不能为空',
				min : '年龄不能小于14',
				max : '年龄不能大于60'
			},
			year : {
				required : '工作年限不能为空',
				maxlength : '工作年限不能大于40'
			},
            phone : {
                isMobile : '请填正确的手机号'
            },
			price : {
				number : '请填写数字或不填表示面议'
			},
            didian : {
                required : '工作地点不能为空',
                minlength : '工作地点不能小于2位',
                maxlength : '工作地点不能大于10'
            },
            experience : {
                minlength : '工作地点不能小于2',
                maxlength : '工作地点不能大于999位'
            },
			text : {
				required : '期望职位描述不能为空',
				minlength : '期望职位描述最长不能小于2',
				maxlength : '期望职位描述最长不能大于999位'
			}
		},
	});
});
</script>
@endif
@endsection
