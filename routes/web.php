<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('layouts');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');

Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


