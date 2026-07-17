<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\HomeController;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class,'index'])->name('home');

Route::middleware(['auth','admin'])
    ->prefix('admin')
    ->group(function(){
        //admin dashboard
        Route::get('/dashboard',[DashboardController::class,'index'])
            ->name('admin.dashboard');

        //admin categories 
        Route::get('/category',[CategoryController::class,'index']) ->name('category.index');
        //category stored
        Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
        //edit    
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');

        Route::post('/update/{id}', [CategoryController::class,'update'])->name('category.update');

        Route::delete('/delete/{id}', [CategoryController::class,'destroy'])->name('category.delete');

        //category list the table
        Route::get('/category-list', [CategoryController::class, 'getCategory'])->name('category.list');

        // product  list in admin 
        Route::get('/product',[ProductController::class,'index'])->name('product.index');

        //stored
        Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
        // edit the product 
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        //updated for product in admin 
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
        //Deleted
        Route::delete('/products/{product}', [ProductController::class, 'destroy']) ->name('product.destroy');
        //list 
        Route::get('/products/list', [ProductController::class, 'getProducts'])->name('product.list');

        
        


});

require __DIR__.'/auth.php';

require __DIR__.'/frontend.php';
