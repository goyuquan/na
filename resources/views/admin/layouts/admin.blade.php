<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理后台</title>
    <link rel="stylesheet" href="/css/admin/common.css">
    @yield('style')
</head>
<body>
    @include('admin.layouts.header')
    @yield('content')
    @include('admin.layouts.footer')
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    @yield('script')
</body>
</html>
