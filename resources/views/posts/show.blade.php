@extends('layout')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>{{ $post->title }}</h1>
            <span class="text-muted">{{ $post->updated_at }}</span>
        </div>
        {!! $post->content !!}
    </div>

@endsection