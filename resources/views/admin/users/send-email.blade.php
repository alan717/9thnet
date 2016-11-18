@extends('admin.dashboard')
@section('content')
    @if(session('status')=='fail')
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            发送失败
        </div>
    @elseif(session('status')=='success')
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            发送成功,已给{{ session('count') }}个人发送
        </div>
    @endif
    <div class="container">
        <div class="page-header">
            <h2>
                给所有成员发送邮件
            </h2>
        </div>
        <form method="post" action="/admin/users/send-email" class="col-md-4">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                <label for="title">邮件主题</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                    <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">请输入当前登录用户的密码（确保您有成员管理的权限）</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <a target="_blank" href="/admin/users/email" class="btn btn-primary">预览邮件内容</a>
            <button type="submit" class="btn btn-primary pull-right">发送</button>
        </form>
    </div>
@endsection