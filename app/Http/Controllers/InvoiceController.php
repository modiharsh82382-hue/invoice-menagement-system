<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Customer;

class InvoiceController extends Controller
{
    // 1. Invoice List with Search & Counters
    public function index(Request $request)
    {
        $search = $request->search;

        $invoices = Invoice::when($search, function ($query) use ($search) {
            $query->where('invoice_number', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('invoices.index', compact('invoices'));
    }

    // 2. Add Invoice Page (Auto Invoice Number + Customer List)
    public function create()
    {
        // Fetch all customers for the dynamic dropdown
        $customers = Customer::orderBy('customer_name', 'asc')->get();

        // Auto Generate Invoice Number (e.g. INV-0001, INV-0002)
        $lastInvoice = Invoice::latest('id')->first();
        if ($lastInvoice && preg_match('/INV-(\d+)/', $lastInvoice->invoice_number, $matches)) {
            $number = (int)$matches[1] + 1;
            $invoiceNumber = 'INV-' . str_pad($number, 4, '0', STR_PAD_LEFT);
        } else {
            $invoiceNumber = 'INV-0001';
        }

        return view('invoices.create', compact('customers', 'invoiceNumber'));
    }

    // 3. Save Invoice with Validation
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'customer_name'  => 'required',
            'invoice_date'   => 'required|date',
            'total_amount'   => 'required|numeric|min:1',
            'status'         => 'required|in:Pending,Paid',
        ], [
            'invoice_number.required' => 'Invoice Number is required.',
            'invoice_number.unique'   => 'This Invoice Number already exists.',
            'customer_name.required'  => 'Please select a customer.',
            'invoice_date.required'   => 'Invoice Date is required.',
            'total_amount.required'   => 'Total Amount is required.',
            'total_amount.numeric'    => 'Total Amount must be a valid number.',
            'total_amount.min'        => 'Total Amount must be greater than 0.',
        ]);

        Invoice::create([
            'invoice_number' => $request->invoice_number,
            'customer_name'  => $request->customer_name,
            'invoice_date'   => $request->invoice_date,
            'total_amount'   => $request->total_amount,
            'status'         => $request->status,
        ]);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice Added Successfully.');
    }

    // 4. Edit Invoice Page
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $customers = Customer::orderBy('customer_name', 'asc')->get();

        return view('invoices.edit', compact('invoice', 'customers'));
    }

    // 5. Update Invoice
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $request->validate([
            'invoice_number' => 'required|unique:invoices,invoice_number,' . $invoice->id,
            'customer_name'  => 'required',
            'invoice_date'   => 'required|date',
            'total_amount'   => 'required|numeric|min:1',
            'status'         => 'required|in:Pending,Paid',
        ], [
            'invoice_number.unique'  => 'This Invoice Number already exists.',
            'customer_name.required' => 'Please select a customer.',
            'total_amount.min'       => 'Total Amount must be greater than 0.',
        ]);

        $invoice->update([
            'invoice_number' => $request->invoice_number,
            'customer_name'  => $request->customer_name,
            'invoice_date'   => $request->invoice_date,
            'total_amount'   => $request->total_amount,
            'status'         => $request->status,
        ]);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice Updated Successfully.');
    }

    // 6. Delete Invoice
    public function destroy($id)
    {
        Invoice::destroy($id);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice Deleted Successfully.');
    }
}