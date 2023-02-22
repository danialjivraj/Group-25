@extends('partials.nav')

@section('title')
<title> Golden River | Log in</title>
@endsection('title')

@section('css')
    <link rel="stylesheet" href="app.css">
    <script src="./login.js"></script>
@section('css')


@section('body')
    <div class="container">

<h1>Login Page</h1>
<form action="/login" method="post" class="login-inputs">
    @csrf
    <input type="email" class="form__input" name="email" placeholder="Your email"  required/><br>
    <input type="password" class="form__input" name="password" placeholder="Password"  required/><br>

    <input type="submit" value="Sign in" class="submit-btn">
</form>

</div>
</html>

@endsection

