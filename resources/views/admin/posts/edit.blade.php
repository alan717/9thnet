@extends('dashboard')
@section('content')
    <div class="container">
        <div class="page-header">
            <h2>
                编辑文章
            </h2>
        </div>
        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group {{ $errors->has('title') ? 'has-error': ''}}" style="max-width: 400px">
                <label for="title">标题</label>
                <input class="form-control" id="title" type="text" required name="title" value="{{ old('title',$post->title) }}">
                @if ($errors->has('title'))
                    <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('cover') ? 'has-error': ''}}" style="max-width: 300px">
                <label for="cover">封面</label>
                <input class="form-control" id="cover" type="file" name="cover">
                <img src="{{ $post->cover }}" alt="封面">
                @if ($errors->has('cover'))
                    <span class="help-block">
                            <strong>{{ $errors->first('cover') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error': ''}}">
                <label for="summernote">内容</label>
                <div class="form-control" id="summernote" required>{!! $post->content !!}</div>
                <textarea name="content" id="content" hidden></textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                @endif
            </div>
            @if($errors->has('general'))
                <span class="help-block">
                            <strong>{{ $errors->first('general') }}</strong>
                        </span>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    新增
                </button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            var summernote = $('#summernote');
            summernote.summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function (files) {
                        console.log(files);
                        var $editor = $(this);
                        // 构建一个 form 数据
                        var data = new FormData();
                        // 增加一个字段 file 值是待上传的文件的内容
                        data.append('file', files[0]);

                        $.ajax({         // 上传文件到服务器端
                            url: '/admin/upload',
                            method: 'POST',
                            data: data,
                            processData: false,      // 这两个比较关键，禁止处理 form 数据
                            contentType: false,      //
                            success: function (url) {
                                // 插入图片
                                summernote.summernote('insertImage', url);
                            }
                        });
                    }
                }
            });
            $('#submitBtn').click(function () {
                $('#content').val(summernote.summernote('code'));
            });

        });
    </script>
@endsection
