@extends('partials.nav')

@section('title')
<title>GoldenRiver | Bracelets</title>
@endsection('title')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop.css')}}">

@section('body')
<h1 class="categoryTitle">EARRINGS</h1>
<br><br>
<!--  -->
<div class="product-container">
    <div class="product-box">
        <a href="#">
            <div class="product-image">
                <img src="{{ asset('/images/earrings/goldenSmallHoopClipEarrings.jpg') }}" alt="Golden Small Hoop Clip Earrings">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Golden Small Hoop Clip Earrings</h3>
        <p>£45.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>

    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/earrings/ovalStud.jpg') }}" alt="Oval Stud Earrings">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Oval Stud Earrings</h3>
        <p>£80.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/earrings/intricateDangly.jpg') }}" alt="Intricate Dangly Earrings">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Intricate Dangly Earrings</h3>
        <p>£63.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/earrings/silverAndBlueStud.jpg') }}" alt="Silver and Blue Stud Earrings">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Silver and Blue Stud Earrings</h3>
        <p>£65.00</p>
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
                <img src="{{ asset('/images/earrings/silverStudEarings.jpg') }}" alt="Silver Stud Earrings">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Silver Stud Earrings</h3>
        <p>£65.00</p>
        <div class="shop-button">
            <a class="link" href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/earrings/snowflakeStuds.jpg') }}" alt="Snowflake Studs">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Snowflake Studs</h3>
        <p>£63.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/earrings/sparklingCrystalDrop.jpg') }}" alt="Sparkling Crystal Drop Earrings">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Sparkling Crystal Drop Earrings</h3>
        <p>£78.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img src="{{ asset('/images/earrings/stirlingSilverLeafHoop.jpg') }}" alt="Stirling Silver Leaf Hoop Earrings">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Stirling Silver Leaf Hoop Earrings</h3>
        <p>£95.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
</div>
<!--  -->
@endsection