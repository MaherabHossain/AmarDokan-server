<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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


// users
Route::resource('user', UserController::class);
Route::post('user/login', [UserController::class,'login'] )->name('login');
Route::get('user/logout', [UserController::class,'logout'] )->name('logout');


Route::middleware([ 'auth:sanctum'])->group(function () {
 
    // products
Route::prefix('products')->group(function () {
    
    Route::get('/',     [ProductController::class,'index']);
    Route::get('/{id}', [CategoryController::class,'categoryProduct']);
});
// categories
Route::prefix('categories')->group(function () {
    Route::get('/',     [CategoryController::class,'index']);
    Route::get('/{id}',     [CategoryController::class,'categoryProduct']);
});
// order
Route::post('order', [OrderController::class,'store']);
Route::get('order',[OrderController::class,'singleOrder']);
Route::post('user/logout', [UserController::class,'logout'] );
});