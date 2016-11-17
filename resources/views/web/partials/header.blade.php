<nav class="nav navbar-inverse navbar-fixed-top" id="navbar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/" data-pjax>The9</a></li>
                <li class="active"><a href="/">首页</a></li>
                <li><a href="/posts">精彩内容</a></li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(auth('web')->user())
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                                            id="name">{{ auth('web')->user()->name }} <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" style="background-color: #000000;top:98%;">
                            <li>
                                <a class="dropdown-inverse" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById ('logout-form').submit();">
                                    退出
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                        <li><a href="/login">登录</a></li>
                        <li><a href="/register">注册</a></li>
                    @endif
                </ul>
        </div>
    </div>
</nav>
<div style="height: 50px;"></div>