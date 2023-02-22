<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title> Golden River | Log in</title>
        <link rel="stylesheet" href="app.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="./login.js"></script>
</head>

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
