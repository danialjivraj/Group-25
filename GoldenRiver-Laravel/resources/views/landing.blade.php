@extends('partials.nav')

@section('css')
    <link rel="stylesheet" href="css/style.css" type="text/css">
@endsection

@section('body')
<section class="main-viewport">
        <!-- landing images -->
        <div class="viewport-container">
            <div class="main"><p>View Latest Collection</p></div>
            <div class="viewport-subcontainer">
                <div class="fashion"><a href="/product">Shop Fashion Jewellery</a></div>
                <div class="fine"><a href="/product">Shop Fine Jewellery</a></div>
            </div>
        </div>

        <!-- category -->
        <div class="category-container">
            <!-- category product pages not completed yet -->
            <a href="/product?filter_by_category=8"><div id="rings" class="category-item">Rings</div></a>
            <a href="/product?filter_by_category=6"><div id="necklaces" class="category-item" href="/product/necklace">Necklaces</div></a>
            <a href="/product?filter_by_category=5"><div id="earrings" class="category-item" href="/product/earrings">Earrings</div></a>
            <a href="/product?filter_by_category=7"><div id="bracelets" class="category-item" href="/product/bracelet">Bracelets</div></a>
            <a href="/product?filter_by_category=9"><div id="exclusiveSets" class="category-item" href="/product/exclusive sets">Exclusive Sets</div></a>
        </div>
        
        <!-- featured -->
        <div class="featured-container">
            <a href="/product/39"><div id="featured1"class="featured-item">Solitaire Squared Set</div></a>
            <a href="/product/43"><div id="featured2"class="featured-item">Evergreen Stonework Set</div></a>
            <a href="/product/22"><div id="featured3"class="featured-item">Pearl Bracelet</div></a>
            <a href="/product/23"><div id="featured4"class="featured-item">Golden Slider Bracelet</div></a>
            <a href="/product/6"><div id="featured5"class="featured-item">White and Blue Crystal Necklace</div></a>
        </div>

        <!-- Banner -->
        <div class="landing-page-banner-container"><div class="landing-page-banner"></div></div>

        <!-- Sustainability -->
        <div class="sustainability-container">
            <div id="sustainability-img" class="sustainability-content"></div>
            <div id="sustainbility-txt" class="sustainability-content">We are committed to operating in a sustainable and ethical manner. We strive to minimize our impact on the environment by using eco-friendly materials and packaging, and reducing waste throughout our production process. Additionally, we prioritize ethical practices by sourcing materials from responsible suppliers who adhere to fair labor practices and do not engage in environmentally harmful practices. </div>
        </div>
    </section>
@endsection 

<!-- 
    To Do: 

1. Update category links to product category pages
2. Update banner for once about page is completed
3. Make page responsive for mobile devices



-->