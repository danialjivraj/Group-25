@extends('partials.nav')


@section('title')
<title> Golden River | Item</title>
@endsection('title')


@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')
@if(session()->has('addcartmsg'))
<div class="alert alert-success" role="alert" id="go-to-basket">
    {{session()->get('addcartmsg')}} <a href="/cart" class="alert-link">Go to Basket?</a>.
</div>
@endif

@if (session('loginToAddCart'))
<div class="alert alert-danger">
    {{ session('loginToAddCart') }}
</div>
@endif

<body>
    <section class="items">
        <div class="container">
            <h1 class="itemheader">{{ $item->Product_Name }}</h1>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <img class="itemimage" src="/images/allProductImages/{{$item->Product_ID}}.jpg" alt="productImage" height="350px" width="330px">
                </div>
                <div class="col-sm-12 col-md-6">
                    <div>
                        <br>
                        <h4 class="itemsubheading">Product Description:</h4>
                        <hr>
                        <p>{{ $item->Description }} </p>
                    </div><br><br>
                    <div>
                        <h4 class="itemsubheading">Product Category:</h4>
                        <hr>
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
                    </div><br><br>
                    <div>
                        <h4 class="itemsubheading">Price:</h4>
                        <hr>
                        <p>£{{ $item->Product_Price }} </p>
                    </div><br><br>
                    <div class="item-stock-count" id="item-row">
                        <hr>
                        @if($item->Amount <= 0) <h5>Sorry, this Item is out of stock</h5>
                            @else
                            <h5>In stock</h5>
                            @if($item->Amount < 11) <p>only {{ $item->Amount }} available, buy it quick!</p>
                                @endif
                    </div><br><br>
                    <div class="select-quantity">
                        <hr>
                        <form action="/cart" method="post"><!-- make it <form action= "/cart" method = "post"> later -->
                            @csrf
                            <h5>Select Quantity:</h5>
                            <select class="form-control" name="qty" id="quantity-box">
                                @for ($i = 1; $i <= $item->Amount && $i <= 3; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                            </select><br><br>
                            <input type="hidden" name="Product_ID" value="{{$item->Product_ID}}">
                            <button class="submit-btn">Add to basket</button>
                        </form>
                        @endif
                    </div><br><br>
                </div>
            </div>
        </div>
    </section>
</body>




@endsection