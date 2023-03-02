@extends('partials.nav')

@section('title')
<title>GoldenRiver | Shop</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop copy.css')}}">
@endsection

@section('body')
<!-- search box -->
<div class="search-container">
    <form class="search-form" type="get" action="{{ url('/search') }}">
        @csrf
        <div class="search-box">
            <input class="search-input" type="text" name="search" id="search" name="search" placeholder="Search...">
            <button class="search-submit" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
<hr>
<!-- search box -->

<div class="col-md-12 mb-3">
    <span class="font-weight-bold" class = "sort-font">Sort By :</span>
    <a href="{{ URL::current() }}" class = "sort-font">All</a>
    <a href="{{ URL::current()."?sort=price_ascending" }}" class = "sort-font">Price - Ascending</a>
    <a href="{{ URL::current()."?sort=price_descending" }}" class = "sort-font">Price - Descending</a>
    <a href="{{ URL::current()."?sort=prod_cat" }}" class = "sort-font">Category</a>
    <a href="{{ URL::current()."?sort=popularity" }}" class = "sort-font">Popularity</a>
</div>

<hr>

<div>
    <form method="get" action="{{ 'product' }}">
        <h2>Filter By:<h2>

        <h3>Product Category</h3>
            <select name="filter_by_category">
                <!-- <option value="">Select</option> -->
                <option value="5">Earrings</option>
                <option value="6">Necklace</option>
                <option value="7">Bracelets</option>
                <option value="8">Rings</option>
                <option value="9">Exclusive Sets</option>
            </select>
            <!-- <span>Earrings<input type="checkbox" name="filter_by_category" value="5" ></span>
            <span>Necklace<input type="checkbox" name="filter_by_category" value="6" ></span>
            <span>Bracelets<input type="checkbox" name="filter_by_category" value="7" ></span>
            <span>Rings<input type="checkbox" name="filter_by_category" value="8" ></span>
            <span>Exclusive Sets<input type="checkbox" name="filter_by_category" value="9" ></span> -->

        <h3>Stock</h3>
            <span>In Stock<input type="checkbox" name="filter_by_stock" value="1" ></span><br><br>

        <button type="submit">Filter</button>
        <a href = "/product">Clear Filters</a>

    </form>
</div>
<hr>
<div class="container">
    <div class="product-row">
        @foreach($products as $index => $prod)
        <div class="product-container">
            @if(($index+1) % 4 == 0)
            <div class="product-box">
                <a href="/product/{{ $prod->Product_ID }}">
                    <div class="product-image">
                        <img src="/images/allProductImages/{{$prod->Product_ID}}.jpg" alt="productImage" >
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