@extends('dashboard')

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>
                文章管理
            </h2>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>标题</th>
                <th>内容</th>
                <th>更新时间</th>
                <th>创建时间</th>
                <th style="width:135px;" class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="posts-content">{{ $post->content }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td class="text-center">
                        <a class="btn btn-primary btn-xs btn-edit"
                           href="/admin/posts/{{ $post->id }}/edit"
                        >
                            <i class="fa fa-edit fa-fw"></i>
                            编辑
                        </a>

                        <button class="btn btn-danger btn-xs btn-delete"
                                data-url="/admin/posts/{{ $post->id }}">
                            <i class="fa fa-trash fa-fw"></i>
                            删除
                        </button>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('.btn-delete').on('click', function () {
            var $that = $(this);
            swal({
                        title: "是否删除?",
                        text: "此操作不可逆!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "是,删除它!",
                        closeOnConfirm: false
                    },
                    function () {
                        $.ajax({
                            url: $that.attr('data-url'),
                            type: 'DELETE',
                            data: $that.serializeArray()
                        }).done(function () {
                            swal('删除成功', "", "success");
                            $that.closest('tr').remove();
                        }).fail(function () {
                            swal('删除失败', data, "error");
                        });
                    });
        })
    </script>
@endsection

@section('css')
    <link href="/css/admin/posts.css" rel="stylesheet">
@endsection