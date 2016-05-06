@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/categories.css')}}" />
@endsection

@section('content')
<h1>全部类别</h1>


<div class="category container">
    <div class="head">
        <h2>Sell or Advertise anything using</h2>
    </div>
    <div class="column">

        <h3><a href="{{ url('/infos/category/'.$categories[0]->id) }}">{{ $categories[0]->name }}</a></h3>
        @if (count($type[0]) > 0)
        <ul>
            @foreach ($type[0] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        {{isset($type[1])}}

        <h3><a href="{{ url('/infos/category/'.$categories[1]->id) }}">{{ $categories[1]->name }}</a></h3>
        @if ( isset($type[1]) && count($type[1]) > 0)
        <ul>
            @foreach ($type[1] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

        <h3><a href="{{ url('/infos/category/'.$categories[2]->id) }}">{{ $categories[2]->name }}</a></h3>
        @if ( isset($type[2]) && count($type[2]) > 0)
        <ul>
            @foreach ($type[2] as $cate)
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="{{ url('/infos/category/'.$cate->id) }}">{{ $cate->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif

    </div>
    <div class="column">
        <h3>mobile phone</h3>
        <ul>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
        </ul>
        <h3><a href="#">老中青</a></h3>
        <ul>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">胆固醇</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">温暖</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">噢民</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">党中央</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">一缺抽</a>
            </li>
            <li>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="#">的脱掉</a>
            </li>
        </ul>
    </div>
    <div class="column">
        <h3>mobile phone</h3>
        <ul>
            <li>
                <a href="#">mobile phhone</a>
            </li>
        </ul>
    </div>
    <div class="column">
        <h3>mobile phone</h3>
        <ul>
            <li>
                <a href="#">mobile phhone</a>
            </li>
        </ul>
    </div>
    <div class="column">
        <h3>mobile phone</h3>
        <ul>
            <li>
                <a href="#">mobile phhone</a>
            </li>
        </ul>
    </div>
</div>


@endsection
