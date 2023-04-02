@extends('partials.nav')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<title>GoldenRiver | Order Summary</title>
@endsection

@section('body')

<div class="container">
    <br>
    <h1 class="basketheader">Order Summary</h1><br></br>

    <div class="row">
        <div class="col-sm-12 col-md-8">

            <div class="ibox">
                <div class="ibox-title">
                    <!--retrieve database info fot no. of items in cart-->

                    <h5>Ordered Items</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <tbody>
                                @foreach($orderItems as $orderItem)
                                <tr>
                                    <!-- Productr Img here -->
                                    <td width="90">
                                        <!-- <div class="cart-product-imitation"> -->

                                        <img src="/images/allProductImages/{{$orderItem->product->Product_ID}}.jpg" alt="productImage" width="130" height="180">
                                        <!--</div> -->
                                    </td>
                                    <td class="desc">
                                        <h3>
                                            <!-- Item Name -->
                                            <a href="{{ url('/product/'.$orderItem->product->Product_ID) }}" class="text-navy">{{ $orderItem->product->Product_Name }}</a>
                                        </h3>
                                        <dl class="small m-b-none">
                                            <!--retrieve database info for product description-->
                                            <dt>Description: {{ $orderItem->product->Description }}</dt>
                                            <!--retrieve database info for product Quantity-->
                                            <dd>Quantity: x{{ $orderItem->Amount }}</dd>
                                            <dd>Individual Price: £{{ $orderItem->Price }}</dd>

                                        </dl>
                                    </td>
                                    <!-- Product Price -->
                                    <td>
                                    <h4>£{{ number_format($orderItem->product->Product_Price * $orderItem->Amount, 2) }}</h4>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Order Summary</h5>
                </div>
                <div class="ibox-content">
                    @if ($order->Order_Total_Price <= 90) <h5>Total with Shipping</h5>
                        <h2 class="font-bold">£{{ number_format($order->Order_Total_Price + $shippingCost, 2) }}</h2>
                        @else
                        <h5>Total with Free Shipping</h5>
                        <h2 class="font-bold">£{{ number_format($order->Order_Total_Price, 2) }}</h2>
                        @endif

                        <p>Order Reference: {{ $order->Order_ID }}</p>
                        <p>Order Status: {{ $order->Order_Status }}</p>
                        <p>Order Date: {{ $order->created_at->format('Y-m-d'); }}</p>
                        <p>Order Time: {{ $order->created_at->format('H:i'); }}</p>
                </div>

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Delivery Address</h5>
                    </div>
                    <div class="ibox-content">
                        <h4>Address:</h4><br>
                        <!-- add the subtotal here -->
                        <p>Phone Number: {{ $user->Phone_Number }}</p>
                        <p>House No. & Street Name: <b>{{ $address->Street }}</b></p>
                        <p>City: {{ $address->City }}</p>
                        <p>County: {{ $address->County }}</p>
                        <p>Country: {{ $address->Country }}</p>
                        <p>Post Code: {{ $address->ZIP }}</p>
                    </div>
                </div>

            </div>
        </div>
        <!--<div class="col-sm-12 col-md-4">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Delivery Address</h5>
                    </div>
                    <div class="ibox-content">
                        <span>Address</span>
                        
                        <h2 class="font-bold">House No. & Street Name: {{ $address->Street }}</h2>
                        <p>City: {{ $address->City }}</p>
                        <p>County: {{ $address->County }}</p>
                        <p>Country: {{ $address->Country }}</p>
                        <p>Post Code: {{ $address->ZIP }}</p>
                    </div>
                </div>
            </div>-->
    </div>
</div>
</div>
@endsection