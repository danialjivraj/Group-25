
@extends('partials.nav')

@section('title')
<title>About Us</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')
<section class ="about">
    <div class="main">
        <img src="images/logo.png">
        <div class="about-text">
            <h1>About Us</h1>
            <h3>Who We Are</h3>
            <h4> We are a group of students who have come together to share our passion 
                for jewellery to the rest of the world. We as a company have spent a lot of our
                 time into perfecting our craft and creating unique designs that would appeal to
                  a wide range of customers regardless of who you are and what you are looking for. 
                  Whether you are looking for a classic traditional piece or something that is loud and unique,
                   our high-quality collection of jewellery has something for everyone. Our determination in design, 
                   craftsmanship and sustainability sets us apart from the
                 rest and makes our jewellery the best choice for those of who appreciate quality and style. 
</h4>
</div>
</div>
</section>

@endsection
</body>
</html>