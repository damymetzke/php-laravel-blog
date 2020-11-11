@extends('layout')

@section('resources')
    <link rel="stylesheet" href="/res/css/post.css">
@endsection

@section('navigation')
    @auth
        <li><a href="/admin/post/{{$id}}/edit">Edit Post</a></li>   
    @endauth
@endsection

@section('content')
    <h1>{{$title}}</h1>
    <div id="post-body">{{$body}}</div>
@endsection