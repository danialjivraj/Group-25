@extends('partials.nav')

@section('title')
<title>GoldenRiver | Cart</title>
@endsection('title')

@section('css')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('body')

<h1>Order Summary</h1><br></br>

    <div class="row">
        <div class="col-md-9">

            <div class="ibox">
                <div class="ibox-title">
                    <!--retrieve database info fot no. of items in cart-->
                    <span class="pull-right">(<strong>...</strong>) items</span>
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

                                   <img src="/images/allProductImages/{{$orderItem->product->Product_ID}}.jpg" alt="productImage" width="130" height="180" >
                                   <!--</div> -->
                                </td>
                                <td class="desc">
                                    <h3>
                                        <!-- Item Name -->
                                    <a class="text-navy">{{ $orderItem->product->Product_Name }}</a>
                                    </h3>
                                    <dl class="small m-b-none">
                                        <!--retrieve database info for product description-->
                                        <dt>Description: {{ $orderItem->product->Description }}</dt>
                                        <!--retrieve database info for product Quantity-->
                                        <dd>Quantity: x{{ $orderItem->Amount }}</dd>
                                    </dl>
                                </td>
                                <!-- Product Price -->
                                <td><h4>£{{ $orderItem->Price }}</h4></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Order Summary</h5>
                </div>
                <div class="ibox-content">
                    <span>Total</span>
                    <!-- add the subtotal here -->
                    <h2 class="font-bold">£{{ $order->Order_Total_Price }}</h2>
                    <p>Order Reference: {{ $order->Order_ID }}</p>
                    <p>Order Status: {{ $order->Order_Status }}</p>
                    <p>Order Date: {{ $order->created_at->format('Y-m-d'); }}</p>
                    <p>Order Time: {{ $order->created_at->format('H:i'); }}</p>
                </div>
@endsection
