<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')_description">
	<meta name="keywords" content="@yield('keywords')_keywords">
    <link rel="stylesheet" href="//cdn.bootcss.com/semantic-ui/2.1.8/semantic.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/common.css">

    @yield('style')

</head>
<body>

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    <script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/semantic-ui/2.1.8/semantic.min.js"></script>

    @yield('script')
    <script type="text/javascript">

    $(function(){

          $('#user').popup({
            popup : $('#user_pop'),
            inline   : true,
            hoverable: true,
            position : 'bottom right'
          });

    });

    </script>
</body>
</html>
