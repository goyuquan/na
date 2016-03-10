<a href="{{ url('/') }}">
    logo
</a>

@if (Auth::guest())
    <a href="{{ url('/login') }}">登陆</a>
    <a href="{{ url('/register') }}">注册</a>
@else
    <span> {{ Auth::user()->name }} </span>
    <a href="{{ url('/logout') }}" class="item"><i class="fa fa-btn fa-sign-out"></i>退出</a>
@endif
