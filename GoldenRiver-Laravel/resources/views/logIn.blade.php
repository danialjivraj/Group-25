@extends('partials.nav')

@section('title')
<title> Golden River | Log in</title>
@endsection('title')

@section('css')
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('css')


@section('body')


<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="reg__container">
                <h1 class="form__title">Login</h1>

                    @if (session('loginerrmsg'))
                        <div class="alert alert-danger" style = "color:red">
                            {{ session('loginerrmsg') }}
                        </div>
                    @endif

                    
                <form class="form" action="/login" method="post" class="login-inputs">
                        @csrf
                        <div class="form__input-group">
                            <input type="email" class="form__input" name="email" placeholder="Email Address"  required /><br>
                            <div class="errorlog">
                                            @error('email')
                                            {{ $message }}
                                            <br>
                                            @enderror
                            </div>
                            </div>
                        <div class="form__input-group">
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
        </div>
    </div> 
</div>

</html>
<script src="./login.js"></script>

@endsection

