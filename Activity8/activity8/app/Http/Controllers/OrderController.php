<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function customer($id, $name, $address)
    {
        return view('customer', compact('id', 'name', 'address'));
    }

    public function item($id, $name, $price)
    {
        return view('item', compact('id', 'name', 'price'));
    }

    public function order($customer_id, $customer_name, $order_no, $date)
    {
        return view('order', compact('customer_id', 'customer_name', 'order_no', 'date'));
    }

    public function orderDetails($trans_no, $order_no, $item_id, $name, $price, $qty)
    {
        return view('orderdetails', compact('trans_no', 'order_no', 'item_id', 'name', 'price', 'qty'));
    }
}
