<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Invoice Management System</title>

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f4f8ff 0%, #eef4ff 50%, #f8fbff 100%);
            min-height: 100vh;
            color: #172033;
        }
        .main-navbar {
            background: linear-gradient(100deg, #1167ed, #1557c8, #1649a5);
            box-shadow: 0 8px 25px rgba(18, 76, 170, 0.18);
            padding: 12px 0;
        }
        .navbar-brand { font-size: 21px; font-weight: 700; color: white !important; }
        .nav-menu { display: flex; align-items: center; gap: 7px; }
        .nav-menu a {
            color: white; text-decoration: none; padding: 9px 13px;
            border-radius: 9px; font-size: 13px; font-weight: 500; transition: 0.2s;
        }
        .nav-menu a:hover { background: rgba(255, 255, 255, 0.15); }
        .nav-menu a.active {
            background: rgba(255, 255, 255, 0.18);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.08);
        }
        .page-wrapper { padding: 32px 0 45px; }
        .product-hero {
            background: linear-gradient(120deg, #123d91 0%, #145fca 48%, #1677f3 100%);
            border-radius: 20px; padding: 27px 30px; color: white; margin-bottom: 24px;
            box-shadow: 0 15px 35px rgba(18, 76, 170, 0.20);
        }
        .summary-card {
            background: white; border: 1px solid #e1e8f2; border-radius: 15px;
            padding: 17px 19px; display: flex; align-items: center; gap: 13px;
            box-shadow: 0 7px 22px rgba(31, 61, 100, 0.06);
        }
        .summary-icon {
            width: 45px; height: 45px; border-radius: 12px; display: flex;
            align-items: center; justify-content: center; font-size: 19px;
        }
        .summary-icon.blue { background: #e8f1ff; color: #1769e8; }
        .summary-icon.green { background: #e8f8ef; color: #198754; }
        .summary-icon.yellow { background: #fff5dc; color: #d89000; }
        .product-card {
            background: white; border: 1px solid #e1e8f2; border-radius: 20px;
            box-shadow: 0 12px 35px rgba(23, 52, 90, 0.07); overflow: hidden;
        }
        .product-card-header {
            padding: 19px 23px; border-bottom: 1px solid #e7edf5;
            display: flex; align-items: center; justify-content: space-between;
        }
        .sku-badge {
            font-family: monospace; background: #f1f5fb; color: #1769e8;
            padding: 4px 8px; border-radius: 6px; font-weight: 600;
        }
        .stock-badge { padding: 6px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; }
        .stock-in { background: #e8f8ef; color: #198754; }
        .stock-out { background: #fff0f1; color: #dc3545; }
        .action-btn {
            width: 32px; height: 32px; border-radius: 7px; display: inline-flex;
            align-items: center; justify-content: center; border: 1px solid; text-decoration: none;
        }
        .edit-btn { color: #c27a00; background: #fff7e5; border-color: #f2dfb2; }
        .delete-btn { color: #dc3545; background: #fff0f1; border-color: #f2cbd0; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('products.index') }}">
            <i class="bi bi-receipt-cutoff me-2"></i>Invoice Management System
        </a>
        <div class="nav-menu">
            <a href="/"><i class="bi bi-house-fill me-1"></i>Home</a>
            <a href="/"><i class="bi bi-bar-chart-line-fill me-1"></i>Dashboard</a>
            <a href="/customers"><i class="bi bi-people-fill me-1"></i>Customers</a>
            <a href="{{ route('products.index') }}" class="active"><i class="bi bi-box-seam-fill me-1"></i>Products</a>
            <a href="/invoices"><i class="bi bi-receipt me-1"></i>Invoices</a>
            <a href="/reports"><i class="bi bi-pie-chart-fill me-1"></i>Reports</a>
        </div>
    </div>
</nav>

<div class="container page-wrapper">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" id="success-alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- HERO -->
    <div class="product-hero">
        <h1 class="fs-3 fw-bold mb-1"><i class="bi bi-box-seam me-2"></i>Product Catalogue</h1>
        <p class="mb-0 opacity-75 small">Manage inventory items, category tags, standard pricing, and real-time stock parameters.</p>
    </div>

    <!-- STATS -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon blue"><i class="bi bi-boxes"></i></div>
                <div>
                    <div class="small text-muted">Total Catalogue</div>
                    <div class="fs-4 fw-bold">{{ $products->count() }} Items</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon green"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                    <div class="small text-muted">In Stock Items</div>
                    <div class="fs-4 fw-bold">{{ $products->where('stock_quantity', '>', 0)->count() }} Items</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon yellow"><i class="bi bi-exclamation-triangle-fill"></i></div>
                <div>
                    <div class="small text-muted">Out of Stock</div>
                    <div class="fs-4 fw-bold">{{ $products->where('stock_quantity', '<=', 0)->count() }} Items</div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD TABLE -->
    <div class="product-card">
        <div class="product-card-header">
            <div>
                <h5 class="fw-bold mb-0">Product Directory</h5>
                <small class="text-muted">Master product list with stock tracking</small>
            </div>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm px-3 fw-semibold">
                <i class="bi bi-plus-circle me-1"></i>Add New Product
            </a>
        </div>

        <!-- SEARCH -->
        <div class="p-3 bg-light border-bottom">
            <form action="{{ route('products.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="Search by product name, SKU or category">
                <button type="submit" class="btn btn-primary btn-sm px-3">Search</button>
                @if(request('search'))
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
                @endif
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase fw-bold text-secondary">
                    <tr>
                        <th class="ps-4">Product Details</th>
                        <th>SKU Code</th>
                        <th>Category</th>
                        <th>Unit Price</th>
                        <th>Inventory</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">{{ $product->product_name }}</div>
                                @if($product->description)
                                    <small class="text-muted">{{ \Illuminate\Support\Str::limit($product->description, 50) }}</small>
                                @endif
                            </td>
                            <td><span class="sku-badge">{{ $product->sku }}</span></td>
                            <td><span class="badge bg-light text-dark border">{{ $product->category }}</span></td>
                            <td class="fw-bold text-dark">₹ {{ number_format($product->price, 2) }}</td>
                            <td>
                                @if($product->stock_quantity > 0)
                                    <span class="stock-badge stock-in"><i class="bi bi-dot"></i>{{ $product->stock_quantity }} In Stock</span>
                                @else
                                    <span class="stock-badge stock-out"><i class="bi bi-dot"></i>Out of Stock</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="action-btn edit-btn" title="Edit Product"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn" title="Delete Product"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-box-seam fs-1 text-primary opacity-50 d-block mb-2"></i>
                                <h6>No Products Found in Inventory</h6>
                                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary mt-2">Add First Product</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer class="text-center py-4 text-muted small">
    © 2026 Invoice Management System | All Rights Reserved
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>