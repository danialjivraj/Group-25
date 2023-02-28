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
            <!-- check href to database -->
            <div id="rings" class="category-item" href="/product/rings">Rings</div>
            <div id="necklaces" class="category-item" href="/product/necklace">Necklaces</div>
            <div id="earrings" class="category-item" href="/product/earrings">Earrings</div>
            <div id="bracelets" class="category-item" href="/product/bracelet">Bracelets</div>
            <div id="exclusiveSets" class="category-item" href="/product/exclusive sets">Exclusive Sets</div>
        </div>
        
        <!-- featured -->
        <div class="featured-container">
            <div id="featured1"class="featured-item">Solitaire Squared Set</div>
            <div id="featured2"class="featured-item">Evergreen Stonework Set</div>
            <div id="featured3"class="featured-item">Pearl Bracelet</div>
            <div id="featured4"class="featured-item">Golden Slider Bracelet</div>
            <div id="featured5"class="featured-item">White and Blue Crystal Necklace</div>
        </div>

        <!-- Banner -->
        <div class="landing-page-banner-container"><div class="landing-page-banner"></div></div>

        <!-- Sustainability -->
        <div class="sustainability-container">
            <div id="sustainability-img" class="sustainability-content"></div>
            <div id="sustainbility-txt" class="sustainability-content">Lorem ipsum dolor sit amet. Qui Quis aliquam a corporis facere ut nihil voluptatibus non dicta eius. Eos consequatur rerum qui dolorem nesciunt ex autem sunt quo provident rerum est molestias nobis et nulla voluptatibus aut voluptas consequatur. Et praesentium rerum ut minima cupiditate eum veritatis deleniti vel autem aspernatur id molestiae quae et dolorem voluptatem et rerum dolor! Cum repudiandae velit At consequatur nostrum aut iste architecto et dolor porro sit aliquid fuga est esse numquam.</div>
        </div>
    </section>
@endsection 