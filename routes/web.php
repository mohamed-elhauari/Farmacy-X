<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/dashboard-pharmacist', function () {
    return view('pharmacist.dashboard');
})->name('dashboard.pharmacist');

Route::get('/', function () {
    return view('customer.welcome');
})->name('customer.welcome');

Route::get('/medicines', function () {
    return view('customer.medicines.index');
})->name('customer.medicines.index');

Route::get('/medicines/1', function () {
    return view('customer.medicines.show');
})->name('customer.medicines.show');

Route::get('/medicines/cart', function () {
    return view('customer.medicines.cart');
})->name('customer.medicines.cart');