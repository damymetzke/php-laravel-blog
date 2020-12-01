@extends('layout')

@section('resources')
    <link rel="stylesheet" href="/res/css/auth.login.css">
@endsection

@section('content')
<form action="{{ route('login') }}" method="post">
    @csrf
    <div>
        <label for="name">Name</label>
        <input id="name" name="name" autofocus>
        <x-input-error type="name"></x-input-error>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <x-input-error type="password"></x-input-error>
    </div>

    <button type="submit">Login</button>
</form>

<a href="/register">register here</a>
@endsection