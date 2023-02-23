@extends('partials.nav')

@section('title')
<title>GoldenRiver | Bracelets</title>
@endsection('title')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop.css')}}">



@section('body')
<h1 class="categoryTitle">BRACELETS</h1>
<br><br>
<!--  -->
<div class="product-container">
    <div class="product-box">
        <a href="#">
            <div class="product-image">
                <img src="{{ asset('/images/bracelets/colourfulPearlSlider.jpg') }}" alt="Colorful Pearl Slider Bracelet">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Colorful Pearl Slider Bracelet</h3>
        <p>£65.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>

    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/bracelets/goldenSlider.jpg') }}" alt="Golden Slider Bracelet">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Golden Slider Bracelet</h3>
        <p>£40.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/bracelets/goldenStrap.jpg') }}" alt="Golden Strap Bracelet">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Golden Strap Bracelet</h3>
        <p>£45.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/bracelets/goldenThickStrap.jpg') }}" alt="Golden Thick Strap Bracelet">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Golden Thick Strap Bracelet</h3>
        <p>£55.00</p>
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
                <img src="{{ asset('/images/bracelets/pearl.jpg') }}" alt="Pearl Bracelet">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Pearl Bracelet</h3>
        <p>£68.00</p>
        <div class="shop-button">
            <a class="link" href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/bracelets/goldSwarovskiBangle.jpg') }}" alt="Gold Swarovski Bangle">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Gold Swarovski Bangle</h3>
        <p>£75.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/bracelets/silverSpraklingPolished.jpg') }}" alt="Silver Sparkling Polished Bracelet">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Silver Sparkling Polished Bracelet</h3>
        <p>£85.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/bracelets/sparklingHeartPendant.jpg') }}" alt="Sparkling Heart Pendant Bracelet">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Sparkling Heart Pendant Bracelet</h3>
        <p>£55.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
</div>
<!--  -->
@endsection