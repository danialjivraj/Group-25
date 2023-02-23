@extends('partials.nav')

@section('title')
<title>GoldenRiver | Search Results</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop copy.css')}}">
@endsection

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
<br>

<div class="container">
    <div class="product-row">
    @if(count($product) == 0)
        <h1>No Results Found</h1>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @else
        @foreach($product as $index => $prod)
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
    @endif
    </div>
</div>
@endsection