<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/register', [RegisterController::class, 'index'])->name('auth.register');
Route::get('/logout', [LogoutController::class, 'index'])->name('auth.logout');


Route::get('/', [PageController::class, 'index'])->name('client.home');
Route::get('/store', [PageController::class, 'store'])->name('client.store');
Route::get('/store/{slug}', [PageController::class, 'detail'])->name('client.detail');
Route::get('/checkout', [PageController::class, 'checkout'])->name('client.checkout');
Route::get('/cart', [PageController::class, 'cart'])->name('client.cart')->middleware(['auth']);

Route::get('/user-info', [PageController::class, 'userInfo'])->name('client.userInfo');
Route::post('/user-info', [PageController::class, 'updateUserInfo'])->name('client.updateUserInfo');
Route::get('/change-password', [PageController::class, 'getChangePassword'])->name('client.getChangePassword');
Route::post('/change-password', [PageController::class, 'ChangePassword'])->name('client.changePassword');


Route::get('/order-list', [PageController::class, 'orderList'])->name('client.orderList');


Route::get('/addToCart', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/updateCartItem/{cartItem}', [CartController::class, 'updateCartItem'])->name('cart.updateCartItem');
Route::get('/deleteCartItem/{cartItem}', [CartController::class, 'deleteCartItem'])->name('cart.deleteCartItem');


route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
route::get('/checkoutSuccess', [CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');


Route::prefix('/admin')->group(function () {

  Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

  Route::resource('products', ProductController::class);
  Route::resource('categories', CategoryController::class);

});
