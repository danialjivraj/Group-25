@extends('partials.nav')

@section('css')
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript" src="js/components/landing.js"></script>
@endsection

@section('body')
<section class="main-viewport">
    <!-- landing images -->
    <div class="viewport-container">
        <div class="main">
            <a href="/product" id="main-button">View All Products</a>
        </div>
        <!-- <a href="/product" class="main"><div id="main-text">View All Products</div></a> -->
        <div class="viewport-subcontainer">
            <div class="diamond"><a href="/product">Shop Diamond Jewellery</a></div>
            <div class="gold"><a href="/product">Shop Gold Jewellery</a></div>
        </div>
    </div>

    <!-- category -->
    <div class="category-container">
    <div class="category-track" data-mouse-down-at="0" data-prev-percentage="0">
        <div class="category-item">
            <img class="category-image" src="../images/allProductImages/34.jpg" draggable="false">
            <a href="/product?filter_by_category=8">Rings</a>
        </div>
        <div class="category-item">
            <img class="category-image" src="../images/allProductImages/4.jpg" draggable="false">
            <a href="/product?filter_by_category=6">Necklaces</a>
        </div>
        <div class="category-item">
            <img class="category-image" src="../images/allProductImages/16.jpg" draggable="false">
            <a href="/product?filter_by_category=5">Earrings</a>
        </div>
        <div class="category-item">
            <img class="category-image" src="../images/allProductImages/22.jpg" draggable="false">
            <a href="/product?filter_by_category=7">Bracelets</a>
        </div>
        <div class="category-item">
            <img class="category-image" src="../images/allProductImages/38.jpg" draggable="false">
            <a href="/product?filter_by_category=9">Exclusive Sets</a>
        </div>
    </div>
    </div>

    <!-- Featured -->
    <div class="featured-container">
    <div class="featured-track" data-mouse-down-at="0" data-prev-percentage="0">
        <div class="featured-item">
            <img class="featured-image" src="../images/allProductImages/39.jpg" draggable="false">
            <a href="/product/39">Solitaire Squared Set</a>
        </div>
        <div class="featured-item">
            <img class="featured-image" src="../images/allProductImages/43.jpg" draggable="false">
            <a href="/product/43">Evergreen Stonework Set</a>
        </div>
        <div class="featured-item">
            <img class="featured-image" src="../images/allProductImages/22.jpg" draggable="false">
            <a href="/product/22">Pearl Bracelet</a>
        </div>
        <div class="featured-item">
            <img class="featured-image" src="../images/allProductImages/23.jpg" draggable="false">
            <a href="/product/23">Golden Slider Bracelet</a>
        </div>
        <div class="featured-item">
            <img class="featured-image" src="../images/allProductImages/6.jpg" draggable="false">
            <a href="/product/6">White and Blue Crystal Necklace</a>
        </div>
    </div>
    </div>

        <!-- Sustainability -->
        <div class="sustainability-container">
            <div id="sustainability-img" class="sustainability-content"></div>
            <div id="sustainbility-txt" class="sustainability-content">We are committed to operating in a sustainable and ethical manner. We strive to minimize our impact on the environment by using eco-friendly materials and packaging, and reducing waste throughout our production process. Additionally, we prioritize ethical practices by sourcing materials from responsible suppliers who adhere to fair labor practices and do not engage in environmentally harmful practices. </div>
        </div>
    </section>
@endsection 