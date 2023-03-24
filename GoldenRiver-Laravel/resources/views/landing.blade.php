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
    <a href="/product?filter_by_category=8" class="category-item">
      <img class="category-image" src="../images/allProductImages/34.jpg" draggable="false">
      <span class="text-landing">Rings</span>
    </a>
    <a href="/product?filter_by_category=6" class="category-item">
      <img class="category-image" src="../images/allProductImages/4.jpg" draggable="false">
      <span class="text-landing">Necklaces</span>
    </a>
    <a href="/product?filter_by_category=5" class="category-item">
      <img class="category-image" src="../images/allProductImages/16.jpg" draggable="false">
      <span class="text-landing">Earrings</span>
    </a>
    <a href="/product?filter_by_category=7" class="category-item">
      <img class="category-image" src="../images/allProductImages/22.jpg" draggable="false">
      <span class="text-landing">Bracelets</span>
    </a>
    <a href="/product?filter_by_category=9" class="category-item">
      <img class="category-image" src="../images/allProductImages/38.jpg" draggable="false">
      <span class="text-landing">Exclusive Sets</span>
    </a>
  </div>
</div>

<!-- Featured -->
<div class="featured-container">
  <div class="featured-track" data-mouse-down-at="0" data-prev-percentage="0">
    <a href="/product/39" class="featured-item">
      <img class="featured-image" src="../images/allProductImages/39.jpg" draggable="false">
      <span class="text-landing">Solitaire Squared Set</span>
    </a>
    <a href="/product/43" class="featured-item">
      <img class="featured-image" src="../images/allProductImages/43.jpg" draggable="false">
      <span class="text-landing">Evergreen Stonework Set</span>
    </a>
    <a href="/product/22" class="featured-item">
      <img class="featured-image" src="../images/allProductImages/22.jpg" draggable="false">
      <span class="text-landing">Pearl Bracelet</span>
    </a>
    <a href="/product/23" class="featured-item">
      <img class="featured-image" src="../images/allProductImages/23.jpg" draggable="false">
      <span class="text-landing">Golden Slider Bracelet</span>
    </a>
    <a href="/product/6" class="featured-item">
      <img class="featured-image" src="../images/allProductImages/6.jpg" draggable="false">
      <span class="text-landing">White and Blue Crystal Necklace</span>
    </a>
  </div>
</div>


        <!-- Sustainability -->
        <div class="sustainability-container">
            <div id="sustainability-img" class="sustainability-content"></div>
            <div id="sustainbility-txt" class="sustainability-content">We are committed to operating in a sustainable and ethical manner. We strive to minimize our impact on the environment by using eco-friendly materials and packaging, and reducing waste throughout our production process. Additionally, we prioritize ethical practices by sourcing materials from responsible suppliers who adhere to fair labor practices and do not engage in environmentally harmful practices. </div>
        </div>
    </section>
@endsection 