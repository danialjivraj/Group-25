<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginLogoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;

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
    return view('landing');
});

Route::get('/userRegistration', function () {
    return view('userRegistration');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get("/faq", function(){
    return view("faq");
 });


Route::get('/profile', function () {
    return view('profile');
});

Route::get('/userRegistration', [RegistrationController::class , 'show']);


Route::post('/userRegistration', [RegistrationController::class, 'registerUser']);


Route::get('/logout',[LoginLogoutController::class, 'logout']);

Route::get('/homePage', function () {
    return view('homePage');
});


Route::get('/cart', function () {
    return view('cart');
});

// Route::get('/nav', function () {
//     return view('/partials/nav');
// });

// Route::get('/footer', function () {
//     return view('/partials/footer');
// });

Route::get('/shop', function () {
    return view('shop');
});

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

Route::get('/login',[LoginLogoutController::class, 'showLogin']);

Route::post('/login', [LoginLogoutController::class, 'doLogin']);

Route::get('/product', [ProductsController::class, 'showProducts']);

//route to get one product when a certain product is selected on the products page.
Route::get('/product/{Product_ID}', [ProductsController::class, 'aProduct']);

//route to search for a product using the search bar on products page
Route::get('/search', [ProductsController::class,'search']);

//Route just for testing
Route::get('/test', [BasketController::class,'test']);

Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');

Route::post('/users/{id}/update-name-email', [UserController::class, 'updateNameEmail'])->name('user.update.name.email');

Route::post('/users/{id}/update/password', [UserController::class, 'update'])->name('user.update.password');

Route::post('/users/{id}/update/password', [UserController::class, 'updatePassword'])->name('user.update.password');

Route::get('/profile', 'OrdersController@index');

Route::get('/profile', [OrdersController::class, 'index'])->name('profile');

Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');

Route::post('/cart', [BasketController::class,'addToBasket']);

Route::get('/cart',[BasketController::class,'listBasket']);



