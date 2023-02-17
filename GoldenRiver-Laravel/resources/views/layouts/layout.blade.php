<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

<!-- footer section starts-->
@yield('css')
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <script src="{{asset('js/components/index.js)}}"></script>
@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/3cc03d8fde.js" crossorigin="anonymous"></script>
@endsection

    <!-- Styles -->
</head>
    <body>
    <section class="header">
        <div class="logo"></div>
    </section>
    <section class="navigation">
        <div class="nav-container">
            <nav>
                <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
                <ul class="nav-list">
                    <li>
                        <a href="#!">New In</a>
                    </li>
                    <li>
                        <a href="#!">Shop</a>
                    </li>
                    <li>
                        <a href="#!">Men</a>
                    </li>
                    <li>
                        <a href="#!">Women</a>
                    </li>
                    <li>
                        <a href="#!">Best Sellers</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    </body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
</style>