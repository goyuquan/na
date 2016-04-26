@extends('layouts.app')

@section('title','title_description')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="{{url('/css/home.css')}}" />
@endsection

@section('content')

<div class="services container">
    <div class="head">
        <h2>Sell or Advertise anything using</h2>
    </div>
    <ul class="list">
        <li>
            <a href="#">
                <i class="fa fa-flag" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-beer" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cloud" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-comment" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-coffee" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-code-fork" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-external-link-square" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-glass" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                <h3>汽车</h4>
            </a>
        </li>
    </ul>
</div>

<div class="category container">
    <div class="head">
        <h2>Sell or Advertise anything using</h2>
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
