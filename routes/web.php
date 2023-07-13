<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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
    return view('Home/index');
});



Route::prefix('categories')->group(function () {
    Route::get('/',         	[CategoryController::class,'index'])->name('categories');
    Route::get('/create',         	[CategoryController::class,'create'])->name('categories.create');
    Route::post('/create',       [CategoryController::class,'store'])->name('category.store');
    Route::delete('/{id}',       [CategoryController::class,'destroy'])->name('category.delete');
    Route::get('/{id}',       [CategoryController::class,'edit'])->name('category.edit');
    Route::put('/{id}',       [CategoryController::class,'update'])->name('category.update');
    


});
Route::get('orders', [OrderController::class,'index'])->name('orders');
Route::get('orders/{id}', [OrderController::class,'show'])->name('orders.show');
Route::delete('orders/{id}', [OrderController::class,'destroy'])->name('orders.delete');
Route::put('orders/{id}', [OrderController::class,'update'])->name('orders.edit');
Route::resource('products', ProductController::class);
