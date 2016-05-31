<section class="photo_wrap">
    <label for="photos">图片</label>
        @if(isset($photos) && count($photos) > 0)
            @foreach($photos as $photo)
            <img src="{{url('uploads/thumbnails/'.$photo->name)}}" />
            @endforeach
            <button type="button" id="delete_photos">删除</button>
        @else
            <button type="button" id="photos_bt">上传图片</button>
        @endif
    <input type="hidden" id="photos_sha1" name="photos_sha1" value="{{ $content->photos_sha1 or sha1(time()) }}">
</section>
