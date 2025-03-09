@extends('master')

@section('title', 'Order Information')

@section('content')
    <h1>Order Information</h1>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ $customer_id }}" readonly class="form-control"><br>

        <label>Name:</label>
        <input type="text" value="{{ $customer_name }}" readonly class="form-control"><br>

        <label>Order No:</label>
        <input type="text" value="{{ $order_no }}" readonly class="form-control"><br>

        <label>Date:</label>
        <input type="text" value="{{ $date }}" readonly class="form-control"><br>
    </form>
@endsection 
