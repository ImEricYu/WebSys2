@extends('master')

@section('title', 'Order Details')

@section('content')
    <h1>Order Details</h1>
    <form>
        <label>Transaction No:</label>
        <input type="text" value="{{ $trans_no }}" readonly class="form-control"><br>

        <label>Order No:</label>
        <input type="text" value="{{ $order_no }}" readonly class="form-control"><br>

        <label>Item ID:</label>
        <input type="text" value="{{ $item_id }}" readonly class="form-control"><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly class="form-control"><br>

        <label>Price:</label>
        <input type="text" value="{{ $price }}" readonly class="form-control"><br>

        <label>Quantity:</label>
        <input type="text" value="{{ $qty }}" readonly class="form-control"><br>
    </form>
@endsection
