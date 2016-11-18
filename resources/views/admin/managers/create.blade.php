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
            <h1>新增管理员</h1>
        </div>
        <form action="/admin/managers" method="post" class="col-lg-4">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name">管理员名称</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email">管理员用户名(邮箱)</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : ''}}">
                <label for="permissions">分配权限</label>
                @foreach($permissions as $permission)
                    <input type="checkbox" id="permissions_{{ $permission->id }}" name="permissions[]"
                           value="{{ $permission->id }}">
                    <label for="permissions_{{ $permission->id }}">{{ $permission->description }}</label>
                @endforeach
                @if ($errors->has('permissions'))
                    <span class="help-block">
                            <strong>{{ $errors->first('permissions') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <label for="password">管理员密码</label>
                <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}">
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-lg" type="submit">新增</button>
            </div>
        </form>
    </div>
@endsection