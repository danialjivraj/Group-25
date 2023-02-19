<!-- footer section starts-->
@yield('css')
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/3cc03d8fde.js" crossorigin="anonymous"></script>
@endsection

@section('body')
<body>
    <section class="footer">
        <div class="socials">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="#">Free Delivery</a>
                <span>Free delivery on orders over £30</span>
            </li>
            <li>
                <a href="#">Customer Support</a>
            </li>
            <li>
                <a href="#">Privacy Policy</a>
            </li>
        </ul>
        <p class="copyright">
            Golden River @ 2023
        </p>
    </section>
</body>
</html>