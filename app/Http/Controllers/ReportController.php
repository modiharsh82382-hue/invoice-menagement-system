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

        $invoices = $this->filteredInvoices($request)->latest()->get();

        return view('reports.index-shared', compact(
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
        $invoices = $this->filteredInvoices($request)->latest()->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'reports.pdf',
            compact('invoices')
        );

        return $pdf->download('Invoice_Report.pdf');
    }
    public function exportExcel(Request $request)
    {
        $filename = 'Invoice_Report_' . now()->format('Ymd_His') . '.csv';

        return response()->streamDownload(function () use ($request) {
            $output = fopen('php://output', 'w');
            fwrite($output, "\xEF\xBB\xBF");
            fputcsv($output, ['Invoice Number', 'Customer', 'Invoice Date', 'Total Amount (INR)', 'Status']);

            foreach ($this->filteredInvoices($request)->orderBy('invoice_date')->orderBy('id')->cursor() as $invoice) {
                fputcsv($output, [
                    $this->spreadsheetSafeValue($invoice->invoice_number),
                    $this->spreadsheetSafeValue($invoice->customer_name),
                    $invoice->invoice_date,
                    number_format((float) $invoice->total_amount, 2, '.', ''),
                    $invoice->status,
                ]);
            }

            fclose($output);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Cache-Control' => 'no-store, no-cache',
        ]);
    }

    private function filteredInvoices(Request $request)
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:Paid,Pending'],
            'from_date' => ['nullable', 'date'],
            'to_date' => ['nullable', 'date', 'after_or_equal:from_date'],
        ]);

        return Invoice::query()
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where(function ($nested) use ($search) {
                    $nested->where('invoice_number', 'like', "%{$search}%")
                        ->orWhere('customer_name', 'like', "%{$search}%");
                });
            })
            ->when($filters['status'] ?? null, fn ($query, $status) => $query->where('status', $status))
            ->when($filters['from_date'] ?? null, fn ($query, $date) => $query->whereDate('invoice_date', '>=', $date))
            ->when($filters['to_date'] ?? null, fn ($query, $date) => $query->whereDate('invoice_date', '<=', $date));
    }

    private function spreadsheetSafeValue(string $value): string
    {
        return preg_match('/^[\s]*[=+@\-]/u', $value) === 1 ? "'" . $value : $value;
    }
}
