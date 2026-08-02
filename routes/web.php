<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/invoices', [InvoiceController::class, 'index']);

Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');

Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');

Route::get('/invoices/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');

Route::put('/invoices/{id}', [InvoiceController::class, 'update'])->name('invoices.update');

Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');