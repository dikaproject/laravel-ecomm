<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/shop', function () {
    $products = \App\Models\Product::all();
    $treasureProducts = \App\Models\Product::inRandomOrder()->limit(2)->get();
    return view('shop.index', compact('products', 'treasureProducts'));
})->name('shop');

Route::get('/shop/product/{product}', function ($product) {
    $product = \App\Models\Product::findOrFail($product);
    return view('shop.product', compact('product'));
})->name('shop.product');

Route::get('/shop/all', function () {
    $products = \App\Models\Product::paginate(12);
    return view('shop.all', compact('products'));
})->name('shop.all');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/location', function () {
    return view('location');
})->name('location');

// Authentication routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Newsletter route (simple redirect for now)
Route::post('/newsletter/subscribe', function () {
    return back()->with('success', 'Thanks for subscribing!');
})->name('newsletter.subscribe');

// Order routes - requires authentication
Route::middleware(['auth'])->group(function () {
    // Create order
    Route::post('/order/{productId}', [OrderController::class, 'store'])->name('order.store');
    
    // Payment
    Route::get('/payment/{order}', [OrderController::class, 'payment'])->name('payment');
    Route::post('/payment/{order}', [OrderController::class, 'uploadPaymentProof'])->name('payment.upload');
    
    // User dashboard - Order history
    Route::get('/history', [OrderController::class, 'history'])->name('history');
    
    // Profile
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

// Admin routes - requires authentication and admin role
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Orders inbox
    Route::get('/inbox', [AdminOrderController::class, 'index'])->name('inbox');
    Route::put('/order/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('order.status');
});