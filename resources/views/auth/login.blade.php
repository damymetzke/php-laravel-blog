@extends('layout')

@section('resources')
    <link rel="stylesheet" href="/res/css/auth.login.css">
@endsection

@section('content')
<form action="{{ route('login') }}" method="post">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" autofocus>
        <x-input-error type="email"></x-input-error>
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