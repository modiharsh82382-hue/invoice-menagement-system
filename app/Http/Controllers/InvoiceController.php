<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    // Invoice List
   public function index(Request $request)
    {
        $search = $request->search;

        $invoices = Invoice::when($search, function ($query) use ($search) {

            $query->where('invoice_number', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%");

        })->get();

        return view('invoices.index', compact('invoices'));
    }
    // Add Invoice Page
    public function create()
    {
        return view('invoices.create');
    }

    // Save Invoice
    public function store(Request $request)
    {
        $request->validate([
        'invoice_number' => 'required|unique:invoices,invoice_number',
        'customer_name'  => 'required',
        'invoice_date'   => 'required|date',
        'total_amount'   => 'required|numeric|min:1',
        'status'         => 'required',
    ],  [
            'invoice_number.required' => 'Invoice Number is required.',
            'invoice_number.unique'   => 'This Invoice Number already exists.',
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

    // Edit Invoice
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('invoices.edit', compact('invoice'));
    }

    // Update Invoice
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $request->validate([
            'invoice_number' => 'required|unique:invoices,invoice_number,' . $invoice->id,
            'customer_name'  => 'required',
            'invoice_date'   => 'required|date',
            'total_amount'   => 'required|numeric|min:1',
            'status'         => 'required',
        ],[
            'invoice_number.unique' => 'This Invoice Number already exists.',
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

    // Delete Invoice
    public function destroy($id)
    {
        Invoice::destroy($id);

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice Deleted Successfully.');
    }
}