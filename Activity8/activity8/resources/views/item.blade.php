@extends('master')

@section('title', 'Item Information')

@section('content')
    <h1>Item Information</h1>
    <form>
        <label>Item No:</label>
        <input type="text" value="{{ $id }}" readonly class="form-control"><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly class="form-control"><br>

        <label>Price:</label>
        <input type="text" value="{{ $price }}" readonly class="form-control"><br>
    </form>
@endsection 
