@extends('admin.layouts.admin')

@section('style')
<style>
.dz-details {
    height: 2em!important;
    width: 110px!important;
    background: none!important;
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
                图片上传
            </li>
        </ol>
    </div>
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-pencil-square-o fa-fw "></i>
                    图片上传
                </h1>
            </div>
            @if( App\Img::where('album_id',$album->id) )
            <div class="col-md-6 text-align-right">
                <div class="page-title">
                    <a href="/admin/album/{{ $album->id }}/show" class="btn btn-primary">查看相册</a>
                </div>
            </div>
            @endif
            <div class="col-md-1">
                <ul id="sparks" class="">
                    <li class="sparks-info">
                        <h5> 图片数量 <span class="txt-color-green"><i class="fa fa-image"></i>&nbsp;{{ $album->img->count() }}</span></h5>
                    </li>
                </ul>
            </div>
        </div>




        <!-- widget grid -->
        <section id="widget-grid" class="">

            <div class="row">
                <article class="col-sm-12">
                    <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-eje" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-cloud"></i> </span>
                            <h2>My Dropzone! </h2>
                        </header>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body">

                            <form action="" class="dropzone" id="my-awesome-dropzone"  method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="file" name="file" style="display:none;"/>
                                <input type="hidden" name="album" value="{{$album->id}}">
                            </form>

                        </div>
                    </div>
                </div>
            </article>
        </div>
</div>
<!-- END MAIN PANEL -->

@endsection

@section('script')
<script src="/js/plugin/dropzone/dropzone.min.js"></script>

<script type="text/javascript">

$(function(){

    // Dropzone
    $("#my-awesome-dropzone").dropzone({
        url: "/admin/album/upload/uploadstore",
        parallelUploads: 1,
        maxFilesize: 100,
        addRemoveLinks: true,
        thumbnailWidth: 100,
        thumbnailHeight: 100,
        dictFileTooBig:"文件太大了",
        dictCancelUpload: "取消",
        dictRemoveFile: "删除",
     });

    $("#aside_album").addClass("open");
    $("#aside_album_").show();
    $("#aside_album_add").addClass("active");

});

</script>

@endsection
