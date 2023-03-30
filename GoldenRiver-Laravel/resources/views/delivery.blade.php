@extends('partials.nav')

@section('title')

<title>Delivery Policy</title>
@endsection('title')
@section('css')

<link rel="stylesheet" href="{{asset('css/delivery.css')}}">
@endsection
@section('body')

<body>
    <main>
      <header>
        <h1>Delivery Policy</h1>
      </header>
      <section class="content">
        <p>At our online jewelry store, we are committed to providing you with a seamless shopping experience, which includes a reliable and efficient delivery process. Our delivery policy explains how we process and deliver your orders.</p>
        
        <h2>Order Processing</h2>
        <p>Once we receive your order, we will process it within 24 hours and prepare it for shipping. If we encounter any issues or delays, we will contact you immediately.</p>
        
        <h2>Delivery Options</h2>
        <p>We offer several delivery options, including standard shipping, express shipping, and same-day delivery (available in select areas). You can select your preferred delivery option at checkout.</p>
        
        <h2>Delivery Times</h2>
        <p>Delivery times will depend on the delivery option you choose and your location. Standard shipping typically takes 3-5 business days, while express shipping takes 1-2 business days. Same-day delivery is available for orders placed before 12 PM local time. Please note that delivery times may be affected by unforeseen circumstances such as weather conditions or holidays.</p>
        
        <h2>Delivery Fees</h2>
        <p>Delivery fees will vary depending on the delivery option you choose and your location. You can view the delivery fees at checkout before placing your order.</p>
        
        <h2>Order Tracking</h2>
        <p>Once your order has been shipped, you will receive a tracking number via email. You can use this tracking number to track the status of your order on our website or on the carrier's website.</p>
        
        <h2>Contact Us</h2>
        <p>If you have any questions about our delivery policy or need assistance with your order, please contact us at delivery@yourjewelrystore.com or visit our <a href="contact"><u>contact</u></a> page to get in touch with us.</p>
      </section>
    </main>
    
    </body>
    @endsection
    
    </html>