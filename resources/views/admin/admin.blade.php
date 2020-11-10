@extends('layout')

@section('resources')
    <link rel="stylesheet" href="/res/css/admin.admin.css">
@endsection

@section('navigation')
    <li><a href="/admin/create">Create Post</a></li>
@endsection

@section('content')
    <h1>Admin</h1>
    <ol id="posts">
        @foreach ($posts as $post)
            <li>
                <a href="admin/post/{{$post->id}}/edit">
                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->body, 0, 100)}}...</p>
                    <p>Click to read more</p>
                </a>
            </li>
        @endforeach
    </ol>
@endsection