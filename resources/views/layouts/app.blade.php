<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')_description">
	<meta name="keywords" content="@yield('keywords')_keywords">
    <link rel="stylesheet" href="/css/common.css">

    @yield('style')

</head>
<body>

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    <script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>

    @yield('script')
    <script type="text/javascript">


    </script>
</body>
</html>
