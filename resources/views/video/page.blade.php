@extends('layouts.app')

@section('title',$video->title)
@section('description',$video->title)
@section('keywords',$video->title)

@section('style')
<link rel="stylesheet" href="//cdn.bootcss.com/video.js/5.8.0/alt/video-js-cdn.min.css">

<style>
#my-video {
    width:100%;
}
#video_wrap {
    margin: 3em auto;
}
</style>

@endsection

@section('content')

<div class="ui container">
    <div class="ui large breadcrumb">
        <a href="{{url('/')}}" class="section">首页</a>
        <i class="right chevron icon divider"></i>
        <a href="/albums/" class="section">视频</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">{{ $video->title }}</div>
        <a class="ui blue tag label" onclick="window.history.go(-1)" style="margin-left:3em;"> 返回 </a>
    </div>
</div>

<div class="ui grid container">

    <div class="twelve wide computer sixteen wide tablet sixteen wide mobile column">
        <div id="video_wrap" class="ui raised segment">

            <h2 class="ui header">
                 <i class="fa fa-video-camera"></i>
                <div class="content">{{ $video->title }}
                    <div class="sub header">发布时间 : {{ substr($video->published_at,0,10) }}</div>
                </div>
            </h2>

            <video id="my-video" class="video-js" controls preload="auto" width="800" height="480"
            poster="/uploads/{{ $video->thumbnail }}"
            data-setup="{}">
            <source src="/videos/{{ $video->video }}" type='video/mp4'>

            </video>
        </div>
    </div>
    <div class="four wide computer sixteen wide tablet sixteen wide mobile column">
        <div class="ui segment">@include('includes.sidebar')</div>
    </div>
</div>

@endsection

@section('script')
<script src="//cdn.bootcss.com/video.js/5.8.0/video.min.js"></script>
<script src="//cdn.bootcss.com/video.js/5.8.0/lang/zh-CN.js"></script>
@endsection
