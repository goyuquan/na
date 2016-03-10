@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="//cdn.bootcss.com/video.js/5.8.0/alt/video-js-cdn.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/Swiper/3.3.1/css/swiper.min.css" >
<style>
/*homepage.css*/
#menu {
    margin-bottom: 0;
}
h1 {
    color:#789;
    text-align: center;
}
.swiper-container {
    width: 100%;
    height: 500px;
    margin: 0 auto 50px;
}
.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    width: auto;
    height: 500px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}
.swiper-slide img {
    height: 100%;
    width: auto;
    visibility: hidden;
}
.swiper-container {
    background: url('/img/demo/demo-smartbig-alert.png');
}
.swiper-pagination-bullet {
    background: #fff;
}
.ui.labeled.icon.button, .ui.labeled.icon.buttons .button {
    top:-16px;
}
img {
    width: 100%;
}
.divider {
    color:#555!important;
    margin: 1em 0!important;
}
</style>

@endsection

@section('content')

@if (count($banners) > 0)
<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach ( $banners as $banner)
        <div class="swiper-slide">
            <img src="/uploads/{{$banner->thumbnail}}" alt=""/>
        </div>
        @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
@endif

<h1>welcome to our best website </h1>
<p style="color:#999;text-align:center;">welcome to our best website subtitle</p>

@include('includes.join')

