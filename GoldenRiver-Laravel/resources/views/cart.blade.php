@extends('partials.nav')

@section('title')
<title>GoldenRiver | Cart</title>
@endsection('title')

@section('css')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')
@if ($products !== null && $products->count() > 0)

@if(session()->has('rmvcartmsg'))
    <div class="alert alert-success" role="alert" id="go-to-basket">
        {{session()->get('rmvcartmsg')}}
    </div>
    @endif

    @if(session()->has('cartstockmsg'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('cartstockmsg') }}
        <script>
            setTimeout(function(){
                location.reload();
            }, 3000); // Reload page after 3 seconds (3000 milliseconds)
        </script>
    </div>
@endif

<!-- <form method="post" action="{{ url('checkout') }}">
     @csrf
     <div> -->
     <!-- <label for="Phone_Number">Phone_Number</label>
    <input type="text" name="Phone_Number" id="Phone_Number" required>

    <label for="expiryDate">Street</label>
    <input type="text" name="Street" id="Street" required>
    <label for="expiryDate">City</label>
    <input type="text" name="City" id="City" required>
    <label for="expiryDate">County</label>
    <input type="text" name="County" id="County" required>
    <label for="expiryDate">Country</label>
    <input type="text" name="Country" id="Country" required>
    <label for="expiryDate">Post Code</label>
    <input type="text" name="Post_Code" id="Post_Code" required> -->

<!--
<hr>
<h1>Total: £{{ $order->Order_Total_Price }}</h1>
         <button type="submit">Order Now</button>
     </div>
</form>
 -->


<div class="container">
<h1>Shopping Cart</h1><br></br>

    <div class="row">
        <div class="col-md-9">

            <div class="ibox">
                <div class="ibox-title">
                    <!--retrieve database info fot no. of items in cart-->
                    <span class="pull-right">(<strong>...</strong>) items</span>
                    <h5>Items in your cart</h5>
                </div>
                @foreach($products as $product)
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <tbody>
                            <tr>
                                <!-- Productr Img here -->
                                <td width="90">
                                <!-- <div class="cart-product-imitation"> -->

                                   <img src="/images/allProductImages/{{$product->Product_ID}}.jpg" alt="productImage" width="130" height="180" >
                                   <!--</div> -->
                                </td>
                                <td class="desc">
                                    <h3>
                                        <!-- Item Name -->
                                    <a class="text-navy">{{ $product->Product_Name }}</a>
                                    </h3>
                                    <dl class="small m-b-none">
                                        <!--retrieve database info for product description-->
                                        <dt>Description: {{ $product->Description }}</dt>
                                        <!--retrieve database info for product Quantity-->
                                        <dd>Quantity: x{{ $product->pivot->Amount }}</dd>
                                    </dl>

                                    <div class="m-t-sm">
                                        <!-- allow item deletion -->
                                        <a href="{{ url('/removefrombasket/'.$product->Product_ID) }}" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                    </div>
                                </td>
                                <!-- Product Price -->
                                <td><h4>£{{ number_format($product->Product_Price, 2) }}</h4></td>
                            </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                </div>

                <div class="ibox-content">
                    <button class="cart__btnwhite"><i class="fa fa-arrow-left"></i> Continue shopping</button>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Cart Summary</h5>
                </div>
                <div class="ibox-content">
                    <span>Total</span>
                    <!-- add the subtotal here -->
                    <h2 class="font-bold">£{{ $order->Order_Total_Price }}</h2>

                    <hr>
                    <span class="text-muted__small">*Currently shipping in the UK only.</span><br></br>
                    <form method="post" action="{{ url('checkout') }}">
                        @csrf
                        <div class="m-t-sm">
                            <label for="Phone_Number">Phone Number</label>
                            <input type="text" name="Phone_Number" id="Phone_Number" value = "{{ session()->get('user.Phone_Number') == '-' ? '' : old('Phone_Number', session()->get('user.Phone_Number')) }}" required>
                            @error('Phone_Number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="expiryDate">House No & Street</label>
                            <input type="text" name="Street" id="Street" value="{{ $address->Street == 'pending' ? '' : old('Street', $address->Street) }}" required>
                            @error('Street')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="expiryDate">City</label>
                            <input type="text" name="City" id="City" value="{{ $address->City == 'pending' ? '' : old('City', $address->City) }}" required>
                            @error('City')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="expiryDate">County</label>
                            <input type="text" name="County" id="County" value="{{ $address->County == 'pending' ? '' : old('County', $address->County) }}" required>
                            @error('County')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="expiryDate">Country</label>
                            <input type="text" name="Country" id="Country" value="{{ $address->Country == 'pending' ? '' : old('Country', $address->Country) }}" required>
                            @error('Country')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="expiryDate">Post Code</label>
                            <input type="text" name="Post_Code" id="Post_Code" value="{{ $address->ZIP == 'pending' ? '' : old('Post_Code', $address->ZIP) }}" required>
                            @error('Post_Code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror <br><br>
                            <div class="btn-group">
                                <button class="checkout__button" type= "submit"> Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @else
<h1>Basket Empty!</h1>
@endif

@endsection
