@extends('partials.nav')

@section('title')
<title>GoldenRiver | Profile</title>
@endsection

@section('body')
@if(Auth::check())

<h1>Welcome, {{ Auth::user()->name }}</h1>

<div>
    <div>
        Update Your Information
    </div>
    <div>
        <form method="POST" action="{{ route('user.update', Auth::user()->id) }}">
            @csrf

            <!-- Update Name and Email -->
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required autofocus>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
            </div>

            <!-- Update Password -->
            <div>
                <button type="submit" name="update_all">Update!</button>
            </div>

            <!-- Update Password Only -->
            <div>
                <label for="password">New Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password-confirm">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password-confirm">
            </div>
            <div>
                <button type="submit" name="update_password_only">Update!</button>
            </div>
        </form>
    </div>
</div>

<div>
    <br><br>
    <div>
        View Recent Orders
    </div>
</div>

<div>
    <h4>{{ __('You are logged in!') }}</h4>
</div>

@else
<h1>Welcome, Guest</h1>
<div>
    {{ __('Please login to view your information and orders.') }}
</div>
@endif

@if (session('status'))
<div>
    {{ session('status') }}
</div>
@endif
@endsection