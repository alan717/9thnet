@extends('admin.dashboard')
@section('content')
<div class="container">
    <div class="col-xs-12 col-md-4 col-md-offset-4">
        <h3 class="form-header page-header text-center">
            <span class="glyphicon glyphicon-user"></span> 用户登录
        </h3>
        <form action="/admin/login" method="post" class="form" id="login_form" novalidate>
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> email</label>
                <input type="email" name="email"
                       required
                       data-rule-minlength="6"
                       data-rule-maxlength="20"
                       data-msg-required="请填写email"
                       class="form-control" id="login-username"
                       placeholder="Enter email"
                       value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> 密码</label>
                <input type="password" name="password" required
                       data-rule-minlength="4"
                       data-rule-maxlength="40"
                       data-msg-required="请填写密码"
                       class="form-control" id="login_password" placeholder="Enter password"
                       value="{{ old('password') }}">
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" checked>记住我
                    </label>
                    <div class="pull-right error">
                        <?php echo session('error');session('error',null);?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block">登 录</button>
            </div>
            <p>
                <a href="/admin/password/reset">忘记密码?</a>
            </p>
        </form>
    </div>
</div>
<script>
    $(function () {
        var options = {
            ignore: ".ignore",
            highlight: function (el) {
                $(el).closest('.form-group').addClass('has-error');
                $(el).closest('.form-group').find('.help-block').addClass('hidden');
                // remove the error message from the server
                // $(el).parent().find('i').html('&nbsp;').removeClass('fa fa-check');
            },
            unhighlight: function (el) {
                $(el).closest('.form-group').removeClass('has-error');
                // remove the error message from the server
                $(el).closest('.form-group').find('.help-block').addClass('hidden');
                // $(el).parent().find('i').html('&nbsp;').addClass('fa fa-check');
            },
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        };

        $('#login_form').validate(options);
    });
</script>
@endsection