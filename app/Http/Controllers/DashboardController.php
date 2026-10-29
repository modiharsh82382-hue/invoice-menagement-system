<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $invoiceStats = Invoice::selectRaw("COUNT(*) as total_invoices, COALESCE(SUM(CASE WHEN status = 'Paid' THEN total_amount ELSE 0 END), 0) as total_sales, COALESCE(SUM(CASE WHEN status = 'Pending' THEN total_amount ELSE 0 END), 0) as outstanding_amount, COALESCE(SUM(CASE WHEN status = 'Paid' THEN 1 ELSE 0 END), 0) as paid_invoices, COALESCE(SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END), 0) as pending_invoices")->first();
        $month = now()->startOfMonth();
        $currentMonthSales = Invoice::where('status', 'Paid')->whereBetween('invoice_date', [$month->toDateString(), $month->copy()->endOfMonth()->toDateString()])->sum('total_amount');
        $previousMonth = $month->copy()->subMonth();
        $lastMonthSales = Invoice::where('status', 'Paid')->whereBetween('invoice_date', [$previousMonth->toDateString(), $previousMonth->copy()->endOfMonth()->toDateString()])->sum('total_amount');
        $revenueGrowth = $lastMonthSales > 0 ? round((($currentMonthSales - $lastMonthSales) / $lastMonthSales) * 100, 1) : ($currentMonthSales > 0 ? 100 : 0);
        $monthlyData = Invoice::where('status', 'Paid')
            ->where('invoice_date', '>=', now()->startOfMonth()->subMonths(5)->toDateString())
            ->selectRaw("DATE_FORMAT(invoice_date, '%Y-%m') as month_key, SUM(total_amount) as revenue")
            ->groupByRaw("DATE_FORMAT(invoice_date, '%Y-%m')")
            ->pluck('revenue', 'month_key');
        $months = collect(range(5, 0))->map(fn ($offset) => now()->startOfMonth()->subMonths($offset));

        return view('dashboard', [
            'totalCustomers' => Customer::count(),
            'totalProducts' => Product::count(),
            'totalInvoices' => (int) $invoiceStats->total_invoices,
            'totalSales' => (float) $invoiceStats->total_sales,
            'outstandingAmount' => (float) $invoiceStats->outstanding_amount,
            'paidInvoices' => (int) $invoiceStats->paid_invoices,
            'pendingInvoices' => (int) $invoiceStats->pending_invoices,
            'currentMonthSales' => (float) $currentMonthSales,
            'lastMonthSales' => (float) $lastMonthSales,
            'revenueGrowth' => (float) $revenueGrowth,
            'recentInvoices' => Invoice::orderByDesc('invoice_date')->orderByDesc('id')->take(5)->get(),
            'topCustomers' => Invoice::where('status', 'Paid')->select('customer_name', DB::raw('SUM(total_amount) as total_amount'))->groupBy('customer_name')->orderByDesc('total_amount')->take(5)->get(),
            'monthlyLabels' => $months->map(fn ($date) => $date->format('M'))->all(),
            'monthlyRevenue' => $months->map(fn ($date) => (float) $monthlyData->get($date->format('Y-m'), 0))->all(),
        ]);
    }
}
