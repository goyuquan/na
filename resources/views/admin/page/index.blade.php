@extends('admin.layouts.admin')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/admin/users.css')}}" />
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/user/index')}}">首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>页面管理</span>
</div>

<div class="main_wrap container">
    @include('user.layouts.sidebar')

    <div class="content_wrap">

        @if(count($pagess) > 0)
        <table>
            <thead>
                <th> 页面名称 </th>
                <th> 别名 </th>
                <th> 操作 </th>
            </thead>
            @foreach ( $pagess as $page )
            <tbody>
                <tr>
                    <td>
                        <a href="/admin/pageinfo/{{$page->id}}">{{ $page->name }}</a>
                        @if ( !App\Category::where('parent_id',$page->id)->get()->isEmpty() )
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
                        @endif
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

            <form id="page" method="POST" action="{{ url('/admin/page/create') }}">
                {!! csrf_field() !!}
                <section>
                    <label for="name">页面名称</label>
                    <input type="text" name="name" id="name">
                    @if ($errors->has('name'))
                    <strong>{{ $errors->first('name') }}</strong>
                    @endif
                </section>
                <section>
                    <label for="alias">别名</label>
                    <input type="text" name="alias" id="alias">
                    @if ($errors->has('alias'))
                    <strong>{{ $errors->first('alias') }}</strong>
                    @endif
                </section>
                @if(count($pagess) > 0)
                <section>
                    <label for="parent">父页面</label>
                    <select name="parent" id="parent">
                        <option value=0>无</option>
                        @foreach ( $pagess as $page )
                        <option value="{{$page->id}}">{{$page->name}}</option>
                        @endforeach
                    </select>
                </section>
                @endif

                <input type="submit" value="添加">
            </form>
        </div>
</div>
@endsection

@section('script')
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function(){

    $(".del").click(function(e){
        var r=confirm("确认删除");
        if (r==false) {
            e.preventDefault();
        }
    });

	var validate = $("#page2").validate({

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
