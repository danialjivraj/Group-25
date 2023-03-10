@extends('partials.nav')

@section('title')
<title>GoldenRiver | Cart</title>
@endsection('title')

@section('css')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')
@if ($order->products !== null && $order->products->count() > 0)

@if(session()->has('rmvcartmsg'))
    <div class="alert alert-success" role="alert" id="go-to-basket">
        {{session()->get('rmvcartmsg')}}
    </div>
    @endif
    
@foreach($order->products as $product)
<div>
    <img src="/images/allProductImages/{{$product->Product_ID}}.jpg" alt="productImage" width="130" height="180" >
    <h2>{{ $product->Product_Name }}</h2>
    <p>{{ $product->Description }}</p>
    <p>Quantity: {{ $product->pivot->Amount }}</p>
    <p>Price: £{{ number_format($product->Product_Price, 2) }}</p>
      <!-- Remove Button-->
      <div class="col-md-1 col-lg-1 col-xl-1 text-end">

      <a href="{{ url('/removefrombasket/'.$product->Product_ID) }}" class="remove-btn" style="color:red">Remove</a>
        </div>
</div> <br><br>

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


<hr>
<h1>Total: £{{ $order->Order_Total_Price}}</h1>
         <button type="submit">Order Now</button>
     </div>
</form>

@else
<h1>Basket Empty!</h1>
@endif
@endsection
