@extends('partials.nav')

@section('title')
<title>GoldenRiver | Profile</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('body')
<div style="text-align: center;">
    @if(Auth::check())

    @if (session('message'))
    <div>
        <h4>{{ session('message') }}</h4>
    </div>
    @endif

    <h1>Welcome, {{ Auth::user()->name }}</h1>

    <div class="reg__container form-box">
        <div style="margin-bottom: 10px;">
            Update Your Information
        </div>
        <form method="POST" action="{{ route('user.update.name.email', Auth::user()->id) }}">
            @csrf
            <!-- Update Name and Email -->
            <div class="form__input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required autofocus maxlength="30" class="form__input" placeholder="Change your name...">
            </div>
            <div class="form__input-group" style="margin-top: 10px;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required maxlength="30" class="form__input" placeholder="Change your email...">
            </div>
            <div class="form__input-group" style="margin-top: 20px;">
                <button type="submit" name="update_emailname" class="form__button">Update!</button>
            </div>
        </form>

        @if(session('status'))
        <div style="margin-top: 10px;">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <div class="reg__container form-box">
        <div style="margin-bottom: 10px;">
            Update Your Password
        </div>
        <form method="POST" action="{{ route('user.update.password', Auth::user()->id) }}">
            @csrf
            <!-- Update Password Only -->
            <div class="form__input-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form__input">
            </div>
            <div class="form__input-group" style="margin-top: 10px;">
                <label for="password-confirm">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form__input">
                <div id="error-message" style="color: red;"></div>
            </div>
            <div class="form__input-group" style="margin-top: 20px;">
                <button id="update-password-button" type="submit" name="update_password" disabled class="form__button">Update!</button>
            </div>
        </form>
        @if (session('password_status'))
        <div style="margin-top: 10px;">
            {{ session('password_status') }}
        </div>
        @endif
    </div>

    <div>
        <br><br>
        <div>
            <h1>View Recent Orders</h1>

            <div class="table-container">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Total Price</th>
                            <th>Order Status</th>
                            <th>View More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $item)
                        <tr>
                            <td>{{$item->Order_ID}}</td>
                            <td>£{{$item->Order_Total_Price}}</td>
                            <td>{{$item->Order_Status}}</td>
                            <td><a href="{{ route('orders.show', ['id' => $item->Order_ID]) }}">View More</a></td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Orders Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    @else
    <h1>Please Login if you want to view your profile!</h1>
    <div>
        {{ __('Please login again to view your information and orders.') }}
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    @endif

    <script src="{{ asset('js/passwordAuthentication.js') }}"></script>
    @endsection