<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/product-categories', [ProductCategoryController::class, 'index'])->name('product-categories');
Route::post('/product-categories/store', [ProductCategoryController::class, 'store'])->name('product-categories.store');
Route::get('/product-categories/{id}/edit', [ProductCategoryController::class, 'edit'])->name('product-categories.edit');
Route::put('/product-categories/{id}', [ProductCategoryController::class, 'update'])->name('product-categories.update');
Route::delete('/product-categories/{id}', [ProductCategoryController::class, 'destroy'])->name('product-categories.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/detail', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/shops', [ShopController::class, 'index'])->name('shops');
Route::get('/shops/{id}/detail', [ShopController::class, 'show'])->name('shops.show');

Route::get('/carts/{user_id}', [OrderController::class, 'cart'])->name('carts');
Route::delete('/carts/{product_id}', [OrderController::class, 'deleteOrderDetail'])->name('carts.destroy');
Route::post('/orders', [OrderController::class, 'storeOrder'])->name('orders.store');
Route::get('/checkouts/{order_id}', [OrderController::class, 'checkout'])->name('checkouts');
Route::post('/checkouts/{order_id}', [OrderController::class, 'checkoutStore'])->name('checkouts.store');

Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
Route::get('/addresses/{id}/detail', [AddressController::class, 'show'])->name('addresses.show');
Route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');
Route::post('/addresses/store', [AddressController::class, 'store'])->name('addresses.store');
Route::get('/addresses/{id}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');