@extends('partials.nav')

@section('title')
<title> Golden River | Log in</title>
@endsection('title')

@section('css')
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="{{asset('css/shop copy.css')}}">
@section('css')


@section('body')

<div class="alertLogOut">
    @if(session()->has('logoutSuccess'))
    <div class="alert alert-success" role="alert" id="go-to-basket">
        <h4>{{session()->get('logoutSuccess')}}</h4>
    </div>
    @endif
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="reg__container">
                <h1 class="form__title">Login</h1>

                @if (session('loginerrmsg'))
                <div class="alert alert-danger" style="color:red">
                    {{ session('loginerrmsg') }}
                </div>
                @endif


                <form class="form" action="/login" method="post" class="login-inputs">
                    @csrf
                    <div class="form__input-group">
                        <input type="email" class="form__input" name="email" placeholder="Email Address" required /><br>
                        <div class="errorlog">
                            @error('email')
                            {{ $message }}
                            <br>
                            @enderror
                        </div>
                    </div>
                    <div class="form__input-group">
                        <input type="password" class="form__input" name="password" placeholder="Password" required /><br>
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