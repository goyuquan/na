@extends('admin.layouts.admin')

@section('content')


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
                显示管理
            </li>
        </ol>

    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">

					<!-- col -->
					<div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-image text-success"></i> 相册 <span>&gt;
							&nbsp;列表 </span></h1>
					</div>
					<!-- end col -->

				</div>


        <div class="row">
            @if (count($banners) > 0)
            <div class="col-sm-12">

                <div class="well">

                    <table class="table table-striped table-forum smart-form table-hover">
                        <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="checkbox"> <input type="checkbox" name="checkbox-inline"> <i></i>
                                    </label>
                                </th>
                                <th style="width:20px;">ID</th>
                                <th>标题</th>
                                <th>所属页面</th>
                                <th class="text-center"> 缩略图 </th>
                                <th class="text-center hidden-xs hidden-sm" style="width: 100px;">发布时间</th>
                                <th class="hidden-xs hidden-sm" style="width: 50px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                            <tr>
                                <td>
                                    <label class="checkbox"> <input type="checkbox" name="checkbox-inline"> <i></i>
                                    </label>
                                </td>
                                <td class="text-center">{{ $banner->id }}</td>
                                <td><h4><a href="/banner/{{ $banner->id }}"> {{str_limit($banner->title,50)}} </a><small></small></h4></td>
                                <td><h4>{{ $banner->display->name }}</h4></td>
                                <td class="text-center">
                                    @if($banner->thumbnail)
                                        <img src="/uploads/thumbnails/{{ $banner->thumbnail }}" style="max-width:160px;" />
                                    @else
                                        <i class="fa fa-photo fa-2x text-muted"></i>
                                    @endif
                                </td>
                                <td class="text-center hidden-xs hidden-sm">{{ substr($banner->published_at,0,10) }}</td>
                                <td class="hidden-xs hidden-sm">
                                    <div class="btn-group">
                                        <a href="/admin/album/{{ $banner->id }}/edit"> <i class="fa fa-edit" style="font-size:24px;"></i>
                                        </a>
                                        <a href="/admin/album/{{ $banner->id }}/destroy" class="destroy"> <i class="fa fa-times" style="font-size:24px;"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <!-- end TR -->
                            @endforeach
                        </tbody>
                    </table>

                    <div class="dt-row dt-bottom-row">
                        <div class="row text-center">
                            <div class="dataTables_paginate paging_bootstrap_full">
                                {{ $banners->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        </div>

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->




@endsection

@section('script')

<script type="text/javascript">
    $("#aside_banner").addClass("open");
    $("#aside_banner_").show();
    $("#aside_banner_index").addClass("active");

    //角色删除确认
    $('.destroy').click(function(e) {
        var $this = $(this);
        $.destroyURL = $this.attr('href');
        $.destroyMSG = $this.data('logout-msg');

        // ask verification
        $.SmartMessageBox({
            title : "<i class='fa fa-exclamation-triangle txt-color-orangeDark'></i> 危险操作 !",
            content : $.destroyMSG || "删除相册会影响到关联用户",
            buttons : '[取消][确认删除]'

        }, function(ButtonPressed) {
            if (ButtonPressed == "确认删除") {
                $.root_.addClass('animated fadeOutDown');
                category_destroy();
            }

        });
        e.preventDefault();
    });

    function category_destroy() {
        window.location = $.destroyURL;
    }

</script>

@endsection
