<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>
        9thnet
    </title>

    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

    <!-- Bootstrap -->
    <link href="/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/css/font-awesome.min.css" rel="stylesheet">
    <link href="/vendor/css/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/css/summernote.css">
    <link href="/css/admin/app.css" rel="stylesheet">
    @yield('css')


    <script src="/vendor/js/packager.min.js"></script>
    <script src="/vendor/js/jquery.min.js"></script>
    <script src="/vendor/js/jquery.pjax.min.js"></script>
    <script src="/vendor/js/sweetalert.min.js"></script>
    <script src="/vendor/js/bootstrap.min.js"></script>
    <script src="/vendor/js/topbar.min.js"></script>
    <script src="/vendor/js/jquery.validate.min.js"></script>
    <script src="/vendor/js/messages_zh.min.js"></script>
    <script src="/vendor/js/summernote.min.js"></script>
    <script src="/js/admin/app.js"></script>
    <script src="/js/admin/table.js"></script>
    <script>
        $(function () {
            app.init();
        });
    </script>
</head>
<body>
<nav class="nav navbar-default navbar-fixed-top" role="navigation" style="padding:0 20px 0 0;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="app_navbar">
            <ul class="nav navbar-nav">
                <li><a href="/admin" style="margin-left: 15px;margin-right: 69px;font-size: large">9thnet</a></li>
            </ul>
            @if(auth('admin')->user())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                                            id="name">{{ auth('admin')->user()->name }} <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/admin/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById ('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
@if(auth('admin')->user())
    <div class="site-nav-left-wrap" id="site_nav_left_wrap">

        <div style="height: 50px;"></div>
        <div class="site-nav-left scrollable-container">
            <div class="list-group">
                <a href="/admin" class="list-group-item active"
                   data-pjax
                   data-toggle="tooltip"
                   data-placement="right"
                   title="仪表盘">
                    <i class="fa fa-dashboard"></i>
                    <span class="text">仪表盘</span>
                    <span class="glyphicon glyphicon-triangle-left"></span>
                </a>
            </div>

            <div class="list-group">
                <a href="javascript:void(0);"
                   class="list-group-item list-group-item-header collapsed"
                   data-toggle="collapse"
                   data-target="#report_sidebar_nav_collapse">
                    <span class="text">文章管理</span>
                    <i class="fa fa-caret-down" id="caret"></i>
                </a>

                <div class="list-group site-nav-left-container collapse collapsed"
                     id="report_sidebar_nav_collapse">

                    <a href="/admin/posts" class="list-group-item"
                       data-pjax
                       data-toggle="tooltip"
                       data-placement="right">
                        <span class="text">文章列表</span>
                        <span class="glyphicon glyphicon-triangle-left"></span>
                    </a>
                    <a href="/admin/posts/create" class="list-group-item"
                       data-pjax
                       data-toggle="tooltip"
                       data-placement="right">
                        <span class="text">新增文章</span>
                        <span class="glyphicon glyphicon-triangle-left"></span>
                    </a>
                </div>
            </div>

            <div class="list-group">
                <a href="javascript:void(0);"
                   class="list-group-item list-group-item-header collapsed"
                   data-toggle="collapse"
                   data-target="#user_sidebar_nav_collapse">
                    <span class="text">成员管理</span>
                    <i class="fa fa-caret-down" id="caret"></i>
                </a>

                <div class="list-group site-nav-left-container collapse collapsed"
                     id="user_sidebar_nav_collapse">

                    <a href="/admin/users" class="list-group-item"
                       data-pjax
                       data-toggle="tooltip"
                       data-placement="right">
                        <span class="text">成员列表</span>
                        <span class="glyphicon glyphicon-triangle-left"></span>
                    </a>
                    <a href="/admin/users/create" class="list-group-item"
                       data-pjax
                       data-toggle="tooltip"
                       data-placement="right">
                        <span class="text">新增成员</span>
                        <span class="glyphicon glyphicon-triangle-left"></span>
                    </a>
                    <a href="/admin/users/send-email" class="list-group-item"
                       data-pjax
                       data-toggle="tooltip"
                       data-placement="right">
                        <span class="text">发送邮件</span>
                        <span class="glyphicon glyphicon-triangle-left"></span>
                    </a>
                </div>
            </div>

            <div class="list-group">
                <a href="javascript:void(0);"
                   class="list-group-item list-group-item-header collapsed"
                   data-toggle="collapse"
                   data-target="#permission_sidebar_nav_collapse">
                    <span class="text">权限管理</span>
                    <i class="fa fa-caret-down" id="caret"></i>
                </a>

                <div class="list-group site-nav-left-container collapse collapsed"
                     id="permission_sidebar_nav_collapse">

                    <a href="/admin/managers" class="list-group-item"
                       data-pjax
                       data-toggle="tooltip"
                       data-placement="right">
                        <span class="text">管理员列表</span>
                        <span class="glyphicon glyphicon-triangle-left"></span>
                    </a>
                    <a href="/admin/managers/create" class="list-group-item"
                       data-pjax
                       data-toggle="tooltip"
                       data-placement="right">
                        <span class="text">新增管理员</span>
                        <span class="glyphicon glyphicon-triangle-left"></span>
                    </a>
                </div>
            </div>

            <div class="btn-toggle-site-nav-left text-center" id="btn_toggle_site_nav_left_wrap_style">
                <span class="glyphicon glyphicon-arrow-left"></span>
                <span class="glyphicon glyphicon-arrow-right"></span>
            </div>

            <div class="fix-push-up" style="height: 120px;"></div>
        </div>
    </div>
@endif
<div style="height: 50px;"></div>
<div id="main_container" @if(auth('admin')->user())style="margin-left: 200px"@endif>
    @yield('content')
</div>
<script>
    // 全局 ajax 表单提交使用的 csrf token
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}
    });
</script>
</body>
</html>
