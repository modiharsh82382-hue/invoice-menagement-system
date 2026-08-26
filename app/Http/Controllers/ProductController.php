<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Product List with Real-time Search
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('product_name', 'LIKE', "%{$search}%")
                      ->orWhere('sku', 'LIKE', "%{$search}%")
                      ->orWhere('category', 'LIKE', "%{$search}%");
                });
            })
            ->latest('id')
            ->get();

        return view('products.index', compact('products'));
    }

    // Add Product Form
    public function create()
    {
        return view('products.create');
    }

    // Save Product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name'   => 'required|string|min:2|max:150',
            'sku'            => 'required|string|max:50|unique:products,sku',
            'category'       => 'required|string|max:100',
            'price'          => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description'    => 'nullable|string|max:1000',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product Added Successfully.');
    }

    // Edit Product Form
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    // Update Product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_name'   => 'required|string|min:2|max:150',
            'sku'            => 'required|string|max:50|unique:products,sku,' . $product->id,
            'category'       => 'required|string|max:100',
            'price'          => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description'    => 'nullable|string|max:1000',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product Updated Successfully.');
    }

    // Delete Product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product Deleted Successfully.');
    }
}