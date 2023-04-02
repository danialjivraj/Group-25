@extends('partials.nav')



@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<title>GoldenRiver | Order Details</title>
@endsection


@section('body')
<br><br><br><br>

<table class="show-order-table">
    <thead>
        <tr>
            <th>Items in this order</th>
            <th class="status-label {{ $order->Order_Status == 'Shipped' ? 'shipped-label' : 
                           ($order->Order_Status == 'Delivered' ? 'delivered-label' : 
                            ($order->Order_Status == 'Canceled' ? 'canceled-label' : 'default-label')) }}">
                <div class="order-status">Status: {{ $order->Order_Status }}</div>
            </th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
        $totalItems = 0;
        $totalAmount = 0;
        @endphp
        @if(isset($orderItems) && $orderItems->count() > 0)
        @foreach($orderItems as $item)
        <tr>
            <td>
                <div class="show-product-image">
                    <a href="/product/{{$item->product->Product_ID }}"><img src="/images/allProductImages/{{$item->product->Product_ID}}.jpg" alt="productImage"></a>
                </div>
                <div class="product-info">
                    <p><strong>{{ $item->product->Product_Name }}</strong></p>
                    <p>Qty: {{ $item->Amount }}</p>
                    <p>£{{ $item->Price }}</p>
                </div>
            </td>
            @php
            $totalItems += $item->Amount;
            $totalAmount += $item->Price * $item->Amount;
            @endphp
        </tr>
        @endforeach
        <tr>
            <td><strong>{{ $totalItems }} {{ $totalItems == 1 ? 'Item' : 'Items' }}</strong></td>
            <td><strong>£{{ $totalAmount }}</strong></td>
        </tr>

        @if($totalAmount <= 90) @php $shippingCost=config('shipping.shipping_cost'); $grandTotal=$totalAmount + $shippingCost; @endphp @else @php $shippingCost=0.00; $grandTotal=$totalAmount; @endphp @endif <tr>
            <td>Shipping:</td>
            <td>£{{ number_format($shippingCost, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Grand Total:</strong></td>
                <td><strong>£{{ number_format($grandTotal, 2) }}</strong></td>
            </tr>
            @else
            <tr>
                <td colspan="3">No order items found.</td>
            </tr>
            @endif
    </tbody>

</table>
<div class="go-back-btn-container">
    <a href="{{ url()->previous() }}" class="go-back-btn">Go Back</a>
</div>
</div>


<br><br><br><br><br><br><br>

@endsection