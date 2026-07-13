<?php
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;



  

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [ProductController::class, 'categoryProducts'])
    ->name('category.products');

Route::get('/product/{slug}', [ProductController::class, 'productDetails'])
    ->name('product.details');