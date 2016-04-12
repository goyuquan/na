<div class="background">
    <div class="myModal">
        <form id="file_form" method="POST" action="/admin/thumbnail" enctype="multipart/form-data" >
            <input id="thumbnail_token" type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="file" id="thumbnail" name="thumbnail">

            <input type="button" id="img_upload" name="name" value="点击上传">
            @if ($errors->has('thumbnail'))
            <strong>{{ $errors->first('thumbnail') }}</strong>
            @endif
            <div id="progress"></div>
            <button type="button" class="close_bt"> 关闭 </button>
        </form>
    </div>
</div>

<div class="background_photos">
    <div class="myModal_photos">
        <form action="" class="dropzone" id="my-awesome-dropzone"  method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="file" name="file" style="display:none;"/>
            <input type="hidden" name="" value="">
        </form>
    </div>
</div>
