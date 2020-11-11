@extends('layout')

@section('resources')
    <link rel="stylesheet" href="/res/css/post.css">
@endsection

@section('navigation')
    <li class="role-require role-admin"><a href="/admin/post/{{$id}}/edit">Edit Post</a></li>   
@endsection

@section('content')
    <h1>{{$title}}</h1>
    <div id="post-body">{{$body}}</div>
@endsection