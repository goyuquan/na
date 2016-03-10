@extends('layouts.app')

@section('title',"相册列表")
@section('description',"abc")
@section('keywords',"keywords")

@section('style')
<link rel="stylesheet" href="/css/bootstrap-pagination.min.css" >
<style>

.statistics div {
    color:#989ba2!important;
}
.labeled {
    font-size: 1em!important;
}
.statistic > .label {
    margin: 1em 0 0 0!important;
}
</style>

@endsection

@section('content')

<div class="ui container">
    <div class="ui large breadcrumb container">
        <a href="{{ url('/') }}" class="section">首页</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">图片</div>
        <a class="ui blue tag label" onclick="window.history.go(-1)" style="margin-left:3em;"> 返回 </a>
    </div>
</div>

@include('includes.join')

<div class="ui grid container">
  <div class="ui raised segment eleven wide computer sixteen wide tablet sixteen wide mobile column">
      @if (count($albums) > 0)
          @foreach ($albums as $album)
          <div class="ui vertical segment">
              <div class="ui grid">
                  <a href="/album/{{ $album->id }}" class="five wide computer eight wide tablet sixteen wide mobile column">
                      <div class="ui medium image">
                          <img src="/uploads/thumbnails/{{ $album->thumbnail }}">
                      </div>
                  </a>
                  <a href="/album/{{ $album->id }}" class="five wide computer eight wide tablet sixteen wide mobile column">
                      <div class="ui medium image image2">
                          <img src="/uploads/thumbnails/{{ $album->thumbnail2 }}">
                      </div>
                  </a>
                  <div class="content six wide computer sixteen wide tablet sixteen wide mobile column">
                      <a href="/album/{{ $album->id }}" class="header ui large">{{ $album->title }}</a>
                      <div class="ui divider"></div>
                      <div class="meta">
                          <span><i class="wait icon"></i>更新时间 : {{ substr($album->published_at,0,10) }}</span>
                      </div>
                      <div class="description">
                          <p>description : {{ $album->content }}</p>
                      </div>
                      <div class="extra">
                          <div class="ui label"><i class="photo icon"></i> {{ $album->img->count() }} </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      @endif

      <div class="dt-row dt-bottom-row">
          <div class="row text-center">
              <div class="dataTables_paginate paging_bootstrap_full" style="text-align: center;">
                  {{ $albums->links() }}
              </div>
          </div>
      </div>

  </div>
  <div class="five wide computer sixteen wide tablet sixteen wide mobile column">
    <div class="ui segment">@include('includes.sidebar')</div>
  </div>
</div>

@include('includes.join')

@endsection

@section('script')
<script type="text/javascript" src="/js/swiper.min.js"> </script>
<script type="text/javascript">
$(function(){
    $('.image').each(function(){
        $(this).children('img').css("visibility","hidden");
        $(this).css({
            "background-image":"url(" + $(this).children('img').attr('src') + ")",
            "background-size":"100% auto"
        });
    });
});
</script>
@endsection
