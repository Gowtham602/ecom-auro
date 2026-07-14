<?php
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;



  

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [ProductController::class, 'categoryProducts'])
    ->name('category.products');

Route::get('/product/{slug}', [ProductController::class, 'productDetails'])
    ->name('product.details');


Route::middleware('auth')->group(function () {

    Route::post('/cart/add',[CartController::class,'add'])
        ->name('cart.add');

    Route::get('/cart',[CartController::class,'index'])
        ->name('cart.index');

    Route::post('/cart/update',[CartController::class,'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{id}',[CartController::class,'remove'])
        ->name('cart.remove');

    Route::get('/cart/count',[CartController::class,'count'])
        ->name('cart.count');

    Route::get('/cart/summary', [CartController::class, 'summary'])
    ->name('cart.summary');

});