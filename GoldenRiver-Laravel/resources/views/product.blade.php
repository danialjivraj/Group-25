@extends('partials.nav')

@section('title')
<title>GoldenRiver | Shop</title>
@endsection('title')

@section('css')
<link rel="stylesheet" href="{{asset('css/shop copy.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.css">
@endsection

@section('body')
<hr>
<div class="filter-container">
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
    <a href="{{ URL::current() }}" class="filter-option">All</a>
    <a href="{{ URL::current()."?sort=price_ascending" }}" class="filter-option">Price - Ascending</a>
    <a href="{{ URL::current()."?sort=price_descending" }}" class="filter-option">Price - Descending</a>
    <a href="{{ URL::current()."?sort=prod_cat" }}" class="filter-option">Category</a>
    <a href="{{ URL::current()."?sort=popularity" }}" class="filter-option">Popularity</a>

    <form method="get" action="{{ 'product' }}" class="filter-form">
        <label for="category-select" class="form-label">Category:</label>
        <select name="filter_by_category" id="category-select" class="form-select">
            <option value="5">Earrings</option>
            <option value="6">Necklace</option>
            <option value="7">Bracelets</option>
            <option value="8">Rings</option>
            <option value="9">Exclusive Sets</option>
        </select>
        <label for="stock-checkbox" class="form-label">In Stock:</label>
        <input type="checkbox" id="stock-checkbox" name="filter_by_stock" value="1" class="form-checkbox">

        <button type="submit" class="form-button">Filter</button>
        <a href="/product" class="form-link">Clear Filters</a>
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
                        <img loading="lazy" src="/images/allProductImages/{{$prod->Product_ID}}.jpg" height="350px" width="330px">
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
                        <img loading="lazy" src="/images/allProductImages/{{$prod->Product_ID}}.jpg" height="350px" width="330px">
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
<div class="pagination-container">
    {{ $products->links("pagination::bootstrap-4") }}
</div>
@endsection