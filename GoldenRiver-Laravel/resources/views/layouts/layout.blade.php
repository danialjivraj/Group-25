<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!-- JavaScript Bundle with Popper -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/master.css" type="text/css">
    <script src="/js/master.js"></script>
    
    @yield('css')
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