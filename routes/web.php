<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [ProductController::class, 'index'])->name('index');

// Auth Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [UserController::class, 'store'])->name('users.store');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login')->with('success', 'Logged out successfully');
})->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::post('/purchase', [OrderController::class, 'store'])->name('purchase');
});

