<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KnifeController;


Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
   
    Route::get('/knives', [KnifeController::class, 'index'])->name('knives.index'); 
    Route::get('/knives/create', [KnifeController::class, 'create'])->name('knives.create');

    Route::post('/knives', [KnifeController::class, 'store'])->name('knives.store');

    Route::post('/knives/{id}/add-to-cart', [KnifeController::class, 'addToCart'])->name('knives.add_to_cart');

    Route::get('/knives/cart', [KnifeController::class, 'showCart'])->name('knives.cart');

    Route::delete('/knives/remove-from-cart/{id}', [KnifeController::class, 'removeFromCart'])->name('knives.remove_from_cart');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
