@extends('layouts.app')

@section('title',"$album_title")
@section('description',"$album_title")
@section('keywords',"$album_title")

@section('style')

<style>
#pageslider {
}
#pageslider a.ws_next,
#pageslider a.ws_prev {
    position:absolute;
    z-index:60;
    overflow: hidden;
    width: 50%;
    height: 100%;
    top: 0;
    opacity: .5;
}
#pageslider a.ws_next {
    left: 50%;
    cursor: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAqFBMVEUAAAAAAAAAAAAAAADp6emampoODg4BAQEAAAAAAAC+vr4AAAAnJycAAAAAAADz8/Px8fHs7OzW1tYAAAAAAAAAAAAAAADZ2dmcnJx/f39eXl4AAADT09OJiYnNzc24uLhubm5VVVVTU1PQ0NCRkZGEhIQnJyciIiLu7u7i4uJwcHBhYWE6OjoAAADl5eXExMTBwcHBwcGpqamjo6OVlZV8fHwhISH19fVy7acrAAAAN3RSTlMAAR4E+rM+PA0b2gZPKCX+/vzvMhEIN/G0l3QL7KTn2Ypxb+q3o15L/PiUhW0T+ePi3s/IinVTJyfCOgAAAXxJREFUOMuNlel2gjAQhUMWIAiIBBBwq1Zt3bq3ef83q4JtVs7J/ZnznQy5M3MBilBIExZcxRIaIjAgr6RVS6IcZxnOI9JWtPRs3AjG9ZRLmtYxHJnXFT7BXBMmfqFdiuBmzi2abyBSyqbNhFs1aVKpPEoXGR9Qtkj/7/RgM+aDGjfQu4PFWtS1VV8X9w/0pXfkx/3pVX+RX/aFiTg77Ons4q80knTFy1jy7zO5Hs10Ese3K2nNhbYQgBsZqWRNAUCV3Le3amQjpxUCYascLRIr2YaAEtU1O0koSCKukamFjBLAcr0TuxT15LtkLwMB5gNkuH8RBgUgyMzufoVdJ5iwM7OCk28riA3uAaJu5s9YLs3yIS5+lB9j2PMsONUeSqxc2HPCcK2F2fGPW2ot1IZixXruaWkMhTlmJsdrqg/uR+IJTh5cfRXwOb3An6V1FUApL9dhe9rpzuZ+6bqu7gEgIsUkxSAj15ByjT3nIHWPZjPsoRr2UA5759/HL+WBz8c5CVTZAAAAAElFTkSuQmCC') 20 20, move;
}
#pageslider a.ws_prev {
    left: 0;
    cursor: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAApVBMVEUAAAAAAAAAAAAAAAAJCQkAAACampomJiYAAADp6ekAAAAAAADt7e0DAwPz8/Px8fHW1tYAAAAAAAAAAAAAAADZ2dnT09O8vLyIiIh/f39eXl4AAADOzs4AAAC+vr6cnJy4uLhubm5VVVVTU1Pq6uri4uKRkZEmJibo6OjBwcGcnJyFhYVwcHBhYWE7OzsAAADExMSpqamjo6OVlZV8fHwhISH19fXdUOd4AAAANnRSTlMAAR4EPg2zThv5JQb8Ov7+7zIIKRPx7Nmll3Q35wvbtNiKcW/7+LZd+eC1oZSGbRHjz8iKdVMz+8v0AAABgklEQVQ4y42V6XKCMBSFQxJCQHZQtirUtVq1e97/0TqKQ7N2cv7BfHMvdzsAQcilRRZhHGUFdREwyMlp15JV6ieJn65I29Hc0XEz6PVzxmnee3Cmhisx8Zkkn+BSCorgZsE0WmwgEtIGzZZpFTYBlx4FdcIMSupgiunAJmZGxQ10HmC5Dtk/Ctfl4wOxXEdaX/Y7riKcj4mJxD39wDK4ctWRe/Lc8yXOcx3gFB9cP71bSNprOADgnnvXUwBQN9dxKBv4aXYIuK2Wg2ehs60LKNFyz2LHCAVFZcGxqgBZyjXMe9NzLM1A9DI9ba8mjvkRwMlf/Ow+VPdbnWiCeXB4gF+xBuRT7w7uuHSvsZpaKOaITWSaie1Z4eW48HWstIcSZkESKo+wmkgmjlBZiioayegoLsW4Ziqprpm6uMONdIpPeXHVUxhwuaSHnXwKIFeO6/1yOKdcE3Fue67WBsBZSmzk6gAJJhWaTcrW9uyNVLXmk2jNp8maZbOHotlD3uytfx+/dM7Mf8Z6jgIAAAAASUVORK5CYII=') 20 20, move;
}
.cards .card {
    cursor: pointer;
}
#loader {
    padding:10em 0;
    border: none;
    font-size: 3em;
    display: none;
}
</style>

@endsection

@section('content')

<div class="ui container">
    <div class="ui large breadcrumb">
        <a href="{{url('/')}}" class="section">首页</a>
        <i class="right chevron icon divider"></i>
        <a href="/albums/" class="section">图片</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">{{$album_title}}</div>
        <a class="ui blue tag label" onclick="window.history.go(-1)" style="margin-left:3em;"> 返回 </a>
    </div>
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="ui hidden divider"></div>

<div class="image" style="position:relative;">
    <div class="img_wrap">
        <div id="img_box" class="ui compact segment" style="margin:0 auto;">
            <img id="img" name="{{ $album }}" title="{{ $page }}" class="ui fluid2 centered image" src="">
        </div>
        <div id="pageslider">
            <a href="#" class="ws_next">
                <span> <i></i> <b></b> </span>
            </a>
            <a href="#" class="ws_prev">
                <span> <i></i> <b></b> </span>
            </a>
        </div>
    </div>

    <div id="loader" class="ui segment hidden">
        <div class="ui active inverted dimmer">
            <div class="ui text loader">Loading</div>
        </div>
        <p></p>
    </div>

</div>

<br>
@endsection

@section('script')

<script type="text/javascript">
$(function(){

    var album = $("#img").attr("name");
    var page = $("#img").attr("title");

    $(document).ajaxStart(function(){
        $("#loader").show();
        $(".modal .container .img_wrap img").remove();
    }).ajaxStop(function(){
        $("#loader").hide();
        $('#img_box').children('img').css("visibility","hidden");
        $('#img_box').css({
            "background":"url(" + $('#img_box').children('img').attr('src') + ") no-repeat",
            "background-size":"100% auto"
        });
    });

    $.ajax({
        type:"post",
        url:"/album/img",
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
        data:{
            album:album,
            pagenum:page
        },
        success:function(data){
            if (data.url_prev) {
                $(".ws_prev").show();
            } else {
                $(".ws_prev").hide();
            }
            if (data.url_next) {
                $(".ws_next").show();
            } else {
                $(".ws_next").hide();
            }
            $("#img").attr("src","/uploads/" + data.url);
            $(".ws_prev").attr("href","/album/" + album + "/page/" + data.url_prev);
            $(".ws_next").attr("href","/album/" + album + "/page/" + data.url_next);

        }
    });

});
</script>
@endsection
