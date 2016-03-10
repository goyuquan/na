@extends('layouts.app')

@section('title',"$album->title")
@section('description',"$album->title")
@section('keywords',"$album->title")

@section('style')


<style>
.ui.labeled.icon.button, .ui.labeled.icon.buttons .button {
    top:-16px;
}
.cards .card {
    cursor: pointer;
}

</style>

@endsection

@section('content')
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="ui container">
    <div class="ui large breadcrumb">
        <a href="{{url('/')}}" class="section">首页</a>
        <i class="right chevron icon divider"></i>
        <a href="/albums/" class="section">图片</a>
        <i class="right chevron icon divider"></i>
        <div class="active section">{{ $album->title }}</div>
        <a class="ui blue tag label" onclick="window.history.go(-1)" style="margin-left:3em;"> 返回 </a>
    </div>
</div>

@include('includes.join')

<div class="ui grid container">
    <div class="eleven wide computer sixteen wide tablet sixteen wide mobile column">

        <h2 class="ui header center aligned">
            {{ $album->title}} <div class="sub header"><i class="wait icon"></i>更新时间 : {{ substr($album->published_at,0,10) }}</div>
        </h2>

        <div class="ui raised segment">
            <div class="ui four stackable cards">
                @if (count($imgs) > 0)
                @foreach ($imgs as $img)
                <div class="card">
                    <a href="/album/{{ $album->id }}/page/">
                        <div class="image">
                            <img src="/uploads/thumbnails/{{ $img->thumbnail }}">
                        </div>
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="five wide computer sixteen wide tablet sixteen wide mobile column">
        <div class="ui segment">@include('includes.sidebar')</div>
    </div>
</div>
<br>
<br>
@endsection

@section('script')
<script type="text/javascript">
$(function(){

    $(".card").each(function(){
        var old_href = $(this).find("a").attr("href");
        var car_index = $(this).index() + 1;
        $(this).find("a").attr("href",old_href + car_index);
    });

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
