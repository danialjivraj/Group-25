<!doctype html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title> Golden River | Registration</title>
        <link href="{{ URL::asset('css\registration.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div class="container">
        <h1 class= "form__title">Registration</h1>
<form class="form__id" form action="/userRegistration" method="post" class="signin-inputs" id="registration">
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
                <button class="form__button" button type="submit" class="reg-btn">Register</button>
                <a href="#" id="linkLogin" class= "form__link">Already have an account? sign in.</a>
                
            
            </form>

            <!-- test -->
</body>