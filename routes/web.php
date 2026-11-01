<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\SessionController;

/*
|--------------------------------------------------------------------------
| Root Route
|--------------------------------------------------------------------------
| જેવી લિંક ઓપન થાય:
| જો યુઝર લૉગિન ન હોય તો સૌપ્રથમ લૉગિન પેજ પર રિડાયરેક્ટ થશે.
| જો યુઝર પહેલેથી લૉગિન હોય તો હોમ પેજ પર જશે.
*/
Route::get('/', function () {
    return auth()->check() ? redirect()->route('home') : redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Guest Authentication Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('login.store');
});

/*
|--------------------------------------------------------------------------
| Authenticated Workspace Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

    // 1. Home Page (લૉગિન પછીનું મુખ્ય વેલકમ / ઓવરવ્યૂ પેજ)
    Route::view('/home', 'home')->name('home');

    // 2. Dashboard (મુખ્ય એનાલિટિક્સ, સેલ્સ ચાર્ટ અને સ્ટેટ્સ)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 3. Resource & Report Routes
    Route::resource('customers', CustomerController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('invoices', InvoiceController::class)->except(['show']);

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
    Route::get('/reports/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');
});
