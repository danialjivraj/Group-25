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
<form action="/userRegistration" method="post" class="signin-inputs">
                @csrf
                <input type="text" name="Fullname" placeholder="Your name" class="input-field2" required/><br>
                <div class="errorlog">
                    @error('Fullname')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <input type="email" name="email" placeholder="Your email" class="input-field2" required/><br>
                <div class="errorlog">
                    @error('email')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <input type="password" name="password" placeholder="Password" class="input-field2" required/><br>
                <div class="errorlog">
                    @error('password')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <input type="password" name="password_confirmation" placeholder="Retype Password"
                    class="input-field2" required/><br>
                <div class="errorlog">
                    @error('password_confirmation')
                    {{$message}}
                    <br>
                    @enderror
                </div>
                <br>
                <button type="submit" class="reg-btn">Register</button>
            </form>

            <!-- test -->

</html>