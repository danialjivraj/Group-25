@extends('partials.nav')

@section('title')
<title> Golden River | Item</title>
@endsection('title')
@section('css')

<link rel="stylesheet" href="{{asset('css/item.css')}}">
@endsection


@section('body')
@if(session()->has('addcartmsg'))
    <div class="alert alert-success" role="alert" id="go-to-basket">
        {{session()->get('addcartmsg')}} <a href="/cart" class="alert-link">Go to Basket?</a>.
    </div>
@endif

<div class="item-container">
    <div class="item-image">
        <img src="/images/allProductImages/{{$item->Product_ID}}.jpg" alt="productImage">
    </div>
    <div class="item-details">
        <div class="item-title">
            <h2>{{ $item->Product_Name }}</h2>
        </div>
        <div class="item-stock-count">
            @if($item->Amount <= 0)
                <h5>Sorry, this Item is out of stock</h5>
            @else
                <h5>In stock</h5>
                @if($item->Amount < 11)
                    <p>only {{ $item->Amount }} available, buy it quick!</p>
                @endif
            @endif
        </div>
        <div class="product-description">
            <h4>Product Description:</h4>
            <p>{{ $item->Description }}</p>
        </div>
        <div class="product-category">
            <h4>Product Category:</h4>
            @if($item->Category_ID == 6 )
                <p>Necklace</p>
            @endif
            @if($item->Category_ID == 5 )
                <p>Earring</p>
            @endif
            @if($item->Category_ID == 7 )
                <p>Bracelet</p>
            @endif
            @if($item->Category_ID == 8 )
                <p>Ring</p>
            @endif
            @if($item->Category_ID == 9 )
                <p>Set</p>
            @endif
        </div>
        <div class="price">
            <h4>Price:</h4>
            <p>£{{ $item->Product_Price }}</p>
        </div>
        <div class="select-quantity">
            <form action= "/cart" method = "post" > <!-- make it <form action= "/cart" method = "post"> later -->
                @csrf
                <h5>Select Quantity:</h5>
                <select class="form-control" name="qty" id="quantity-box">
                    @for ($i = 1; $i <= $item->Amount && $i <= 3; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <br><br>
                <input type="hidden" name="Product_ID" value="{{$item->Product_ID}}">
                <button class="submit-btn">Add to basket</button>
            </form>
        </div>
    </div>
</div>

@endsection
