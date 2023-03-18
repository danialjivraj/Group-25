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
                <img loading="lazy" src="{{ asset('/images/bracelets/colourfulPearlSlider.jpg') }}" alt="Colorful Pearl Slider Bracelet">
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
                <img loading="lazy" src="{{ asset('/images/bracelets/goldenSlider.jpg') }}" alt="Golden Slider Bracelet">
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
                <img loading="lazy" src="{{ asset('/images/bracelets/goldenStrap.jpg') }}" alt="Golden Strap Bracelet">
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
                <img loading="lazy" src="{{ asset('/images/bracelets/goldenThickStrap.jpg') }}" alt="Golden Thick Strap Bracelet">
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
                <img loading="lazy" src="{{ asset('/images/bracelets/pearl.jpg') }}" alt="Pearl Bracelet">
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
                <img loading="lazy" src="{{ asset('/images/bracelets/goldSwarovskiBangle.jpg') }}" alt="Gold Swarovski Bangle">
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
                <img loading="lazy" src="{{ asset('/images/bracelets/silverSpraklingPolished.jpg') }}" alt="Silver Sparkling Polished Bracelet">
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
                <img loading="lazy" src="{{ asset('/images/bracelets/sparklingHeartPendant.jpg') }}" alt="Sparkling Heart Pendant Bracelet">
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

