@extends('partials.nav')

@section('title')
<title>GoldenRiver | Shop</title>
@endsection('title')

@section('css')
<link rel="stylesheet" href="{{asset('css/shop copy.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.css">
@endsection


@section('body')
<div class="alertLogIn">
    @if(session()->has('loginSuccessMsg'))
    <div class="alert alert-success" role="alert" id="go-to-basket">
        {{session()->get('loginSuccessMsg')}}
        <h4>Welcome, {{ Auth::user()->name }}!</h4>
    </div>
    @endif
</div>

<hr><!--VERSION 2: bootstrap used to make responsive-->
<!-- search box -->
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2"><!--sec 1-->

            <div class="search-container">
                <form class="search-form" type="get" action="{{ url('/product') }}">
                    @csrf
                    <div class="search-box">
                        <input class="search-input" type="text" name="search" id="search" placeholder="Search..." value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                        <button class="search-submit" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>

            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-5"><!--sec 2-->
            <div class="filtersection2">
                <a href="{{ URL::current().'?sort=all&per_page=42069' }}" class="filter-option">All</a>
                <a href="{{ URL::current()."?sort=price_ascending" }}" class="filter-option">Price - Ascending</a>
                <a href="{{ URL::current()."?sort=price_descending" }}" class="filter-option">Price - Descending</a>
                <a href="{{ URL::current()."?sort=prod_cat" }}" class="filter-option">Category</a>
                <a href="{{ URL::current()."?sort=popularity" }}" class="filter-option">Popularity</a>
            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-3"><!--sec 3-->
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

    </div>
</div>
<hr>


<div class="product-row">
    @if(count($products) == 0)
    <h1>No Results Found</h1>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @else

    @foreach($products as $index => $prod)
    <div class="product-container">
        @if(($index+1) % 4 == 0)
        <div class="product-box">
            <a href="/product/{{ $prod->Product_ID }}">
                <div class="product-image">
                    <img loading="lazy" src="/images/allProductImages/{{$prod->Product_ID}}.jpg">
                </div>
            </a>
            <div class="smallSpace"></div>
            <h3><span class="productname">{{ $prod->Product_Name }}</span></h3>
            <div class="productPrice">
                <p>£{{ $prod->Product_Price }}</p>
            </div>
            <div class="shop-button">
                <a href="/product/{{ $prod->Product_ID }}">SHOP</a>
            </div>
        </div>
    </div>

    <div class="product-row">
        @else
        <div class="product-box">
            <a href="/product/{{ $prod->Product_ID }}">
                <div class="product-image">
                    <img loading="lazy" src="/images/allProductImages/{{$prod->Product_ID}}.jpg">
                </div>
            </a>
            <div class="smallSpace"></div>
            <h3><span class="productname">{{ $prod->Product_Name }}</span></h3>
            <div class="productPrice">
                <p>£{{ $prod->Product_Price }}</p>
            </div>
            <div class="shop-button">
                <a href="/product/{{ $prod->Product_ID }}">SHOP</a>
            </div>
        </div>
        @endif
    </div>
    @endforeach
    @endif
</div>

<div class="pagination-container">
    {{ $products->links("pagination::bootstrap-4") }}
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
<script src="{{ asset('js/filter.js') }}"></script>

@endsection