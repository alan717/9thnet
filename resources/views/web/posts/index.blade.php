@extends('web.layout')

@section('content')
    <div class="col-ma-4">
        <ul class="breadcrumb">
            <li><a href="#">开发语言</a></li>
            <li><a href="#">web课程</a></li>
            <li><a href="#" class="text-muted">黑客编程</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            @foreach( $posts as $post)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $post->cover }}" alt="图片">
                        <div class="caption">
                            <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                            <p>{{ $post->updated_at }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection