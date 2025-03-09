@extends('master')

@section('title', 'Customer Information')

@section('content')
    <h1>Customer Information</h1>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ $id }}" readonly class="form-control"><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly class="form-control"><br>

        <label>Address:</label>
        <input type="text" value="{{ $address }}" readonly class="form-control"><br>
    </form>
@endsection 



