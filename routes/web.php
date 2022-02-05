<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/login', function () {
    return view('users.login');
});

Route::get('/register', function () {
    return view('users.register');
});

Route::get('/recherche', function () {
    return view('products.recherche');
});
Route::get('/categorie', function () {
    return view('products.categorie');
});
Route::get('/produit', function () {
    return view('products.produit');
});

Route::get('/cart', function () {
    return view('orders.cart');
});
Route::get('/checkout', function () {
    return view('orders.checkout');
});
Route::get('/admin', function () {
    return view('profile.admin');
});
Route::get('/client', function () {
    return view('profile.client');
});