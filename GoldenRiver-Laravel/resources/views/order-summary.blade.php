@extends('partials.nav')

@section('title')
<title>GoldenRiver | Cart</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('body')
<h2>Order Summary</h2>
<p>Order Reference: {{ $order->Order_ID }}</p>
<p>Order Status: {{ $order->Order_Status }}</p>
<hr>

@foreach ($orderItems as $orderItem)

<div>
<img src="/images/allProductImages/{{$orderItem->product->Product_ID}}.jpg" alt="productImage" width="130" height="180" >
<h2>{{ $orderItem->product->Product_Name }} </h2>
<p>Price: £{{ $orderItem->Price }}</p>
<p>Quantity: x{{ $orderItem->Amount }}<p>
</div>

@endforeach

<hr>
<p>Subtotal: £{{ $order->Order_Total_Price }}</p>
<p>Order Date: {{ $order->created_at->format('Y-m-d'); }}</p>
<p>Order Time: {{ $order->created_at->format('H:i'); }}</p>
@endsection
