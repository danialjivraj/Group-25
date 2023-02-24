@extends('partials.nav')

@section('title')
<title> Golden River | Registration</title>
@endsection('title')

@section('css')
        <link rel="stylesheet" href="style.css">
@section('css')
        

@section('body')
    <div class="reg__container">
        <h1 class= "form__title">Registration</h1>
<form class="form" form action="/userRegistration" method="post" class="signin-inputs" id="registration">
                @csrf
                <div class="form__input-group">
                <input type="text" class="form__input" name="Fullname" placeholder="Full Name" required/><br>
                <div class="errorlog">
                    @error('Fullname')
                    {{$message}}
                    <br>
                    @enderror
                </div></div>
                <div class="form__input-group">
                <input type="email" class="form__input" name="email" placeholder="Your email"  required/><br>
                <div class="errorlog">
                    @error('email')
                    {{$message}}
                    <br>
                    @enderror
                </div></div>
                <div class="form__input-group">
                <input type="password" class="form__input" name="password" placeholder="Password"  required/><br>
                <div class="errorlog">
                    @error('password')
                    {{$message}}
                    <br>
                    @enderror
                </div></div>
                <div class="form__input-group">
                <input type="password" class="form__input" name="password_confirmation" placeholder="Retype Password"
                     required/><br>
                <div class="errorlog">
                    @error('password_confirmation')
                    {{$message}}
                    <br>
                    @enderror
                </div></div>
                <br>
                <button class="form__button" button type="submit">Register</button>
                <p class="form__text">
                <a class="form__link" href="./login" id="linkLogin">Already have an account? Sign in</a>
</p>


            </form>
</div>
</html>

@endsection

            <!-- test -->
