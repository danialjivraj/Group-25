@extends('partials.nav')

@section('css')
    <link rel="stylesheet" href="css/style.css" type="text/css">
@endsection

@section('body')
<section class="main-viewport">
        <!-- landing images -->
        <div class="viewport-container">
            <a href="/product" class="main"><div id="main-text">View All Products</div></a>
            <div class="viewport-subcontainer">
                <div class="diamond"><a href="/product">Shop Diamond Jewellery</a></div>
                <div class="gold"><a href="/product">Shop Gold Jewellery</a></div>
            </div>
        </div>

        <!-- category -->
        <div class="category-container">
            <!-- category product pages not completed yet -->
            <a href="/product?filter_by_category=8" class="category-item"><div id="rings"><p class="category-text">Rings</p></div></a>
            <a href="/product?filter_by_category=6" class="category-item"><div id="necklaces"><p class="category-text">Necklaces</p></div></a>
            <a href="/product?filter_by_category=5" class="category-item"><div id="earrings"><p class="category-text">Earrings</p></div></a>
            <a href="/product?filter_by_category=7" class="category-item"><div id="bracelets"><p class="category-text">Bracelets</p></div></a>
            <a href="/product?filter_by_category=9" class="category-item"><div id="exclusiveSets"><p class="category-text">Exclusive Sets</p></div></a>
        </div>
        
        <!-- featured -->
        <div class="featured-container">
            <a href="/product/39"><div id="featured1"class="featured-item">Solitaire Squared Set</div></a>
            <a href="/product/43"><div id="featured2"class="featured-item">Evergreen Stonework Set</div></a>
            <a href="/product/22"><div id="featured3"class="featured-item">Pearl Bracelet</div></a>
            <a href="/product/23"><div id="featured4"class="featured-item">Golden Slider Bracelet</div></a>
            <a href="/product/6"><div id="featured5"class="featured-item">White and Blue Crystal Necklace</div></a>
        </div>

        <!-- Sustainability -->
        <div class="sustainability-container">
            <a href="/aboutus" class="sustainability-content">
                <div id="sustainability-img"></div>
            </a>
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