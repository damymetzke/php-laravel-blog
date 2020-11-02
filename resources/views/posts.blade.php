@extends('layout')

@section('resources')
    <link rel="stylesheet" href="res/css/posts.css">
@endsection

@section('content')
    <h1>Posts</h1>
    <ol id="posts">
        @foreach ($posts as $post)
            <li>
                <a href="post/{{$post->slug}}">
                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->body, 0, 100)}}...</p>
                    <p>Click to read more</p>
                </a>
            </li>
        @endforeach
    </ol>
@endsection