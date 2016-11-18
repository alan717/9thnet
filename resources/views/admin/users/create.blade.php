@extends('admin.dashboard')
@section('content')
    @if($errors->has('general'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            新增失败
        </div>
    @elseif(session('status')=='success')
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            新增成功
        </div>
    @endif
    <div class="container">
        <div class="page-header">
            <h1>新增成员</h1>
            <span class="text-muted">密码默认为：123456</span>
        </div>
        <form action="/admin/users" method="post" class="col-lg-4">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name">成员名称</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email">成员用户名(邮箱)</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">新增</button>
            </div>
        </form>
    </div>
@endsection