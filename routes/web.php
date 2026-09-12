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
    $currentMonthStart = now()->startOfMonth()->toDateString();
    $currentMonthEnd   = now()->endOfMonth()->toDateString();

    $currentMonthSales = Invoice::where('status', 'Paid')
        ->whereBetween('invoice_date', [$currentMonthStart, $currentMonthEnd])
        ->sum('total_amount');

    // 4. Previous Month Sales
    $currentMonth = now()->startOfMonth();

    $currentMonthStart = $currentMonth->toDateString();
    $currentMonthEnd   = $currentMonth->copy()->endOfMonth()->toDateString();

    $previousMonth = $currentMonth->copy()->subMonth();

    $previousMonthStart = $previousMonth->toDateString();
    $previousMonthEnd   = $previousMonth->copy()->endOfMonth()->toDateString();

    $lastMonthSales = Invoice::where('status', 'Paid')
        ->whereBetween('invoice_date', [$previousMonthStart, $previousMonthEnd])
        ->sum('total_amount');

    // 5. Revenue Growth Percentage
    $revenueGrowth = 0;
    if ($lastMonthSales > 0) {
        $revenueGrowth = round((($currentMonthSales - $lastMonthSales) / $lastMonthSales) * 100, 1);
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
        ->select('customer_name', DB::raw('SUM(total_amount) as total_amount'))
        ->groupBy('customer_name')
        ->orderByDesc('total_amount')
        ->take(5)
        ->get();

    // 8. Last 6 Months Revenue (MariaDB / SQL syntax error વગર Collection દ્વારા)
    $sixMonthsAgo = now()->subMonths(5)->startOfMonth()->toDateString();

    $invoices = Invoice::where('status', 'Paid')
        ->where('invoice_date', '>=', $sixMonthsAgo)
        ->select('invoice_date', 'total_amount')
        ->get();

    $monthlyData = $invoices->groupBy(function ($item) {
        return \Carbon\Carbon::parse($item->invoice_date)->format('Y-m');
    })->map(function ($row) {
        return $row->sum('total_amount');
    });

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