<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\OrderController;
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

Route::prefix('products')->group(function () {
    Route::get('/',     [ProductController::class,'index']);
});
Route::prefix('categories')->group(function () {
    Route::get('/',     [CategoryController::class,'index']);
});

Route::post('order', [OrderController::class,'store']);
Route::get('order',[OrderController::class,'index']);