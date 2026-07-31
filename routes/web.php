<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/customers', [CustomerController::class, 'index']);

Route::get('/customers/create', [CustomerController::class, 'create']);

Route::post('/customers', [CustomerController::class, 'store']);

Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');

Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
