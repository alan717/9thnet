<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>9th后台登录</title>

    <!-- Bootstrap -->
    <link href="/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin/app.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/vendor/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/vendor/js/bootstrap.min.js"></script>
    <script src="/vendor/js/jquery.validate.min.js"></script>
    <script src="/vendor/js/messages_zh.min.js"></script>

</head>
<body>
<div class="form-wrap password-email-wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                <form class="login-form" role="form" method="POST" action="{{ url('/password/reset') }}"
                      novalidate
                >
                    {!! csrf_field() !!}

                    <div class="form-header page-header text-center">
                        <h3>重置密码</h3>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                        {{-- this field got submitted to the server along with other form data --}}
                        <input id="email" type="email" class="form-control hidden" name="email"
                               value="{{ $email or old('email') }}">

                        {{-- disabled field is not submitted; this one is just for the view --}}
                        <input type="email" class="form-control" value="{{ $email or old('email') }}" disabled>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="新密码"
                               required data-rule-minlength="6" data-rule-maxlength="20">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="重复密码" data-rule-minlength="6" data-rule-maxlength="20"
                               data-rule-equalto="#password" data-msg-equalto="两次输入的密码不一致">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            提交
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>


<script>
    $(function () {
        app.components.form.validate();
    });
</script>



