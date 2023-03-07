<h2>Order Summary</h2>
<p>Order Reference: {{ $order->Order_ID }}</p>
<p>Order Status: {{ $order->Order_Status }}</p>
<hr>
<p>"-- PRODUCT DETAILS GO HERE --"</p>
<hr>
<p>Subtotal: £{{ $order->Order_Total_Price }}</p>
<p>Order Date: {{ $order->created_at }}</p>

