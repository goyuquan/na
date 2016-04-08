<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')_description">
	<meta name="keywords" content="@yield('keywords')_keywords">
    <link href="//libs.baidu.com/fontawesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/css/common.css')}}">
    @yield('style')
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    @yield('script')
</body>
</html>
