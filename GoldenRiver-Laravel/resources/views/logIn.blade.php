@extends('partials.nav')

@section('title')
<title> Golden River | Log in</title>
@endsection('title')

@section('css')
    <link rel="stylesheet" href="app.css">
    <script src="./login.js"></script>
@section('css')


@section('body')

@if (session('loginToAddCart'))
    <div class="alert alert-danger">
        {{ session('loginToAddCart') }}
    </div>
@endif

    <div class="login__container">

<h1 class= "form__title">Login</h1>

@if (session('loginerrmsg'))
    <div class="alert alert-danger" style = "color:red">
        {{ session('loginerrmsg') }}
    </div>
@endif


<form class="form" action="/login" method="post" class="login-inputs">
    @csrf
    <div class="form__input-group">
    <input type="email" class="form__input" name="email" placeholder="Username or email"  required/><br>
    <div class="errorlog">
                    @error('email')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
    <input type="password" class="form__input" name="password" placeholder="Password"  required/><br>
    <div class="errorlog">
                    @error('password')
                    {{ $message }}
                    <br>
                    @enderror
                </div>
</div>

    <button class="form__button" button type="submit">Sign in</button>
                <p class="form__text">
                <a class="form__link" href="./userRegistration" id="linkLogin">Don't have an Account? Sign up</a>
</p>
</form>

</div>
</html>

@endsection

