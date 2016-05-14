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
                <a href="{{url('/categories')}}">分类目录</a>
                <a href="{{url('/user/info/create_category')}}">免费发布信息</a>
                @if (Auth::guest())
                <a href="{{ url('/login') }}">登陆</a>
                <a href="{{ url('/register') }}">注册</a>
                @else
                <a href="/user/index"> {{ Auth::user()->name }} - 用户中心 </a>
                <a href="{{ url('/logout') }}" class="item"><i class="fa fa-btn fa-sign-out"></i>退出</a>
                @endif
            </div>
        </div>
    </div>
    <div class="head">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{url('img/ningan.png')}}" alt="宁安信息网"/>
                <span>www.ning-an.com</span>
            </a>

            <div class="search_wrap">
                <form id="search" method="POST" action="{{ url('/search') }}">
                    {!! csrf_field() !!}
                    <div class="key_word">
                        <input type="text" name="word" placeholder="请输入搜索关键词">
                        <button type="submit" class="submit"> <i class="fa fa-search"></i>&nbsp; </button>
                    </div>
                    <div class="search_bt">
                        <button type="submit">搜索</button>
                    </div>
                    <div class="post_bt">
                        <a href="{{url('/user/info/create_category')}}">免费发布信息</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
