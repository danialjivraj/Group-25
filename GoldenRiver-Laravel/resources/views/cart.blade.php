@extends('partials.nav')

@section('title')
<title>GoldenRiver | Cart</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')

@foreach($products as $product)
<div>
    <h2>{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
    <p>Amount: {{ $product->pivot->Amount }}</p>
    <p>Price: {{ $product->pivot->Product_Price }}</p>
</div>

@endforeach

@endsection
