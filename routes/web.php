<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Invoice;

/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $totalCustomers = Customer::count();

    $totalProducts = Product::count();

    $totalInvoices = Invoice::count();

    $totalSales = Invoice::where('status', 'Paid')
        ->sum('total_amount');

    return view('dashboard', compact(
        'totalCustomers',
        'totalProducts',
        'totalInvoices',
        'totalSales'
    ));

})->name('dashboard');


/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::get('/customers', [CustomerController::class, 'index'])
    ->name('customers.index');

Route::get('/customers/create', [CustomerController::class, 'create'])
    ->name('customers.create');

Route::post('/customers', [CustomerController::class, 'store'])
    ->name('customers.store');

Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])
    ->name('customers.edit');

Route::put('/customers/{id}', [CustomerController::class, 'update'])
    ->name('customers.update');

Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])
    ->name('customers.destroy');


/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('/products/{id}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->name('products.destroy');


/*
|--------------------------------------------------------------------------
| Invoice Routes
|--------------------------------------------------------------------------
*/

Route::get('/invoices', [InvoiceController::class, 'index'])
    ->name('invoices.index');

Route::get('/invoices/create', [InvoiceController::class, 'create'])
    ->name('invoices.create');

Route::post('/invoices', [InvoiceController::class, 'store'])
    ->name('invoices.store');

Route::get('/invoices/{id}/edit', [InvoiceController::class, 'edit'])
    ->name('invoices.edit');

Route::put('/invoices/{id}', [InvoiceController::class, 'update'])
    ->name('invoices.update');

Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])
    ->name('invoices.destroy');


/*
|--------------------------------------------------------------------------
| Reports Routes
|--------------------------------------------------------------------------
*/

Route::get('/reports', [ReportController::class, 'index'])
    ->name('reports.index');

Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])
    ->name('reports.pdf');

Route::get('/reports/excel', [ReportController::class, 'exportExcel'])
    ->name('reports.excel');