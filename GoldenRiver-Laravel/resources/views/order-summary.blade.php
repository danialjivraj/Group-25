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
<p>"-- PRODUCT DETAILS GO HERE --"</p>
<hr>
<p>Subtotal: £{{ $order->Order_Total_Price }}</p>
<p>Order Date: {{ $order->created_at }}</p>
@endsection
