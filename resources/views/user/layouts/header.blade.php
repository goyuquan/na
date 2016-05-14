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
                <a href="{{url('/')}}">网站宁安信息网</a>
                <a href="{{url('/user/info/create_category')}}">免费发布信息</a>
                @if (Auth::guest())
                <a href="{{ url('/login') }}">登陆</a>
                <a href="{{ url('/register') }}">注册</a>
                @else
                <a href="/user/index"> {{ Auth::user()->name }} - 用户中心</a>
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
                <li><a href="{{url('/user/index')}}">用户中心宁安信息网</a></li>
                <li><a href="{{url('/user/infos')}}">信息管理</a></li>
            </ul>
        </div>
    </div>
</div>
