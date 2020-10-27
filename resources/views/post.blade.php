@extends('layout')

@section('resources')
    <link rel="stylesheet" href="/res/css/post.css">
@endsection

@section('content')
    <h1>{{$title}}</h1>
    <div id="post-body">{{$body}}</div>
@endsection