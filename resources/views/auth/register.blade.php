@extends('layout')

@section('resources')
    <link rel="stylesheet" href="/res/css/auth.register.css">
@endsection

@section('content')

<form action="{{ route('register') }}" method="post">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" autofocus>
        <x-input-error type="name"></x-input-error>

    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <x-input-error type="email"></x-input-error>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <x-input-error type="password"></x-input-error>
    </div>
    <div>
        <label for="password-confirm">Confirm Password</label>
        <input type="password" id="password-confirm" name="password_confirmation">
    </div>

    <button type="submit">Register</button>
</form>
@endsection
