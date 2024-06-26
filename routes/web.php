<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

//PET HOTEL
Route::get('/pethotel', [PethotelController::class, 'index'])->name('pethotel.index');

Route::get('/pethotel/create', [PethotelController::class, 'create'])->name('pethotel.create');
Route::post('/pethotel', [PethotelController::class, 'store'])->name('pethotel.store');
Route::get('/pethotel/{id}/edit', [PethotelController::class, 'edit'])->name('pethotel.edit');
Route::put('/pethotel/{id}', [PethotelController::class, 'update'])->name('pethotel.update');
Route::delete('/pethotel/{id}', [PethotelController::class, 'destroy'])->name('pethotel.destroy');
