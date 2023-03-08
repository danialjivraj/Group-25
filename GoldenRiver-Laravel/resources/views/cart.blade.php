@extends('partials.nav')

@section('title')
<title>GoldenRiver | Cart</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')
@if($products->count() > 0)

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

<form method="post" action="{{ url('checkout') }}">
     @csrf
     <div>
     <!-- <label for="Phone_Number">Phone_Number</label>
    <input type="text" name="Phone_Number" id="Phone_Number" required>

    <label for="expiryDate">Street</label>
    <input type="text" name="Street" id="Street" required>
    <label for="expiryDate">City</label>
    <input type="text" name="City" id="City" required>
    <label for="expiryDate">County</label>
    <input type="text" name="County" id="County" required>
    <label for="expiryDate">Country</label>
    <input type="text" name="Country" id="Country" required>
    <label for="expiryDate">Post Code</label>
    <input type="text" name="Post_Code" id="Post_Code" required> -->

         <h1>Subtotal: "Subtotal GOES HERE"</h1>
         <button type="submit">Order Now</button>
     </div>
</form>

@else
<h1>Basket Empty!</h1>
@endif
@endsection
