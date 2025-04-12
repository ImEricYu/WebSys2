@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Dashboard</h1>
    <p>Welcome to the Book Management System</p>
    
    <div class="stats">
        <div class="stat-card" style="background-color: var(--secondary); padding: 20px; border-radius: 8px; margin-top: 20px;">
            <h3>Total Books</h3>
            <p style="font-size: 24px; font-weight: bold;">{{ \App\Models\Book::count() }}</p>
        </div>
    </div>
</div>
@endsection