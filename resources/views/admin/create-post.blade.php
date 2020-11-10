@extends('layout')

@section('resources')
        <link rel="stylesheet" href="/res/css/admin.create-post.css">
        <script src="/res/js/create-post.js" defer></script>
@endsection

@section('content')
    <h1>Create new Post</h1>
    <p>
        Title: <input type="text" id="input-title">
    </p>
    <hr>
    <textarea id="input-body"></textarea>
    <hr>
    <button id="create-post">Create post</button>
@endsection