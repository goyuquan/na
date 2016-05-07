<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')_description">
	<meta name="keywords" content="@yield('keywords')_keywords">
    <link href="{{ url('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/css/user/common.css')}}"/>
    @yield('style')
</head>
<body>
    @include('user.layouts.header')
    @yield('content')
    @include('layouts.footer')
    <script src="{{ url('/js/jquery-1.12.3.min.js')}}"></script>
    @yield('script')
</body>
</html>
