<section class="photo_wrap">
    <label for="photos">图片</label>
    <button type="button" id="photos_bt">上传图片</button>
    <input type="hidden" id="photos_sha1" name="photos_sha1" value="{{ $content->photos_sha1 or sha1(time()) }}">
</section>
