<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineImportController;


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


Route::get('/medicines/cart', function () {
    return view('customer.medicines.cart');
})->name('customer.medicines.cart');



Route::get('/medicines', [MedicineController::class, 'index'])->name('customer.medicines.index');
Route::get('/medicines/{id}', [MedicineController::class, 'show'])->name('customer.medicines.show');




Route::get('/my-orders', [OrderController::class, 'indexMyOrders'])->name('customer.orders.index');
Route::get('/pharmacist/orders', [OrderController::class, 'indexOrders'])->name('pharmacist.orders.index');





Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/order/create', [CartController::class, 'createOrder'])->name('order.create');




Route::prefix('orders')->name('orders.')->group(function () {

    Route::get('{order}/accept', [OrderController::class, 'accept'])->name('accept');
    Route::get('{order}/reject', [OrderController::class, 'reject'])->name('reject');
    Route::get('{order}/complete', [OrderController::class, 'complete'])->name('complete');
    
});





Route::middleware(['auth'])->group(function () {

    Route::post('/medicine/import', [MedicineImportController::class, 'storeMedicines'])->name('pharmacist.medicines.store');
    Route::post('/medicine/import-medicine', [MedicineImportController::class, 'storeMedicine'])->name('pharmacist.medicines.store-medicine');

    Route::get('/medicine/search', [MedicineController::class, 'search'])->name('pharmacist.medicines.add');


    Route::get('/medicine/add', [MedicineController::class, 'showAddForm'])->name('pharmacist.medicines.add');
    Route::post('/medicine/search', [MedicineController::class, 'searchMedicine'])->name('pharmacist.medicines.search');
    Route::get('/medicine/add-infos/{code}', [MedicineController::class, 'showMedicineInfo'])->name('pharmacist.medicines.add-infos');

    Route::get('/medicine/add-new', [MedicineController::class, 'showAddFormNew'])->name('pharmacist.medicines.add-new');
    Route::post('/medicine/import-new', [MedicineImportController::class, 'storeMedicinesNew'])->name('pharmacist.medicines.store-new');
    Route::post('/medicine/import-medicine-new', [MedicineImportController::class, 'storeMedicineNew'])->name('pharmacist.medicines.store-medicine-new');


    Route::get('/pharmacist/medicines', [MedicineController::class, 'indexPharmacist'])->name('pharmacist.medicines.index');

    Route::get('/medicine/addd-infos/{code}', [MedicineController::class, 'showMedicineInfos'])->name('pharmacist.medicines.addd-infos');




});