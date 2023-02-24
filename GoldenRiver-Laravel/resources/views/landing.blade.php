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
                <div class="fashion"><p>Shop Fashion Jewellery</p></div>
                <div class="fine"><p>Shop Fine Jewellery</p></div>
            </div>
        </div>

        <!-- category -->
        <div class="category-container">
            <div id="rings" class="category-item">Rings</div>
            <div id="necklaces" class="category-item">Necklaces</div>
            <div id="earrings" class="category-item">Earrings</div>
            <div id="bracelets" class="category-item">Bracelets</div>
            <div id="exclusive" class="category-item">Exclusive Sets</div>
        </div>
        
        <!-- featured -->
        <div class="featured-container">
            <div id="featured1"class="featured-item">featured item 1</div>
            <div id="featured2"class="featured-item">featured item 2</div>
            <div id="featured3"class="featured-item">featured item 3</div>
            <div id="featured4"class="featured-item">featured item 4</div>
            <div id="featured5"class="featured-item">featured item 5</div>
        </div>

        <!-- Banner -->
        <div class="landing-page-banner-container"><div class="landing-page-banner"></div></div>

        <!-- Sustainability -->
        <div class="sustainability-container">
            <div id="sustainability-img" class="sustainability-content"></div>
            <div id="sustainbility-txt" class="sustainability-content"></div>
        </div>
    </section>
@endsection 