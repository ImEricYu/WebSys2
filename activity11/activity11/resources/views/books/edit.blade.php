
@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Edit Book</h1>
    
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        
        <div class="form-group">
            <label for="published_date">Published Date</label>
            <input type="date" id="published_date" name="published_date" class="form-control" 
                   value="{{ $book->published_date->format('Y-m-d') }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection