<a href="{{ url('/') }}">
    logo
</a>
<a href="{{url('/categories')}}">全部分类</a>
<a href="{{url('/user/info/create_category')}}">创建</a>
@if (Auth::guest())
    <a href="{{ url('/login') }}">登陆</a>
    <a href="{{ url('/register') }}">注册</a>
@else
    <a href="/user/index"> {{ Auth::user()->name }} </a>
    <a href="{{ url('/logout') }}" class="item"><i class="fa fa-btn fa-sign-out"></i>退出</a>
@endif
<hr>
<form id="search" method="POST" action="{{ url('/search') }}">
	{!! csrf_field() !!}
    <input type="text" name="word">
    <button type="submit"> 搜索 </button>
</form>
<hr>
