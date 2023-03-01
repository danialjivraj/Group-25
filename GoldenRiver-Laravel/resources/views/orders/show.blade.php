@extends('partials.nav')

@section('title')
<title>GoldenRiver | Profile</title>
@endsection

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@section('body')

<table class="show-order-table">
    <thead>
        <tr>
            <th>Items in this order</th>
            <th>Status: {{ $order->Order_Status }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
        $totalItems = 0;
        $totalAmount = 0;
        @endphp
        @if(isset($orderItems) && $orderItems->count() > 0)
        @foreach($orderItems as $item)
        <tr>
            <td>
                <div class="show-product-image">
                    <img src="/images/allProductImages/{{$item->product->Product_ID}}.jpg" alt="productImage">
                </div>
                <div class="product-info">
                    <p><strong>{{ $item->product->Product_Name }}</strong></p>
                    <p>Qty: {{ $item->Amount }}</p>
                    <p>£{{ $item->Price }}</p>
                </div>
            </td>
            @php
            $totalItems += $item->Amount;
            $totalAmount += $item->Price * $item->Amount;
            @endphp
        </tr>
        @endforeach
        <tr>
            <td><strong>{{ $totalItems }} Items</strong></td>
            <td><strong>£{{ $totalAmount }}</strong></td>
        </tr>
        <tr>
            <td>Shipping:</td>
            <td>£0.00</td>
        </tr>
        <tr>
            <td><strong>Grand Total:</strong></td>
            <td><strong>£{{ $totalAmount }}</strong></td>
        </tr>
        @else
        <tr>
            <td colspan="3">No order items found.</td>
        </tr>
        @endif
    </tbody>
</table>
<br><br><br><br><br><br><br>

@endsection