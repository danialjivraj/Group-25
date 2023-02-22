@extends('partials.nav')


<link rel="stylesheet" href="css/shop copy.css">
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

<div class="product-row">
    @foreach($products as $index => $prod)
        @if($index % 4 == 0 && $index > 0)
            </div><div class="product-row">
        @endif
        <div class="product-container">
            <div class="product-box">
                <a href="/product/{{ $prod->Product_ID }}">
                    <div class="product-image">
                        <img src="{{ asset('images/' . $prod->category_name . '/' . $prod->image_name) }}" alt="productImage" height="350px" width="330px">
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
    @endforeach
</div>
@endsection
