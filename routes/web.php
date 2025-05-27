<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/medicines', function () {
    return view('customer.medicines.index');
})->name('customer.medicines.index');

Route::get('/medicines/1', function () {
    return view('customer.medicines.show');
})->name('customer.medicines.show');

Route::get('/medicines/cart', function () {
    return view('customer.medicines.cart');
})->name('customer.medicines.cart');

Route::get('/pharmacist/medicine', function () {
    return view('pharmacist.medicines.index');
})->name('pharmacist.medicines.index');

Route::get('/pharmacist/medicine/1', function () {
    return view('pharmacist.medicines.show');
})->name('pharmacist.medicines.show');


Route::middleware(['auth'])->group(function () {

    Route::post('/medicine/import', [MedicineImportController::class, 'storeMedicines'])->name('pharmacist.medicines.store');

    Route::get('/medicine/search', [MedicineController::class, 'search'])->name('pharmacist.medicines.add');
    Route::get('/medicine/add-infos/{code}', [MedicineController::class, 'addInfos'])->name('pharmacist.medicines.add-infos');


    Route::get('/medicine/add', [MedicineController::class, 'showAddForm'])->name('pharmacist.medicines.add');
    Route::post('/medicine/search', [MedicineController::class, 'searchMedicine'])->name('pharmacist.medicines.search');
    Route::get('/medicine/add-infos/{code}', [MedicineController::class, 'showMedicineInfo'])->name('pharmacist.medicines.add-infos');

    Route::get('/medicine/add-new', [MedicineController::class, 'showAddFormNew'])->name('pharmacist.medicines.add-new');
    Route::post('/medicine/import-new', [MedicineImportController::class, 'storeMedicinesNew'])->name('pharmacist.medicines.store-new');
    Route::post('/medicine/import-medicine-new', [MedicineImportController::class, 'storeMedicineNew'])->name('pharmacist.medicines.store-medicine-new');



});