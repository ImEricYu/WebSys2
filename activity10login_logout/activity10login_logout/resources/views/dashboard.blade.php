{{-- <!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to Dashboard</h1>
    <p>You are logged in!</p>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html> --}}

@extends('layouts.app')

@section('content')
<div class="auth-container" style="max-width: 600px;">
    <div class="auth-header">
        <h1>Dashboard</h1>
        <p>You are successfully logged in!</p>
    </div>
    
    <div style="text-align: center; margin-top: 30px;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>
@endsection