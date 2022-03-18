<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Api\LoginController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// cart api zone ------------------------------------------------------------
Route::get('/check-cart-count', [CartController::class, "checkCartCount"])->name('check-cart-count');
Route::get('/add-to-cart', [CartController::class, "addToCart"])->name('add-to-cart');

// category api zone 
Route::get('/category', [CategoryController::class, "categoryFilter"])->name('category');

// auth api zone 
Route::post('/login', [LoginController::class, "login"])->name('login');
Route::post('/test-token', [LoginController::class, "testToken"])->middleware('auth:api')->name('test-token');
