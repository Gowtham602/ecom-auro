<?php

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
        Route::get('/category',[CategoryController::class,'index'])
            ->name('category.index');
        //cate stored
        Route::post('/category/store',[CategoryController::class,'store'])
            ->name('category.store');

});

require __DIR__.'/auth.php';

