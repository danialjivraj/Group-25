
@extends('partials.nav')

@section('title')
<title>About Us</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection


@section('body')
  <body>
    <main>
      <section class="hero">
        <div class="hero-text">
          <img src="images/banner.jpg" alt="">
          <h1>About Us</h1>
        </div>
      </section>
  
      <section class="about-us">
        <div class="about-us-content">
          <h2>Our Story</h2>
          <p>We are a family-owned and operated business that has been creating and selling high-quality jewelry for over 50 years. Our passion for jewelry started as a hobby, but soon turned into a full-fledged business.</p>
  
          <h2>Our Mission</h2>
          <p>Our mission is to provide our customers with the best possible experience when it comes to buying jewelry. We offer a wide selection of styles, materials, and price points to meet the needs of every customer. We pride ourselves on our exceptional customer service and attention to detail.</p>
  
          <h2>Our Team</h2>
          <p>Our team consists of skilled designers, craftspeople, and salespeople who are passionate about jewelry. We work closely together to ensure that each piece of jewelry we sell is of the highest quality and meets our customers' expectations.</p>
        </div>
      </section>
    </main>
  
  </body>

  @endsection
</html>