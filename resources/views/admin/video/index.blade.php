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
                视频管理
            </li>
        </ol>

    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">

					<!-- col -->
					<div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa fa-video-camera text-info"></i> 视频 <span>&gt;
							&nbsp;列表 </span></h1>
					</div>
					<!-- end col -->

					<!-- right side of the page with the sparkline graphs -->
					<!-- col -->
					<div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
						<!-- sparks -->
						<ul id="sparks">
							<li class="sparks-info">
								<h5> 全部视频共计 <span class="txt-color-blue"><i class="fa fa-cubes"></i>&nbsp;{{$videos->total()}}</span></h5>
							</li>
							<li class="sparks-info">
								<h5> 会员视频 <span class="txt-color-purple"><i class="fa fa-group"></i>&nbsp;{{$videos->where('free',null)->count()}}</span></h5>
							</li>
							<li class="sparks-info">
								<h5> 开放视频 <span class="txt-color-greenDark"><i class="fa fa-child"></i>&nbsp;{{$videos->where('free',1)->count()}}</span></h5>
							</li>
						</ul>
						<!-- end sparks -->
					</div>
					<!-- end col -->

				</div>


        <div class="row">
            @if (count($videos) > 0)
            <div class="col-md-12">

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
                                <th class="text-center"> 缩略图 </th>
                                <th class="text-center"> 上传 </th>
                                <th class="text-center hidden-xs hidden-sm" style="width: 40px;"> 开放 </th>
                                <th class="text-center hidden-xs hidden-sm" style="width: 100px;">发布时间</th>
                                <th class="hidden-xs hidden-sm" style="width: 50px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                            <tr>
                                <td>
                                    <label class="checkbox"> <input type="checkbox" name="checkbox-inline"> <i></i>
                                    </label>
                                </td>
                                <td class="text-center">{{ $video->id }}</td>
                                <td><h4><a href="/video/{{ $video->id }}"> {{str_limit($video->title,50)}} </a><small></small></h4></td>
                                <td class="text-center">
                                    @if($video->thumbnail)
                                        <img src="/uploads/thumbnails/{{ $video->thumbnail }}" alt="" />
                                    @else
                                        <i class="fa fa-photo fa-2x text-muted"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($video->video)
                                        <i class="fa fa-video-camera fa-2x text-info"></i>
                                    @else
                                        <i class="fa fa-video-camera fa-2x text-muted"></i>
                                    @endif
                                </td>
                                <td class="text-center hidden-xs hidden-sm">
                                    @if ( $video->free )
                                        <i class="fa fa-fw fa-check-circle txt-color-green" style="font-size:1.4em"></i>
                                    @endif

                                </td>
                                <td class="text-center hidden-xs hidden-sm">{{ substr($video->published_at,0,10) }}</td>
                                <td class="hidden-xs hidden-sm">
                                    <div class="btn-group">
                                        <a href="/admin/video/{{ $video->id }}/edit"> <i class="fa fa-edit" style="font-size:24px;"></i>
                                        </a>
                                        <a href="/admin/video/{{ $video->id }}/destroy" class="destroy"> <i class="fa fa-times" style="font-size:24px;"></i>
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
                                {{ $videos->links() }}
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
    $("#aside_video").addClass("open");
    $("#aside_video_").show();
    $("#aside_video_index").addClass("active");

    //角色删除确认
    $('.destroy').click(function(e) {
        var $this = $(this);
        $.destroyURL = $this.attr('href');
        $.destroyMSG = $this.data('logout-msg');

        // ask verification
        $.SmartMessageBox({
            title : "<i class='fa fa-exclamation-triangle txt-color-orangeDark'></i> 危险操作 !",
            content : $.destroyMSG || "删除视频会影响到关联用户",
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
