<div id="background">
    <div id="myModal">
        <form id="file_form" method="POST" action="/admin/thumbnail" enctype="multipart/form-data" >
            <input id="thumbnail_token" type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="file" id="thumbnail" name="thumbnail">

            <input type="button" id="img_upload" name="name" value="点击上传">
            @if ($errors->has('thumbnail'))
            <strong>{{ $errors->first('thumbnail') }}</strong>
            @endif
            <div id="progress"></div>
            <button type="button" id="close_bt"> 关闭 </button>
        </form>
    </div>
</div>
