<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ShopController;
use Illuminate\Support\Facades\Route;

// Public Static & Shop Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('product.details');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/blogs', [HomeController::class, 'blogList'])->name('blogs');
Route::get('/blog-single', [HomeController::class, 'blogSingle'])->name('blog.single');
Route::get('/404', function () { return view('404'); })->name('404');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Wishlist (AJAX or Auth)
Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist.index');
Route::post('/wishlist/toggle', [HomeController::class, 'toggleWishlist'])->name('wishlist.toggle');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order/success/{id}', [CheckoutController::class, 'success'])->name('order.success');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'userDashboard'])->name('dashboard');
    Route::get('/order-history', [HomeController::class, 'orderHistory'])->name('order.history');
    Route::get('/order-details/{id}', [HomeController::class, 'orderDetails'])->name('order.details');
    Route::get('/account-setting', [HomeController::class, 'accountSetting'])->name('account.setting');
});

// Admin Routes (Admin Middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Products Management
    Route::get('/products', [AdminController::class, 'productsIndex'])->name('products.index');
    Route::get('/products/create', [AdminController::class, 'productsCreate'])->name('products.create');
    Route::post('/products', [AdminController::class, 'productsStore'])->name('products.store');
    Route::get('/products/{id}/edit', [AdminController::class, 'productsEdit'])->name('products.edit');
    Route::put('/products/{id}', [AdminController::class, 'productsUpdate'])->name('products.update');
    Route::delete('/products/{id}', [AdminController::class, 'productsDestroy'])->name('products.destroy');

    // Categories Management
    Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('categories.index');
    Route::get('/categories/create', [AdminController::class, 'categoriesCreate'])->name('categories.create');
    Route::post('/categories', [AdminController::class, 'categoriesStore'])->name('categories.store');
    Route::get('/categories/{id}/edit', [AdminController::class, 'categoriesEdit'])->name('categories.edit');
    Route::put('/categories/{id}', [AdminController::class, 'categoriesUpdate'])->name('categories.update');
    Route::delete('/categories/{id}', [AdminController::class, 'categoriesDestroy'])->name('categories.destroy');

    // Orders Management
    Route::get('/orders', [AdminController::class, 'ordersIndex'])->name('orders.index');
    Route::get('/orders/{id}', [AdminController::class, 'ordersShow'])->name('orders.show');
    Route::put('/orders/{id}/status', [AdminController::class, 'ordersUpdateStatus'])->name('orders.updateStatus');
});

// Include auth routes (Breeze / Jetstream / Laravel auth)
require __DIR__.'/auth.php';
