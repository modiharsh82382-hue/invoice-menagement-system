<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $totalCustomers = Customer::count();

        $totalInvoices = Invoice::count();

        $paidInvoices = Invoice::where('status', 'Paid')->count();

        $pendingInvoices = Invoice::where('status', 'Pending')->count();

        $totalRevenue = Invoice::where('status', 'Paid')->sum('total_amount');

        // Invoice Search + Filter
        $query = Invoice::query();

        // Search by Invoice Number or Customer
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('invoice_number', 'like', '%' . $search . '%')
                  ->orWhere('customer_name', 'like', '%' . $search . '%');
            });
        }

        // Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // From Date
        if ($request->filled('from_date')) {
            $query->whereDate('invoice_date', '>=', $request->from_date);
        }

        // To Date
        if ($request->filled('to_date')) {
            $query->whereDate('invoice_date', '<=', $request->to_date);
        }

        $invoices = $query->latest()->get();

        return view('reports.index', compact(
            'totalCustomers',
            'totalInvoices',
            'paidInvoices',
            'pendingInvoices',
            'totalRevenue',
            'invoices'
        ));
    }

   public function exportPdf(Request $request)
    {
        $query = Invoice::query();

    // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('invoice_number', 'like', '%' . $search . '%')
                ->orWhere('customer_name', 'like', '%' . $search . '%');
            });
        }

    // Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

    // From Date
        if ($request->filled('from_date')) {
            $query->whereDate('invoice_date', '>=', $request->from_date);
        }

    // To Date
        if ($request->filled('to_date')) {
            $query->whereDate('invoice_date', '<=', $request->to_date);
        }

        $invoices = $query->latest()->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'reports.pdf',
            compact('invoices')
        );

        return $pdf->download('Invoice_Report.pdf');
    }
    public function exportExcel()
    {
        return response()->download(
            public_path('sample-report.xlsx'),
            'Invoice_Report.xlsx'
        );
    }
}