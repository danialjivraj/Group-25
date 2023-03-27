<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginLogoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function(){
    return view('faq');
});

Route::get('/privacy', function(){
    return view('privacy');
});

Route::get('/homePage', function () {
    return view('homePage');
});

Route::get('/cart', function () {
    return view('cart');
})->middleware('protectPages');

Route::get('/profile', [OrdersController::class, 'index'])->name('profile');

Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');

Route::get('/userRegistration', [RegistrationController::class , 'show']);

Route::get('/bracelets', function () {
    return view('/categories/bracelets');
});

Route::get('/earrings', function () {
    return view('/categories/earrings');
});

Route::get('/necklaces', function () {
    return view('/categories/necklaces');
});

Route::get('/rings', function () {
    return view('/categories/rings');
});

Route::get('/exclusiveSets', function () {
    return view('/categories/exclusiveSets');
});

Route::get('/login', [LoginLogoutController::class, 'showLogin']);

Route::get('/logout', [LoginLogoutController::class, 'logout']);

Route::get('/product', [ProductsController::class, 'showProducts']);

// Route to get one product when a certain product is selected on the products page.
Route::get('/product/{Product_ID}', [ProductsController::class, 'aProduct']);

// Route to search for a product using the search bar on products page
Route::get('/search', [ProductsController::class, 'search']);

Route::post('/userRegistration', [RegistrationController::class, 'registerUser']);

Route::post('/login', [LoginLogoutController::class, 'doLogin']);

Route::post('/users/{id}/update-name-email', [UserController::class, 'updateNameEmail'])->name('user.update.name.email');

Route::post('/users/{id}/update/password', [UserController::class, 'updatePassword'])->name('user.update.password');

Route::post('/cart', [BasketController::class, 'addToBasket']);

Route::get('/cart', [BasketController::class, 'showCart']);

Route::get('/removefrombasket/{id}', [BasketController::class, 'removeBasket']);

Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');

Route::post('/users/{id}/update/password', [UserController::class, 'updatePassword'])->name('user.update.password');

Route::get('/checkout', function () {
    return redirect('login');
});

Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout');

Route::get('/order-summary/{order_id}', [CheckoutController::class, 'showOrderSummary'])
    ->name('order-summary')
    ->middleware('protectPages');