<!--  -->
<div class="product-container">
    <div class="product-box">
        <a href="#">
            <div class="product-image">
                <img loading="lazy" src="{{ asset('/images/exclusiveSets/evergreenStonework.jpg') }}" alt="Evergreen Stonework Set">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Evergreen Stonework Set</h3>
        <p>£80.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>

    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/exclusiveSets/pinkClusterSet.jpg') }}" alt="Pink Cluster Set">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Pink Cluster Set</h3>
        <p>£68.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/exclusiveSets/purpleRibbon.jpg') }}" alt="Purple Ribbon Set">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Purple Ribbon Set</h3>
        <p>£68.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/exclusiveSets/exclusiveDiamondEarringAndNecklace.jpg') }}" alt="Diamond Earring & Necklace Set">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Diamond Earring & Necklace Set</h3>
        <p>£120.00</p>
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
                <img loading="lazy" src="{{ asset('/images/exclusiveSets/solitaireRounded.jpg') }}" alt="Solitaire Rounded Set">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Solitaire Rounded Set</h3>
        <p>£79.00</p>
        <div class="shop-button">
            <a class="link" href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/exclusiveSets/solitaireSquared.jpg') }}" alt="Solitaire Squared Set">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Solitaire Squared Set</h3>
        <p>£79.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/exclusiveSets/swanVermeilComplete.jpg') }}" alt="Swan Vermeil Complete Set">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Swan Vermeil Complete Set</h3>
        <p>£99.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/exclusiveSets/swarovskiBellaSet.jpg') }}" alt="Swarovski Bella Rounded Cut Set">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Swarovski Bella Rounded Cut Set</h3>
        <p>£90.00</p>
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
                <img loading="lazy" src="{{ asset('/images/earrings/goldenSmallHoopClipEarrings.jpg') }}" alt="Golden Small Hoop Clip Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/ovalStud.jpg') }}" alt="Oval Stud Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/intricateDangly.jpg') }}" alt="Intricate Dangly Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/silverAndBlueStud.jpg') }}" alt="Silver and Blue Stud Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/silverStudEarings.jpg') }}" alt="Silver Stud Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/snowflakeStuds.jpg') }}" alt="Snowflake Studs">
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
                <img loading="lazy" src="{{ asset('/images/earrings/sparklingCrystalDrop.jpg') }}" alt="Sparkling Crystal Drop Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/stirlingSilverLeafHoop.jpg') }}" alt="Stirling Silver Leaf Hoop Earrings">
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
<!--  -->
<div class="product-container">
    <div class="product-box">
        <a href="#">
            <div class="product-image">
                <img loading="lazy" src="{{ asset('/images/rings/doubleHaloGold.jpg') }}" alt="Double Halo Gold Ring">
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
                <img loading="lazy" src="{{ asset('/images/rings/eternityGoldPlated.jpg') }}" alt="Eternity Gold Plated Ring">
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
                <img loading="lazy" src="{{ asset('/images/rings/goldAndClearFlower.jpg') }}" alt="Gold and Clear Flower Ring">
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
                <img loading="lazy" src="{{ asset('/images/rings/goldPlatedVintage.jpg') }}" alt="Gold Plated Vintage Ring">
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
                <img loading="lazy" src="{{ asset('/images/rings/parisRustedGold.jpg') }}" alt="Paris Rusted Gold Ring">
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
                <img loading="lazy" src="{{ asset('/images/rings/pinkAndBlueLargeSquare.jpg') }}" alt="Pink and Blue Large Square Ring">
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
                <img loading="lazy" src="{{ asset('/images/rings/radiantGoldenTripleSquare.jpg') }}" alt="Radiant Golden Triple Square Ring">
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
                <img loading="lazy" src="{{ asset('/images/rings/silverSprakle.jpg') }}" alt="Silver Sparkle Ring">
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
<!--  -->
<div class="product-container">
    <div class="product-box">
        <a href="#">
            <div class="product-image">
                <img loading="lazy" src="{{ asset('/images/necklaces/goldAndSilverIntricatePearlDrop.jpg') }}" alt="Gold&Silver Intricate Pearl Drop Necklace">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Gold&Silver Intricate Pearl Necklace</h3>
        <p>£45.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>

    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/necklaces/goldenChainNecklace.jpg') }}" alt="Eternity Gold Plated Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Golden chain necklace</h3>
        <p>£35.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/necklaces/whiteAndBlueCrystal.jpg') }}" alt="White and Blue Crystal Necklace">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>White and Blue Crystal Necklace</h3>
        <p>£25.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>
    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/necklaces/silverAndGoldArrow.jpg') }}" alt="Gold Plated Vintage Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Silver and gold arrow necklace</h3>
        <p>£38.00</p>
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
                <img loading="lazy" src="{{ asset('/images/necklaces/goldLock.jpg') }}" alt="Paris Rusted Gold Ring">
            </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Gold pendant necklace</h3>
        <p>£38.00</p>
        <div class="shop-button">
            <a class="link" href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/necklaces/roseGoldChain.jpg') }}" alt="Pink and Blue Large Square Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Rose gold chain necklace</h3>
        <p>£35.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/necklaces/silverPealDropPendant.jpg') }}" alt="Radiant Golden Triple Square Ring">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Silver peal drop pendant necklace</h3>
        <p>£45.00</p>
        <div class="shop-button">
            <a href="#">SHOP</a>
        </div>
    </div>

    <div class="product-box">
        <div class="product-image">
            <a href="#">
                <img loading="lazy" src="{{ asset('/images/necklaces/whiteAndBluePearl.jpg') }}" alt="Purple Stone Flower Necklace">
        </div>
        </a>
        <div class="smallSpace"></div>
        <h3>Purple Stone Flower Necklace</h3>
        <p>£25.00</p>
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
                <img loading="lazy" src="{{ asset('/images/earrings/goldenSmallHoopClipEarrings.jpg') }}" alt="Golden Small Hoop Clip Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/ovalStud.jpg') }}" alt="Oval Stud Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/intricateDangly.jpg') }}" alt="Intricate Dangly Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/silverAndBlueStud.jpg') }}" alt="Silver and Blue Stud Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/silverStudEarings.jpg') }}" alt="Silver Stud Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/snowflakeStuds.jpg') }}" alt="Snowflake Studs">
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
                <img loading="lazy" src="{{ asset('/images/earrings/sparklingCrystalDrop.jpg') }}" alt="Sparkling Crystal Drop Earrings">
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
                <img loading="lazy" src="{{ asset('/images/earrings/stirlingSilverLeafHoop.jpg') }}" alt="Stirling Silver Leaf Hoop Earrings">
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