<div class="ui container">

    @if ( count($album_latsed) > 0 )
    <div class="ui grid raised segment">
        <div class="ui sixteen wide column">
            <h2 class="ui dividing header">
                <a href="/albums/"><i class="fa fa-photo"></i>&nbsp;
                    <div class="content"> 最新图片&nbsp;
                        <div class="ui red mini label">new</div>
                    </div>
                </a>
            </h2>
        </div>
        @foreach ( $album_latsed as $album )
        <div class="four wide computer eight wide tablet sixteen wide mobile column">
            <div class="ui card">
                <a href="/album/{{ $album->id }}">
                    <div class="ui slide masked reveal image">
                        <div class="visible content">
                            <img src="/uploads/thumbnails/{{ $album->thumbnail }}">
                        </div>
                        <div class="hidden content">
                            <img src="/uploads/thumbnails/{{ $album->thumbnail2 }}">
                        </div>
                    </div>
                </a>

                <div class="content">
                    <a href="/album/{{ $album->id }}" class="header">{{ $album->title }}</a>
                    <div class="meta">
                        <span class="date">{{ substr($album->published_at,0,10) }}</span>
                    </div>
                </div>
                <div class="extra content">
                    <a><i class="fa fa-photo"></i> {{ $album->img->count() }} </a>
                </div>
            </div>
        </div>
        @endforeach
        <a href="/albums/" class="fluid ui blue button"><i class="fa fa-photo"></i>&nbsp;查看所有图片</a>
    </div>
    @endif


    @if ( count($video_latsed) > 0 )
    <div class="ui grid raised segment">
        <div class="ui sixteen wide column">
            <h2 class="ui dividing header">
                <a href="/videoss/"><i class="fa fa-video-camera"></i>&nbsp;
                    <div class="content"> 最新视频&nbsp;
                        <div class="ui red mini label">new</div>
                    </div>
                </a>
            </h2>
        </div>
        @foreach ( $video_latsed as $video )
        <div class="four wide computer eight wide tablet sixteen wide mobile column">
            <div class="ui card">
                <a href="/videoss/page/{{ $video->id }}">
                    <div class="ui slide masked reveal image">
                        <div class="visible content">
                            <img src="/uploads/thumbnails/{{ $video->thumbnail }}">
                        </div>
                        <div class="hidden content">
                            <img src="/uploads/thumbnails/{{ $video->thumbnail2 }}">
                        </div>
                    </div>
                </a>

                <div class="content">
                    <a href="/videoss/page/{{ $video->id }}" class="header">{{ $video->title }}</a>
                    <div class="meta">
                        <span class="date">{{ substr($video->published_at,0,10) }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <a href="/videoss/" class="fluid ui blue button"><i class="fa fa-video-camera"></i>&nbsp;查看所有视频</a>
    </div>
    @endif

    <div class="ui four column stackable centered grid raised segment">
        <div class="ui sixteen wide column">
            <h2 class="ui dividing header">
                <i class="fa fa-video-camera"></i>&nbsp;
                <div class="content"> 其他网站&nbsp;
                    <div class="ui red mini label">new</div>
                </div>
            </h2>
        </div>

        <div class="column">
            <div class="ui special cards">
                <div class="card">
                    <div class="blurring dimmable image">
                        <div class="ui inverted dimmer">
                            <div class="content">
                                <div class="center">
                                    <div class="ui primary button">即将上线</div>
                                </div>
                            </div>
                        </div>
                        <img src="/image/gaochasiwa2.jpg">
                    </div>
                    <div class="content">
                        <a class="header">预计上线时间</a>
                        <div class="meta">
                            <span class="date">预计上线时间：2016/5/1</span>
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="photo icon"></i>
                            专辑类型：
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui special cards">
                <div class="card">
                    <div class="blurring dimmable image">
                        <div class="ui inverted dimmer">
                            <div class="content">
                                <div class="center">
                                    <div class="ui primary button">即将上线</div>
                                </div>
                            </div>
                        </div>
                        <img src="/image/jinshenku2.jpg">
                    </div>
                    <div class="content">
                        <a class="header">预计上线时间</a>
                        <div class="meta">
                            <span class="date">预计上线时间：2016/4/1</span>
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="photo icon"></i>
                            预计上线时间
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui special cards">
                <div class="card">
                    <div class="blurring dimmable image">
                        <div class="ui inverted dimmer">
                            <div class="content">
                                <div class="center">
                                    <div class="ui primary button">即将上线</div>
                                </div>
                            </div>
                        </div>
                        <img src="/image/liantijinshenyi.jpg">
                    </div>
                    <div class="content">
                        <a class="header">预计上线时间</a>
                        <div class="meta">
                            <span class="date">预计上线时间：2016/4/15</span>
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="photo icon"></i>
                            专辑类型：预计上线时间
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui special cards">
                <div class="card">
                    <div class="blurring dimmable image">
                        <div class="ui inverted dimmer">
                            <div class="content">
                                <div class="center">
                                    <div class="ui primary button">即将上线</div>
                                </div>
                            </div>
                        </div>
                        <img src="/image/liantijinshenku.jpg">
                    </div>
                    <div class="content">
                        <a class="header">预计上线时间</a>
                        <div class="meta">
                            <span class="date">预计上线时间：2016/5/15</span>
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="photo icon"></i>
                            专辑类型：预计上线时间
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui special cards">
                <div class="card">
                    <div class="blurring dimmable image">
                        <div class="ui inverted dimmer">
                            <div class="content">
                                <div class="center">
                                    <div class="ui primary button">即将上线</div>
                                </div>
                            </div>
                        </div>
                        <img src="/image/gaochajinshen.jpg">
                    </div>
                    <div class="content">
                        <a class="header">预计上线时间</a>
                        <div class="meta">
                            <span class="date">预计上线时间：2016/6/1</span>
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="photo icon"></i>
                            专辑类型：预计上线时间
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.join')

@endsection

@section('script')
<script src="//cdn.bootcss.com/Swiper/3.3.1/js/swiper.min.js"></script>
<script type="text/javascript">
window.onload = function(){
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 'auto',
        centeredSlides: true,
        autoplay: 250000,
        autoplayDisableOnInteraction: false,
        paginationClickable: true,
        preloadImages: false,
        spaceBetween: 20
    });
}
$(function(){

    $('.swiper-slide,#latest_photo .card .image .content,.reveal > .content,#link .card .image').each(function(){
        $(this).children('img').css("visibility","hidden");
        $(this).css({
            "background-image":"url(" + $(this).children('img').attr('src') + ")",
            "background-size":"100% auto"
        });
    });

});

</script>
@endsection
