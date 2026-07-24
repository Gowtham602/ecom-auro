<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;


  

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/category/{slug}', [ProductController::class, 'categoryProducts'])
        ->name('category.products');

    Route::get('/product/{slug}', [ProductController::class, 'productDetails'])
        ->name('product.details');

    Route::post('/cart/store-pending', [CartController::class, 'storePendingCart'])
        ->name('cart.store.pending');
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

    //after add to card checkout controller 
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    //address controller
    Route::resource('address', AddressController::class);


    Route::post('/address/default/{id}',[AddressController::class,'setDefault'])
        ->name('address.default');

    // order controller 
     Route::post('/place-order', [OrderController::class, 'placeOrder'])
        ->name('place.order');

    Route::post('/place-order', [OrderController::class, 'placeOrder'])
        ->name('place.order');

         // my order 
    Route::get('/my-orders', [OrderController::class, 'index'])
        ->name('orders.index');
        
    // order for particular user 
    Route::get('/my-orders/{order}', [OrderController::class, 'show'])
    ->name('orders.show');
    

    Route::post('/verify-payment', [OrderController::class, 'verifyPayment'])
        ->name('verify.payment');

    Route::get('/order-success/{order}', [OrderController::class, 'success'])
    ->name('orders.success');

    //order for payment using  webhook
    Route::post('/razorpay/webhook', [OrderController::class, 'webhook'])
    ->name('razorpay.webhook');

   
});