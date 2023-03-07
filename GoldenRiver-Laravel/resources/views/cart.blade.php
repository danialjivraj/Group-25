@extends('partials.nav')

@section('title')
<title>GoldenRiver | Cart</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')
@if(session()->has('rmvcartmsg'))
    <div class="alert alert-success" role="alert" id="go-to-basket">
        {{session()->get('rmvcartmsg')}}
    </div>
    @endif
@foreach($products as $product)
<div>
    <h2>{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
    <p>Amount: {{ $product->pivot->Amount }}</p>
    <p>Price: {{ $product->pivot->Product_Price }}</p>
      <!-- Remove Button-->
      <div class="col-md-1 col-lg-1 col-xl-1 text-end">

      <a href="{{ url('/removefrombasket/'.$product->Product_ID) }}" class="remove-btn" style="color:red">Remove</a>
        </div>
</div>

@endforeach

@endsection
