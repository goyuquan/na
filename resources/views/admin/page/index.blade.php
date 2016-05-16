@extends('admin.layouts.admin')

@section('title','宁安信息网后台')
@section('description','宁安信息网,宁安本地服务网站,为你提供招聘信息、房产、生意转让、二手物品、车辆、求职招聘、生活服务、商务服务、教育培训等海量分类信息,充分满足您免费查看/发布信息的需求。')
@section('keywords','宁安信息网,宁安招聘,宁安房产,宁安吧,宁安论坛,231084,157400,宁安网,宁安免费发布信息')

<?php $dashboard_="";$user_="";$_category_="";$page_="active";$article_="" ?>

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/table.css')}}" />
<link rel="stylesheet" href="{{url('/css/admin/form.css')}}" />
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
    <span>页面管理</span>
</div>

<div class="main_wrap container">

    <div class="content_wrap">

        <form id="page" method="POST" action="{{ url('/admin/page/create') }}">
            {!! csrf_field() !!}
            <section>

                <label for="name">页面名称</label>
                <input type="text" name="name">
                @if ($errors->has('name'))
                <strong>{{ $errors->first('name') }}</strong>
                @endif

                <label for="alias">别名</label>
                <input type="text" name="alias">
                @if ($errors->has('alias'))
                <strong>{{ $errors->first('alias') }}</strong>
                @endif

                @if(count($pagess) > 0)
                    <label for="parent">父页面</label>
                    <select name="parent" id="parent">
                        <option value=0>无</option>
                        @foreach ( $pagess as $page )
                        <option value="{{$page->id}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                @endif

                <input type="submit" value="添加">
            </section>
        </form>
        <hr>

        @if(count($pagess) > 0)
        <table>
            <thead>
                <th> ID </th>
                <th> 页面名称 </th>
                <th> 别名 </th>
                <th> 操作 </th>
            </thead>
            @foreach ( $pagess as $page )
            <tbody>
                <tr>
                    <td> {{$page->id}} </td>
                    <td>
                        <a href="/admin/pageinfo/{{$page->id}}">{{ $page->name }}</a>
                        <!-- @if ( !App\Category::where('parent_id',$page->id)->get()->isEmpty() )
                            <table>
                                @foreach ( $pages as $page_ )
                                @if ($page_->parent_id === $page->id)
                                <thead>
                                    <th> 名称 </th>
                                    <th> 别名 </th>
                                    <th> 操作 </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{$page_->name}} </td>
                                        <td>{{$page_->alias}}</td>
                                        <td>
                                            <a href="/admin/page/edit/{{$page_->id}}">编辑</a>
                                            <a class="del" href="/admin/page/delete/{{$page_->id}}">删除</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endif
                                @endforeach
                            </table>
                        @endif -->
                    </td>
                    <td>{{ $page->alias }}</td>
                    <td>
                        <a href="/admin/page/edit/{{$page->id}}">编辑</a>
                        <a class="del" href="/admin/page/delete/{{$page->id}}">删除</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
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

	var validate = $("#page").validate({

	    submitHandler: function(form){   //表单提交句柄,为一回调函数,带一个参数：form
	        form.submit();   //提交表单
	    },

		rules : {
			name : {
				required : true,
				minlength : 1,
				maxlength : 50
			},
			alias : {
				required : true,
				minlength : 2,
				maxlength : 50
			}
		},

		messages : {
			name : {
				required : '名称不能为空',
				maxlength : '名称最长不能大于20'
			},
			alias : {
				required : '别名不能为空',
				minlength : '别名最长不能小于2',
				maxlength : '别名最长不能大于20'
			}
		}

	});
});
</script>
@endsection
