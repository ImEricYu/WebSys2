
@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-header">
        <h1>Login</h1>
        <p>Welcome back! Please enter your details</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>

    <div class="auth-footer">
        Doesn't have an account? <a href="{{ route('register') }}">Sign Up</a>
    </div>
</div>
@endsection