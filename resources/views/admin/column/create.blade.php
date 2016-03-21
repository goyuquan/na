@extends('admin.layouts.admin')

@section('style')

<style media="screen">
.dropzone .dz-preview .dz-details, .dropzone-previews .dz-preview .dz-details {
    min-width: 1em;
    height: 2em;
    background: none;
}
.jarviswidget {
    border-top: 1px solid #ccc;
}
.onoffswitch {
    width: 68px!important;
}
.onoffswitch-switch {
    right:50px;
}
#type_select,#display_select {
    display: inline-block;
}
#album_form footer {
    padding:0;
}
#album_form footer button{
    margin:0;
}
</style>

@endsection

@section('content')

@include('common.thumbnail')

<!-- MAIN PANEL -->
<div id="main" role="main">


    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span>
        </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
                控制台
            </li>
            <li>
                内容管理
            </li>
        </ol>

    </div>

    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-image text-success "></i>
                    相册管理
                    <span>>
                        创建相册
                    </span>
                </h1>
            </div>
        </div>




        <!-- widget grid -->
        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-sm-12 col-md-12 col-lg-12">
                    <div class="jarviswidget" id="wid-id-5h55" >

                        <div>
                            <div class="jarviswidget-editbox"> </div>
                            <div class="widget-body no-padding">

                                <form id="album_form" class="smart-form" novalidate="novalidate" method="POST" action="/admin/album/store" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="thumbnail">
                                    <input type="hidden" name="thumbnail2">
                                    <input type="hidden" name="display">

                                    <fieldset>
                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="input">
                                                    <i class="icon-prepend fa fa-user"></i>
                                                    <input type="text" name="title" placeholder="标题">
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-4">
                                                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" name="published_at" placeholder="选择发布时间" class="datepicker" value="{{ old('published_at') }}" data-dateformat="yy-mm-dd">
                                                </label>
                                                @if ($errors->has('published_at'))
                                                <em>{{ $errors->first('published_at') }}</em>
                                                @endif
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-4">
                                                <span class="onoffswitch">
                                                    <input type="checkbox" name="free" class="onoffswitch-checkbox" id="show-tabs">
                                                    <label class="onoffswitch-label" for="show-tabs">
                                                        <span class="onoffswitch-inner" data-swchon-text="Free" data-swchoff-text="Member"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </span>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col">
                                                <div id="display_select" class="dropdown inline_block">
                                                    <a id="dLabel2" role="button" name="{{App\display::find(1)->id}}" data-toggle="dropdown" class="btn btn-primary btn-sm" data-target="#" href="javascript:void(0);">
                                                        <i class="fa fa-code-fork"></i>      {{App\display::find(1)->name}}
                                                        <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu multi-level" role="menu">
                                                        @foreach ( $displays as $display )
                                                            @if ( $display->parent_id === 1 )
                                                                <li>
                                                                    <a href="javascript:void(0);" class="item" name="{{$display->id}}">{{ $display->name }}</a>
                                                                    @if ( !App\Display::where('parent_id',$display->id)->get()->isEmpty() )
                                                                        <ul class="dropdown-menu">
                                                                        @foreach ( $displayss as $display_ )
                                                                            @if ($display_->parent_id === $display->id)
                                                                                <li>
                                                                                    <a href="javascript:void(0);" class="item" name="{{$display_->id}}">
                                                                                        {{$display_->name}}
                                                                                    </a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                    </ul>

                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col">
                                                <a data-toggle="modal" href="#myModal" id="upload_bt0" class="btn btn-success btn-sm"><i class="fa fa-upload"></i>     缩略图</a>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col">
                                                <a data-toggle="modal" href="#myModal2" id="upload_bt02" class="btn btn-success btn-sm"><i class="fa fa-upload"></i>     缩略图2</a>
                                            </section>
                                        </div>

                                        <section>
                                            <label class="textarea">
                                                <textarea rows="2" name="content" placeholder="描述"></textarea>
                                            </label>
                                        </section>
                                    </fieldset>


                                    <footer>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            提交
                                        </button>
                                    </footer>
                                </form>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>
                <!-- END COL -->

            </div>


            </article>
        </div>
</div>
<!-- END MAIN PANEL -->

@endsection

@section('script')
<script src="/js/thumbnail.js"></script>
<script type="text/javascript">

$(function(){

    $("#aside_album").addClass("open");
    $("#aside_album_").show();
    $("#aside_album_create").addClass("active");


    // 显示页面设置
    $("#display_select ul a:not('.parent-item')").click(function(){
        $("input[name='display']").val($(this).attr("name"));
        $("#dLabel2").html("<i class='fa fa-gear'></i>   "+$(this).text()+"   <span class='caret'></span>");
    });

    //media收起保存
    $("#media_bt").click(function(){
        if (!$(this).hasClass("collapsed")) {
            $("#media_content").val($("#summernote2 .note-editable").html());
        }
    });

    $(".dropdown-menu").parent("li").addClass("dropdown-submenu");//给分类列表父元素加dropdown-submenu类

    //表单验证
    var $album_form = $("#album_form").validate({
		rules : {
			title : {
				required : true,
				minlength : 2,
				maxlength : 200
			}
		},

		// Messages for form validation
		messages : {
			title : {
				required : '请输入标题',
                minlength : '不能小于2位',
                maxlength : '不能大于200位',
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
