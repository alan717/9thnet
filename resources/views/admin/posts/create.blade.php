@extends('dashboard')

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>
                新增文章
            </h2>
        </div>
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group" style="max-width: 400px">
                <label for="title">标题</label>
                <input class="form-control" id="title" type="text" required name="title">
            </div>
            <div class="form-group" style="max-width: 300px">
                <label for="cover">封面</label>
                <input class="form-control" id="cover" type="file" required name="cover">
            </div>
            <div class="form-group">
                <label for="editor">内容</label>
                <textarea class="form-control" id="editor" required name="content"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    新增
                </button>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection
