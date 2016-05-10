<div class="header">
    <a href="#top_bar" id="open_nav" class="menu_bar open">
        <i class="fa fa-bars"></i>
    </a>
    <div id="top_bar" class="top_bar">
        <a href="#open_nav" class="menu_bar close">
            <i class="fa fa-arrow-up"></i>
        </a>
        <div class="container">
            <div class="top_nav">
                <a href="{{url('/')}}">首页</a>
                <a href="{{url('/admin')}}">控制台</a>
                <a href="{{url('/admin/users/')}}">用户</a>
                <a href="{{url('/admin/categories')}}">分类</a>
                <a href="{{url('/admin/pages')}}">页面</a>

                @if (Auth::guest())
                <a href="{{ url('/login') }}">登陆</a>
                <a href="{{ url('/register') }}">注册</a>
                @else
                <a href="/user/index"> {{ Auth::user()->name }} </a>
                <a href="{{ url('/logout') }}" class="item"><i class="fa fa-btn fa-sign-out"></i>退出</a>
                @endif
            </div>
        </div>
    </div>
    <div class="head">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{url('img/new-logo.gif')}}" />
            </a>
            <ul>
                <li><a href="{{url('/')}}">首页</a></li>
                <li><a href="{{url('/admin')}}">控制台</a></li>
                <li><a href="{{url('/admin/users/')}}">用户</a></li>
                <li><a href="{{url('/admin/categories')}}">分类</a></li>
                <li><a href="{{url('/admin/pages')}}">页面</a></li>
            </ul>
        </div>
    </div>
</div>
