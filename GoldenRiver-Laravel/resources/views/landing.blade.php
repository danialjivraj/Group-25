@extends('partials.nav')

@section('css')
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
            <!-- category product pages not completed yet -->
            <a href="/product?filter_by_category=8" class="category-item"><div id="rings"></div><p class="category-text">Rings</p></a>
            <a href="/product?filter_by_category=6" class="category-item"><div id="necklaces"></div><p class="category-text">Necklaces</p></a>
            <a href="/product?filter_by_category=5" class="category-item"><div id="earrings"></div><p class="category-text">Earrings</p></a>
            <a href="/product?filter_by_category=7" class="category-item"><div id="bracelets"></div><p class="category-text">Bracelets</p></a>
            <a href="/product?filter_by_category=9" class="category-item"><div id="exclusiveSets"></div><p class="category-text">Exclusive Sets</p></a>
        </div>
        
        <!-- featured -->
        <div class="featured-container">
            <a href="/product/39" class="featured-item"><div id="featured1"></div><p class="featured-text">Solitaire Squared Set</p></a>
            <a href="/product/43" class="featured-item"><div id="featured2"></div><p class="featured-text">Evergreen Stonework Set</p></a>
            <a href="/product/22" class="featured-item"><div id="featured3"></div><p class="featured-text">Pearl Bracelet</p></a>
            <a href="/product/23" class="featured-item"><div id="featured4"></div><p class="featured-text">Golden Slider Bracelet</p></a>
            <a href="/product/6" class="featured-item"><div id="featured5"></div><p class="featured-text">White and Blue Crystal Necklace</p></a>
        </div>

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