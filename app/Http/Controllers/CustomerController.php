<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Customer List
    public function index(Request $request)
    {
        $search = $request->search;

        $customers = Customer::where('customer_name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('phone', 'LIKE', "%$search%")
            ->orWhere('gst_number', 'LIKE', "%$search%")
            ->get();

        return view('customers.index', compact('customers'));
    }

    // Add Customer Form
    public function create()
    {
        return view('customers.create');
    }

    // Save Customer
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|digits:10',
            'address' => 'required|min:5',
            'gst_number' => 'required|size:15|unique:customers,gst_number',
        ]);

        Customer::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gst_number' => strtoupper($request->gst_number),
        ]);

        return redirect('/customers')
            ->with('success', 'Customer Added Successfully.');
    }

    // Edit Customer Form
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.edit', compact('customer'));
    }

    // Update Customer
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'customer_name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'required|digits:10',
            'address' => 'required|min:5',
            'gst_number' => 'required|size:15|unique:customers,gst_number,' . $id,
        ]);

        $customer->update([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gst_number' => strtoupper($request->gst_number),
        ]);

        return redirect('/customers')
            ->with('success', 'Customer Updated Successfully.');
    }

    // Delete Customer
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/customers')
            ->with('success', 'Customer Deleted Successfully.');
    }
}