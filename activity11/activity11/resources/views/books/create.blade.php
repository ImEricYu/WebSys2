

@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Add New Book</h1>
    
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="published_date">Published Date</label>
            <input type="date" id="published_date" name="published_date" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection