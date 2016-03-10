<div id="menu" class="ui stackable menu">
  <div class="ui container">
    <a href="{{ url('/') }}" class="header item">
      welcome logo
    </a>

    <a href="{{ url('/') }}" class="item">首页</a>
    <a href="/albums/" class="item">相册</a>
    <a href="/videoss/" class="item">视频</a>
    <a href="/price" class="item">加入VIP会员</a>
      @if (Auth::guest())
      <a href="{{ url('/login') }}" class="item">登陆</a>
      <a href="{{ url('/register') }}" class="item">注册</a>
      @else
      <span id="user" class="item" style="cursor:default">
          <a class="ui blue image label">
                @if ( Auth::user() && Auth::user()->member)
                <i class="user icon"></i> VIP
                @endif
                {{ Auth::user()->name }}
          </a>
      </span>
      <a href="{{ url('/logout') }}" class="item"><i class="fa fa-btn fa-sign-out"></i>退出</a>
      @endif

      @if ( Auth::user() && Auth::user()->member)
          <div class="ui card special popup" id="user_pop">
              <div class="content">
                  <div class="header">用户名 : {{ Auth::user()->name }}</div>
                  <div class="meta">注册邮箱 : {{ Auth::user()->email }}</div>
                  <div class="description">到期时间:{{ "20".substr(date('y-m-d h:i:s',Auth::user()->member),0,8) }} </div>
                  <div class="description">会员时间:{{ sprintf("%.1f",(Auth::user()->member - time())/86400) }}&nbsp;天 </div>
                  <!-- <div class="extra content">
                      <a><i class="clock icon"></i>  Members </a>
                  </div> -->
              </div>
          </div>
      @endif

    </div>
</div>
