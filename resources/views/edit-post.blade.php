@extends('layout')

@section('resources')
    <link rel="stylesheet" href="/res/css/edit-post.css">
    <script src="/res/js/edit-post.js" defer></script>
@endsection

@section('content')
    <h1>Admin: Edit Post</h1>
    <p>
        Title: <input type="text" name="title" id="input-title" value="{{$title}}"> 
    </p>
    <hr>
    <textarea id="post-body">{{$body}}</textarea>
    <hr>

    <div id="actions">
        <button>Update Post</button>
        <button>Delete Post</button>
    </div>

@endsection