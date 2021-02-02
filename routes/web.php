<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [App\Http\Controllers\Ecommerce\FrontController::class, 'index'])->name('front.index');
Route::get('/product/{slug}', [App\Http\Controllers\Ecommerce\FrontController::class, 'show'])->name('front.show_product');
Route::post('cart', [App\Http\Controllers\Ecommerce\CartController::class, 'addToCart'])->name('front.cart');
Route::get('/cart', [App\Http\Controllers\Ecommerce\CartController::class, 'listCart'])->name('front.list_cart');
Route::post('/cart/update', [App\Http\Controllers\Ecommerce\CartController::class, 'updateCart'])->name('front.update_cart');
Route::get('/load-cart-data',[App\Http\Controllers\Ecommerce\CartController::class, 'cartloadbyajax']);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [App\Http\Controllers\Ecommerce\CartController::class, 'checkout'])->name('front.checkout');
    Route::post('/checkout', [App\Http\Controllers\Ecommerce\CartController::class, 'processCheckout'])->name('front.store_checkout');
    Route::get('/checkout/{invoice}', [App\Http\Controllers\Ecommerce\CartController::class, 'checkoutFinish'])->name('front.finish_checkout'); 
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard'); 
    Route::resource('category', CategoryController::class)->except(['create', 'show']);
    Route::resource('product', ProductController::class)->except(['show']);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('orders/{invoice}', [HomeController::class, 'view'])->name('customer.view_order');
Route::get('payment', [HomeController::class, 'paymentForm'])->name('customer.paymentForm');
Route::post('payment', [HomeController::class, 'storePayment'])->name('customer.savePayment');
Route::get('orders', [HomeController::class, 'pesanan'])->name('customer.orders');
