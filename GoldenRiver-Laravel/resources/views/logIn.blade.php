@extends('partials.nav')

@section('title')
<title> Golden River | Log in</title>
@endsection('title')

@section('css')
    <link rel="stylesheet" href="app.css">
    <script src="./login.js"></script>
@section('css')


@section('body')
    <div class="login__container">

<h1 class= "form__title">Login</h1>
<form class="form" action="/login" method="post" class="login-inputs">
    @csrf
    <div class="form__input-group">
    <input type="email" class="form__input" name="email" placeholder="Username or email"  required/><br>
    <input type="password" class="form__input" name="password" placeholder="Password"  required/><br>
</div>

    <button class="form__button" button type="submit">Sign in</button>
                <p class="form__text">
                <a class="form__link" href="./userRegistration" id="linkLogin">Don't have an Account? Sign up</a>
</p>
</form>

</div>
</html>

@endsection

