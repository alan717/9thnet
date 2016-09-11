@extends('dashboard')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1>管理员权限管理</h1>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>名称</th>
                <th>权限</th>
                <th>用户名(邮箱)</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    @foreach($user->permissions as $permission)
                        <td>{{ $permission->description }}</td>
                    @endforeach
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td class="text-center"><button class="btn btn-primary btn-xs">
                            <i class="fa fa-edit fa-fw"></i>编辑</button>
                        <button class="btn btn-danger btn-xs">
                            <i class="fa fa-trash fa-fw"></i>删除</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection