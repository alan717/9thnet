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

    <link rel="icon" type="image/png" href="favicon.ico">

    <!-- Bootstrap -->
    <link href="/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/css/jquery-ui.min.css" rel="stylesheet">
    <link href="/vendor/css/sweetalert.css" rel="stylesheet">
    <link href="/vendor/css/font-awesome.min.css" rel="stylesheet">
    <link href="/vendor/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="/vendor/css/jquery.emoji.css" rel="stylesheet">
    <link href="/css/front/app.css" rel="stylesheet">
    @yield('css')

    <script src="/vendor/js/jquery.min.js"></script>
    <script src="/vendor/js/bootstrap.min.js"></script>
    <script src="/vendor/js/sweetalert.min.js"></script>
    <script src="/vendor/js/jquery.validate.min.js"></script>
    <script src="/vendor/js/jquery.pjax.min.js"></script>
    <script src="/vendor/js/jquery-ui.min.js"></script>
    <script src="/vendor/js/additional-methods.min.js"></script>
    <script src="/vendor/js/messages_zh.min.js"></script>
    <script src="/vendor/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="/vendor/js/jquery.mousewheel-3.0.6.min.js"></script>
    <script src="/vendor/js/jquery.emoji.min.js"></script>
</head>
<body>
@include('partials.header')

<div class="container-fluid" id="main_container">
    @yield('content')
</div>

@include('partials.footer')
</body>
</html>
