@extends('partials.nav')

@section('title')
<title>GoldenRiver | Profile</title>
@endsection

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('body')


<div class="table-container">
    <h1>Order Details</h1>
    <table class="orders-table">
        <thead>
            <tr>
                <th>
                    <p><strong>Order ID:</strong> {{ $order->Order_ID }}</p>
                </th>
                <th>
                    <p><strong>Order Status:</strong> {{ $order->Order_Status }}</p>
                </th>
            <tr>
                <thead>
    </table>
</div>

<div class="table-container">
    <table class="orders-table">
        <h2>Order Items</h2>
        @if(isset($orderItems) && $orderItems->count() > 0)

        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalAmount = 0;
            @endphp

            @foreach($orderItems as $item)
            <tr>
                <td>{{ $item->product->Product_Name }}</td>
                <td>{{ $item->Amount }}</td>
                <td>£{{ $item->Price }}</td>
            </tr>
            @php
            $totalAmount += $item->Price * $item->Amount;
            @endphp
            @endforeach

            <tr>
                <td colspan="2">Total Amount:</td>
                <td>£{{ $totalAmount }}</td>
            </tr>

        </tbody>
    </table>
</div>
@else
<p>No order items found.</p>
@endif

@endsection