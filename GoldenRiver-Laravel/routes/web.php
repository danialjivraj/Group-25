<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginLogoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('userRegistration');
});

//test
Route::get('/userRegistration', [RegistrationController::class , 'show']);


Route::post('/userRegistration', [RegistrationController::class, 'registerUser']);


Route::get('/logout',[LoginLogoutController::class, 'logout']);

Route::get('/homePage', function () {
    return view('homePage');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/nav', function () {
    return view('/partials/nav');
});

Route::get('/footer', function () {
    return view('/partials/footer');
});

