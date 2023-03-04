
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
          <p>We are a group of students who have come together to share our passion 
            for jewellery to the rest of the world. We as a company have spent a lot of our
             time into perfecting our craft and creating unique designs that would appeal to
              a wide range of customers regardless of who you are and what you are looking for. Whether you are looking for a classic traditional piece or something that is loud and unique,
              our high-quality collection of jewellery has something for everyone. Our determination in design, 
              craftsmanship and sustainability sets us apart from the
            rest and makes our jewellery the best choice for those who appreciate quality and style. 
</h4></p>
  
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