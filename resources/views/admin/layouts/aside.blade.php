<body class="">

<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it -->

            <a href="javascript:void(0);" id="show-shortcut">
                <i class="fa fa-user" style="font-size:2em;position: relative; top: 0.1em;margin-right:0.5em;">    </i>
                <span>
                    {{ Auth::user()->name }}
                </span>
                <i class="fa fa-angle-down"></i>
            </a>

        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive

    To make this navigation dynamic please make sure to link the node
    (the reference to the nav > ul) after page load. Or the navigation
    will not initialize.
-->
<nav>
    <!-- NOTE: Notice the gaps after each icon usage <i></i>..
    Please note that these links work a bit different than
    traditional hre="" links. See documentation for details.
-->

<ul>
    <li>
        <a href="/admin" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">控制台</span></a>
    </li>
    <li id="aside_article">
        <a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">内容管理</span></a>
        <ul id="aside_article_">
            <li id="aside_article_index">
                <a href="/admin/articles/">文章列表</a>
            </li>
            <li id="aside_article_add">
                <a href="/admin/article/create">新建文章</a>
            </li>

        </ul>
    </li>
    <li id="aside_album">
        <a href="javascript:void(0);"><i class="fa fa-lg fa-fw fa-image"></i> <span class="menu-item-parent">相册</span></a>
        <ul id="aside_album_">
            <li id="aside_album_index">
                <a href="/admin/albums/"> 相册列表 </a>
            </li>
            <li id="aside_album_create">
                <a href="/admin/album/create"> 创建相册 </a>
            </li>
        </ul>
    </li>
    <li id="aside_video">
        <a href="javascript:void(0);"><i class="fa fa-lg fa-fw fa-video-camera"></i> <span class="menu-item-parent">视频</span></a>
        <ul id="aside_video_">
            <li id="aside_video_index">
                <a href="/admin/videos/"> 视频列表 </a>
            </li>
            <li id="aside_video_create">
                <a href="/admin/video/create"> 创建视频 </a>
            </li>
        </ul>
    </li>
    <li id="aside_display">
        <a href="javascript:void(0);"><i class="fa fa-lg fa-fw fa-video-camera"></i> <span class="menu-item-parent">展示位置管理</span></a>
        <ul id="aside_display_">
            <li id="aside_display_manage">
                <a href="/admin/display"> 展示位置 </a>
            </li>
            <li id="aside_display_banner">
                <a href="/admin/display/banner/"> 首页banner </a>
            </li>
        </ul>
    </li>
    <li id="aside_user">
        <a href="javascript:void(0);"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">用户管理</span></a>
        <ul id="aside_user_">
            <li id="aside_user_index">
                <a href="/admin/users/">用户列表</a>
            </li>
            <li id="aside_user_create">
                <a href="/admin/user/create">添加用户</a>
            </li>
        </ul>
    </li>
</ul>
</nav>
<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>
