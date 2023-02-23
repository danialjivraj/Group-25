@extends('partials.nav')

@section('title')
<title>GoldenRiver | Shop</title>
@endsection('title')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop copy.css')}}">
@section('body')
<!-- search box -->
<div>
    <form type="get" action="{{ url('/search') }}">
        @csrf
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" name="search">
        <input type="submit" value="Submit">
    </form>
</div>
<!-- search box -->

<div class="container">
    <div class="product-row">
    @foreach($products as $index => $prod)
        <div class="product-container">
            @if(($index+1) % 4 == 0)
            <div class="product-box">
                <a href="/product/{{ $prod->Product_ID }}">
                    <div class="product-image">
                        <img src="/images/allProductImages/{{$prod->Product_ID}}.jpg" alt="productImage" height="350px" width="330px">
                    </div>
                </a>
                <div class="smallSpace"></div>
                <h3>{{ $prod->Product_Name }}</h3>
                <div class="productPrice">
                    <p>£{{ $prod->Product_Price }}</p>
                </div>
                <div class="shop-button">
                    <a href="#">SHOP</a>
                </div>
            </div>
            </div>
            <div class="product-row">
            @else
            <div class="product-box">
                <a href="/product/{{ $prod->Product_ID }}">
                    <div class="product-image">
                        <img src="/images/allProductImages/{{$prod->Product_ID}}.jpg" alt="productImage" height="350px" width="330px">
                    </div>
                </a>
                <div class="smallSpace"></div>
                <h3>{{ $prod->Product_Name }}</h3>
                <div class="productPrice">
                    <p>£{{ $prod->Product_Price }}</p>
                </div>
                <div class="shop-button">
                    <a href="#">SHOP</a>
                </div>
            </div>
            @endif
        </div>
    @endforeach
    </div>
</div>
@endsection