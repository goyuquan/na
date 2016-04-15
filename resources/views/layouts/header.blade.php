<div class="header">
    <div class="top_bar">
        <div class="container">
            <div class="top_nav">
                <a href="{{url('/categories')}}">全部分类</a>
                <a href="{{url('/user/info/create_category')}}">创建</a>
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
    <div class="container">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{url('img/new-logo.gif')}}" />
        </a>

        <div class="search_wrap">
            <form id="search" method="POST" action="{{ url('/search') }}">
                {!! csrf_field() !!}
                <select name="search_category">
                    <option>类别一</option>
                    <option>类别一别一</option>
                </select>
                <input type="text" name="word" placeholder="请输入搜索关键词">
                <button type="submit"> <i class="fa fa-search"></i>&nbsp; </button>
                <a href="#" class="post_bt">free post</a>
            </form>
        </div>
    </div>
</div>
