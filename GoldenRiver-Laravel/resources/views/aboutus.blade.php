
@extends('partials.nav')

@section('title')
<title>About Us</title>
@endsection('title')

@section('css')

<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection


@section('body')
<body>
    <main>
     
  
      <section class="about-us">
        <div class="about-us-content">
          <h2>About Us</h2>
          <p>We are a group of students who have come together to share our passion 
            for jewellery to the rest of the world. We as a company have spent a lot of our
             time into perfecting our craft and creating unique designs that would appeal to
              a wide range of customers regardless of who you are and what you are looking for. Whether you are looking for a classic traditional piece or something that is loud and unique,
              our high-quality collection of jewellery has something for everyone. Our determination in design, 
              craftsmanship and sustainability sets us apart from the
            rest and makes our jewellery the best choice for those who appreciate quality and style. </p>

          <div class="image">
            <img src="images/aboutus/aboutimagee.jpg">
          </div>
          <h2 style="text-align: center;">Our Mission</h2>
          <p>Our mission is to provide our customers with the best possible experience when it comes to buying jewellery. We offer a wide selection of styles, materials, and price points to meet the needs of every customer. We pride ourselves on our exceptional customer service and attention to detail.</p>
          <div class="image">
            <img src="images/aboutus/ourmisson.jpg">
          </div>
          <h2 style="text-align: center;">Our Team</h2>
            <p>Our team consists of skilled designers, craftspeople, and salespeople who are passionate about jewellery. We work closely together to ensure that each piece of jewellery we sell is of the highest quality and meets our customers' expectations.</p>
          <!--<div class="image2">
            <img src="images/aboutus/team.jpg"  class="no-border">
          </div>-->
          <div class="image">
            <img src="images/aboutus/ourteam.jpg">
          </div>
        </div>
      </section>
    </main>
</body> 

  @endsection
