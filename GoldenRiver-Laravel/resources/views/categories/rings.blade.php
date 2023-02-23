@extends('partials.nav')

@section('title')
<title>GoldenRiver | Bracelets</title>
@endsection('title')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop.css')}}">

@section('body')
<h1 class="categoryTitle">RINGS</h1>
<br><br>
<!--  -->
<div class="product-container">
    <div class="product-box">
        <a href="#">
            <div class="product-image">
                <img src="{{ asset('/images/rings/doubleHaloGold.jpg') }}" alt="Double Halo Gold Ring">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Double Halo Gold Ring</h3>
        <p>£55.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>

    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/rings/eternityGoldPlated.jpg') }}" alt="Eternity Gold Plated Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Eternity Gold Plated Ring</h3>
        <p>£65.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/rings/goldAndClearFlower.jpg') }}" alt="Gold and Clear Flower Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Gold and Clear Flower Ring</h3>
        <p>£85.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/rings/goldPlatedVintage.jpg') }}" alt="Gold Plated Vintage Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Gold Plated Vintage Ring</h3>
        <p>£45.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

</div>
<!--  -->

<!--  -->
<div class="product-container">
    <div class="product-box">
        <a href="#">
            <div class="product-image">
                <img src="{{ asset('/images/rings/parisRustedGold.jpg') }}" alt="Paris Rusted Gold Ring">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Paris Rusted Gold Ring</h3>
        <p>£45.00</p>
        <div class="shop-button">
            <a class="link" href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/rings/pinkAndBlueLargeSquare.jpg') }}" alt="Pink and Blue Large Square Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Pink and Blue Large Square Ring</h3>
        <p>£65.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/rings/radiantGoldenTripleSquare.jpg') }}" alt="Radiant Golden Triple Square Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Radiant Golden Triple Square Ring</h3>
        <p>£45.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/rings/silverSprakle.jpg') }}" alt="Silver Sparkle Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Silver Sparkle Ring</h3>
        <p>£45.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
</div>
<!--  -->
@endsection