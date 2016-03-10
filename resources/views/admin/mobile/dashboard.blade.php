<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>手机后台</title>
    <style media="screen">
        ul li {
            display: inline-block;
        }
        button {
            margin-top: 20px;
            float: right;
            padding: 5px 19px;
        }
    </style>
    @yield('style')
</head>
<body>
    @include('admin.mobile.header')
    @yield('content')
</body>
</html>
