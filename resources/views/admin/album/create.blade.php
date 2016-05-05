


<form id="album_form"  novalidate="novalidate" method="POST" action="/admin/album/store" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <section >
        <label class="input">
            <input type="text" name="title" placeholder="标题">
        </label>
        @if ($errors->has('title'))
        <em>{{ $errors->first('title') }}</em>
        @endif
    </section>
    <section >
            <input type="text" name="published_at" placeholder="选择发布时间" value="{{ old('published_at') }}" data-dateformat="yy-mm-dd">
        </label>
        @if ($errors->has('published_at'))
        <em>{{ $errors->first('published_at') }}</em>
        @endif
    </section>
    <input type="submit" name="name" value="提交">
</form>
