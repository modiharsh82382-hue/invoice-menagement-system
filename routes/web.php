<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Invoice;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/', function () {

    // 1. Basic Counts
    $totalCustomers = Customer::count();
    $totalProducts  = Product::count();

    // 2. Invoice Statistics (હાલની ઉપલબ્ધ કોલમ્સ મુજબ)
    $invoiceStats = Invoice::selectRaw("
        COUNT(*) as total_invoices,
        COALESCE(SUM(CASE WHEN status = 'Paid' THEN total_amount ELSE 0 END), 0) as total_sales,
        COALESCE(SUM(CASE WHEN status = 'Pending' THEN total_amount ELSE 0 END), 0) as outstanding_amount,
        COALESCE(SUM(CASE WHEN status = 'Paid' THEN 1 ELSE 0 END), 0) as paid_invoices,
        COALESCE(SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END), 0) as pending_invoices
    ")->first();

    // 3. Current Month Sales
    $currentMonth = now()->startOfMonth();
    $currentMonthEnd = $currentMonth->copy()->endOfMonth();

    $currentMonthSales = Invoice::where('status', 'Paid')
        ->whereBetween('invoice_date', [
            $currentMonth->toDateString(),
            $currentMonthEnd->toDateString()
        ])
        ->sum('total_amount');


    // 4. Previous Month Sales
    $previousMonth = $currentMonth->copy()->subMonth();
    $previousMonthEnd = $previousMonth->copy()->endOfMonth();

    $lastMonthSales = Invoice::where('status', 'Paid')
        ->whereBetween('invoice_date', [
            $previousMonth->toDateString(),
            $previousMonthEnd->toDateString()
        ])
        ->sum('total_amount');


    // 5. Revenue Growth Percentage
    $revenueGrowth = 0;

    if ($lastMonthSales > 0) {
        $revenueGrowth = round(
        (
            ($currentMonthSales - $lastMonthSales)
            / $lastMonthSales
        ) * 100,
            1
        );
    } elseif ($currentMonthSales > 0) {
        $revenueGrowth = 100;
    }


    // 6. Recent Invoices
    $recentInvoices = Invoice::orderByDesc('invoice_date')
        ->orderByDesc('id')
        ->take(5)
        ->get();


    // 7. Top 5 Customers
    $topCustomers = Invoice::where('status', 'Paid')
        ->select(
        'customer_name',
        DB::raw('SUM(total_amount) as total_amount')
        )
        ->groupBy('customer_name')
        ->orderByDesc('total_amount')
        ->take(5)
        ->get();


    // 8. Last 6 Months Revenue
    $sixMonthsAgo = now()->startOfMonth()->subMonths(5);

    $monthlyData = Invoice::where('status', 'Paid')
        ->where('invoice_date', '>=', $sixMonthsAgo->toDateString())
        ->selectRaw("
            DATE_FORMAT(invoice_date, '%Y-%m') as month_key,
            SUM(total_amount) as revenue
        ")
        ->groupByRaw("DATE_FORMAT(invoice_date, '%Y-%m')")
        ->orderByRaw("DATE_FORMAT(invoice_date, '%Y-%m') ASC")
        ->pluck('revenue', 'month_key');


        // 9. Prepare Chart Data
    $monthlyLabels = [];
    $monthlyRevenue = [];

    for ($i = 5; $i >= 0; $i--) {

        $month = now()->startOfMonth()->subMonths($i);
        $monthKey = $month->format('Y-m');

        $monthlyLabels[] = $month->format('M');

        $monthlyRevenue[] = (float) (
            $monthlyData->get($monthKey, 0)
        );
    }

    $monthlyLabels  = [];
    $monthlyRevenue = [];

    for ($i = 5; $i >= 0; $i--) {
        $month = now()->subMonths($i);
        $monthKey = $month->format('Y-m');

        $monthlyLabels[]  = $month->format('M');
        $monthlyRevenue[] = (float) ($monthlyData->get($monthKey, 0));
    }

    // 9. Send Data to Dashboard View
    return view('dashboard', [
        'totalCustomers'    => $totalCustomers,
        'totalProducts'     => $totalProducts,
        'totalInvoices'     => (int) ($invoiceStats->total_invoices ?? 0),
        'totalSales'        => (float) ($invoiceStats->total_sales ?? 0),
        'outstandingAmount' => (float) ($invoiceStats->outstanding_amount ?? 0),
        'paidInvoices'      => (int) ($invoiceStats->paid_invoices ?? 0),
        'pendingInvoices'   => (int) ($invoiceStats->pending_invoices ?? 0),
        'currentMonthSales' => (float) $currentMonthSales,
        'lastMonthSales'    => (float) $lastMonthSales,
        'revenueGrowth'     => (float) $revenueGrowth,
        'recentInvoices'    => $recentInvoices,
        'topCustomers'      => $topCustomers,
        'monthlyLabels'     => $monthlyLabels,
        'monthlyRevenue'    => $monthlyRevenue,
    ]);

})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Resource & Report Routes
|--------------------------------------------------------------------------
*/
Route::resource('customers', CustomerController::class)->except(['show']);
Route::resource('products', ProductController::class)->except(['show']);
Route::resource('invoices', InvoiceController::class)->except(['show']);

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
Route::get('/reports/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');