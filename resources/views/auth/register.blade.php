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
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div>
        <label for="password-confirm">Confirm Password</label>
        <input type="password" id="password-confirm" name="password_confirmation">
    </div>

    <button type="submit">Register</button>
</form>
@endsection
