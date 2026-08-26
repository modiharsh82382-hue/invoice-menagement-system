@extends('layouts.app')

@section('content')
<style>
    .product-form-hero { background: linear-gradient(135deg, #1267e8, #174eae); border-radius: 20px; color: #fff; padding: 28px 30px; margin-bottom: 24px; }
    .product-form-card { background: #fff; border-radius: 18px; box-shadow: 0 10px 28px rgba(26, 65, 125, .10); padding: 30px; }
    .form-label { color: #28466e; font-weight: 600; }
</style>

<div class="product-form-hero">
    <h2 class="mb-1"><i class="fa-solid fa-box me-2"></i>@yield('heading')</h2>
    <p class="mb-0 opacity-75">@yield('subheading')</p>
</div>

<div class="product-form-card">
    <form action="@yield('form_action')" method="POST">
        @csrf
        @yield('method')
        <div class="row g-4">
            <div class="col-md-6"><label class="form-label">Product Name <span class="text-danger">*</span></label><input name="product_name" value="{{ old('product_name', $product->product_name ?? '') }}" class="form-control @error('product_name') is-invalid @enderror" autofocus>@error('product_name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
            <div class="col-md-6"><label class="form-label">SKU <span class="text-danger">*</span></label><input name="sku" value="{{ old('sku', $product->sku ?? '') }}" class="form-control @error('sku') is-invalid @enderror" placeholder="e.g. PROD-001">@error('sku')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
            <div class="col-md-6"><label class="form-label">Category <span class="text-danger">*</span></label><input name="category" value="{{ old('category', $product->category ?? '') }}" class="form-control @error('category') is-invalid @enderror" placeholder="e.g. Electronics">@error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
            <div class="col-md-3"><label class="form-label">Price (₹) <span class="text-danger">*</span></label><input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" min="0" step="0.01" class="form-control @error('price') is-invalid @enderror">@error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
            <div class="col-md-3"><label class="form-label">Stock Quantity <span class="text-danger">*</span></label><input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity ?? 0) }}" min="0" step="1" class="form-control @error('stock_quantity') is-invalid @enderror">@error('stock_quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
            <div class="col-12"><label class="form-label">Description</label><textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Optional product details">{{ old('description', $product->description ?? '') }}</textarea>@error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top"><a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a><button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk me-1"></i>@yield('button_text')</button></div>
    </form>
</div>
@endsection
