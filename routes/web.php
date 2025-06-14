<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/our', [HomeController::class, 'our']);
Route::get('/search', [HomeController::class, 'search']);

Route::group([], function () {
    Route::get('/redirect', [HomeController::class, 'redirect']);
    Route::post('/add_card/{id}', [HomeController::class, 'add_card']);
    Route::get('/show_cart', [HomeController::class, 'show_cart']);
    Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart']);
    Route::post('/order', [HomeController::class, 'order']);
    Route::post('/post_message', [HomeController::class, 'post_message']);
});
Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{total}', 'stripe');

    Route::post('stripe/{total}', 'stripePost')->name('stripe.post');

});

Route::middleware(['auth', \App\Http\Middleware\Admin::class])->group(function () {

    Route::get('/product',[AdminController::class,'product']);
    // Route::post('/upload_product',[AdminController::class,'upload_product']);
    Route::post('/upload_product', [AdminController::class, 'upload_product']);
    Route::get('/show_product', [AdminController::class, 'show_product']);
    Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
    Route::post('/update_product_final/{id}', [AdminController::class, 'update_product_final']);
    Route::get('/showorder', [AdminController::class, 'showorder']);
    Route::get('/update_status/{id}', [AdminController::class, 'update_status']);
    Route::get('/delete/{id}', [AdminController::class, 'delete']);
    Route::get('/show_message', [AdminController::class, 'show_message']);
    Route::get('/delete_message/{id}', [AdminController::class, 'delete_message']);
    Route::get('/alluser', [AdminController::class, 'alluser']);
    Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
    Route::get('/update_user/{id}', [AdminController::class, 'update_user']);
    Route::post('/edit_userid/{id}', [AdminController::class, 'edit_userid']);

});
Route::get('order-success', function () {
    return view('user.success'); // create a success view
})->name('order.success');
