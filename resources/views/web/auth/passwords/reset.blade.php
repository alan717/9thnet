@extends('admin.dashboard')
@section('content')
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
                        {{--<input id="email" type="email" class="form-control hidden" name="email" value="{{ $email or old('email') }}">--}}

                        <input type="text" class="hidden" name="token" value="{{ $token or old('token') }}">

                        {{-- disabled field is not submitted; this one is just for the view --}}
                        <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}" placeholder="请输入邮箱地址">

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

<script>
    $(function () {
        app.components.form.validate();
    });
</script>

@endsection

