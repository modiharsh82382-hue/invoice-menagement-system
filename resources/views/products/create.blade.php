<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Invoice Management System</title>

    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f4f8ff 0%, #eef4ff 50%, #f8fbff 100%);
            min-height: 100vh;
            color: #172033;
        }

        /* NAVBAR */
        .main-navbar {
            background: linear-gradient(100deg, #1167ed, #1557c8, #1649a5);
            box-shadow: 0 8px 25px rgba(18, 76, 170, 0.18);
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: white !important;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .nav-menu a.active {
            background: rgba(255, 255, 255, 0.22);
        }

        /* PAGE HEADER */
        .header-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #123d91 0%, #145fca 48%, #1677f3 100%);
            border-radius: 20px;
            padding: 27px 30px;
            color: white;
            margin-bottom: 24px;
            box-shadow: 0 15px 35px rgba(18, 76, 170, 0.20);
        }

        .header-hero::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            right: -75px;
            top: -110px;
        }

        .hero-title {
            font-size: 26px;
            font-weight: 700;
            margin: 0 0 5px;
        }

        .hero-subtitle {
            margin: 0;
            font-size: 13px;
            opacity: 0.88;
        }

        /* FORM CARD */
        .form-card {
            background: white;
            border: 1px solid #e1e8f2;
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(23, 52, 90, 0.07);
            padding: 28px;
        }

        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: #27344a;
            margin-bottom: 6px;
        }

        .input-group-text {
            background: #f8fbff;
            border: 1px solid #dbe3ef;
            border-right: none;
            color: #1769e8;
            font-size: 14px;
            border-radius: 8px 0 0 8px;
        }

        .form-control, .form-select {
            border: 1px solid #dbe3ef;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            color: #172033;
        }

        .input-group .form-control, .input-group .form-select {
            border-left: none;
            border-radius: 0 8px 8px 0;
        }

        .form-control:focus, .form-select:focus {
            border-color: #1769e8;
            box-shadow: 0 0 0 3px rgba(23, 105, 232, 0.12);
        }

        /* LIVE PREVIEW CARD */
        .live-preview-card {
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
            background: #ffffff;
            padding: 24px;
            position: sticky;
            top: 90px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.03);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            background: #e8f1ff;
            color: #1769e8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
        }

        .sku-badge-live {
            font-family: monospace;
            background: #f1f5fb;
            color: #1769e8;
            padding: 3px 8px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 11px;
        }

        .stock-pill {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .stock-pill-in { background: #e8f8ef; color: #198754; }
        .stock-pill-out { background: #fff0f1; color: #dc3545; }

        .btn-action-primary {
            background: linear-gradient(135deg, #1769e8, #1054c4);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 5px 13px rgba(23, 105, 232, 0.18);
            transition: 0.2s;
        }

        .btn-action-primary:hover {
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(23, 105, 232, 0.25);
        }

        .btn-action-secondary {
            background: #f1f4f8;
            border: 1px solid #dce3ec;
            color: #435166;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-action-secondary:hover {
            background: #e4e9f0;
            color: #172033;
        }

        .btn-demo {
            background: #f8fafc;
            color: #64748b;
            border: 1px dashed #94a3b8;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-demo:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        /* FOOTER */
        .page-footer {
            text-align: center;
            padding: 25px 0 15px;
            color: #8490a3;
            font-size: 12px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('products.index') }}">
            <i class="bi bi-receipt-cutoff me-2"></i>Invoice Management System
        </a>
        <div class="nav-menu ms-auto">
            <a href="/"><i class="bi bi-house-fill me-1"></i>Home</a>
            <a href="/"><i class="bi bi-bar-chart-line-fill me-1"></i>Dashboard</a>
            <a href="/customers"><i class="bi bi-people-fill me-1"></i>Customers</a>
            <a href="{{ route('products.index') }}" class="active"><i class="bi bi-box-seam-fill me-1"></i>Products</a>
            <a href="/invoices"><i class="bi bi-receipt me-1"></i>Invoices</a>
            <a href="/reports"><i class="bi bi-pie-chart-fill me-1"></i>Reports</a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container py-5">

    <!-- HERO HEADER -->
    <div class="header-hero">
        <div class="d-flex align-items-center mb-1">
            <i class="bi bi-plus-square-dotted fs-3 me-2"></i>
            <h1 class="hero-title">Add New Product</h1>
        </div>
        <p class="hero-subtitle">Register inventory catalogue entries with SKU parameters, automated pricing, and stock metrics.</p>
    </div>

    <div class="row g-4">
        <!-- FORM COLUMN -->
        <div class="col-lg-8">
            <div class="form-card">
                <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
                    <div>
                        <h5 class="fw-bold mb-0"><i class="bi bi-box-seam text-primary me-2"></i>Product Details Form</h5>
                        <small class="text-muted">Enter master inventory details for billing</small>
                    </div>
                    <button type="button" class="btn-demo" onclick="autoFillDemo()">
                        <i class="bi bi-magic me-1"></i>Auto Fill Demo
                    </button>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Validation Alert:</strong>
                        <ul class="mb-0 mt-2 ps-3 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" id="productForm">
                    @csrf

                    <div class="row g-3">
                        <!-- PRODUCT NAME -->
                        <div class="col-md-6">
                            <label class="form-label">Product Name <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                <input type="text"
                                       id="in_name"
                                       name="product_name"
                                       class="form-control @error('product_name') is-invalid @enderror"
                                       placeholder="e.g. Wireless Mechanical Keyboard"
                                       value="{{ old('product_name') }}"
                                       required>
                            </div>
                            @error('product_name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- SKU IDENTIFIER -->
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label">SKU Identifier <span class="text-danger">*</span></label>
                                <a href="javascript:void(0)" onclick="generateSKU()" class="text-primary small text-decoration-none fw-semibold">
                                    <i class="bi bi-arrow-repeat me-1"></i>Auto Generate
                                </a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                <input type="text"
                                       id="in_sku"
                                       name="sku"
                                       class="form-control text-uppercase @error('sku') is-invalid @enderror"
                                       placeholder="e.g. PROD-1001"
                                       value="{{ old('sku') }}"
                                       required>
                            </div>
                            @error('sku')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-folder2-open"></i></span>
                                <input type="text"
                                       id="in_category"
                                       name="category"
                                       list="categoryList"
                                       class="form-control @error('category') is-invalid @enderror"
                                       placeholder="Choose or type category"
                                       value="{{ old('category') }}"
                                       required>
                                <datalist id="categoryList">
                                    <option value="Electronics & IT">
                                    <option value="Computer Hardware">
                                    <option value="Office Stationery">
                                    <option value="Software & Licenses">
                                    <option value="Accessories">
                                    <option value="Services & Maintenance">
                                </datalist>
                            </div>
                            @error('category')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- UNIT PRICE -->
                        <div class="col-md-3">
                            <label class="form-label">Unit Price (INR) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text fw-bold">₹</span>
                                <input type="number"
                                       step="0.01"
                                       min="0"
                                       id="in_price"
                                       name="price"
                                       class="form-control fw-bold @error('price') is-invalid @enderror"
                                       placeholder="0.00"
                                       value="{{ old('price') }}"
                                       required>
                            </div>
                            @error('price')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- STOCK UNITS -->
                        <div class="col-md-3">
                            <label class="form-label">Stock Units <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-boxes"></i></span>
                                <input type="number"
                                       min="0"
                                       step="1"
                                       id="in_stock"
                                       name="stock_quantity"
                                       class="form-control @error('stock_quantity') is-invalid @enderror"
                                       placeholder="0"
                                       value="{{ old('stock_quantity', 0) }}"
                                       required>
                            </div>
                            @error('stock_quantity')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="col-12">
                            <label class="form-label">Product Description</label>
                            <div class="input-group">
                                <span class="input-group-text align-items-start pt-2"><i class="bi bi-text-paragraph"></i></span>
                                <textarea id="in_desc"
                                          name="description"
                                          rows="3"
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Optional product specifications, HSN code, warranty terms...">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- ACTIONS -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('products.index') }}" class="btn btn-action-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Cancel & Back
                        </a>
                        <button type="submit" class="btn btn-action-primary">
                            <i class="bi bi-check-circle me-1"></i>Save Product Data
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- RIGHT: LIVE PREVIEW CARD -->
        <div class="col-lg-4">
            <div class="live-preview-card text-center">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-primary text-uppercase px-2 py-1" style="font-size: 10px;">Live View Card</span>
                    <span class="text-warning small fw-bold"><i class="bi bi-lightning-fill me-1"></i>Real-time</span>
                </div>

                <div class="icon-box mx-auto mb-3">
                    <i class="bi bi-box-seam"></i>
                </div>

                <h5 class="fw-bold text-dark mb-1" id="preview_name">Product Name</h5>
                <p class="text-muted small mb-2" id="preview_category">Uncategorized</p>

                <div class="mb-3">
                    <span class="sku-badge-live" id="preview_sku">SKU: PROD-XXXX</span>
                </div>

                <hr class="my-3 text-muted opacity-25">

                <div class="d-flex flex-column gap-2 text-secondary small text-start">
                    <div class="d-flex justify-content-between">
                        <span><i class="bi bi-boxes text-primary me-2"></i>Stock Level:</span>
                        <span id="preview_stock_badge" class="stock-pill stock-pill-out">Out of Stock</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                        <span class="fw-semibold text-dark"><i class="bi bi-currency-rupee text-success me-1"></i>Unit Price:</span>
                        <strong class="fs-5 text-success" id="preview_price">₹ 0.00</strong>
                    </div>
                    <div class="pt-2 border-top">
                        <span class="text-muted small d-block mb-1">Description:</span>
                        <p class="text-dark small mb-0" id="preview_desc" style="font-size: 11px;">No description provided.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="page-footer">
    <i class="bi bi-receipt-cutoff me-1"></i>
    © 2026 Invoice Management System | All Rights Reserved
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Live Sync & Helpers Script -->
<script>
    const inName = document.getElementById('in_name');
    const inSku = document.getElementById('in_sku');
    const inCategory = document.getElementById('in_category');
    const inPrice = document.getElementById('in_price');
    const inStock = document.getElementById('in_stock');
    const inDesc = document.getElementById('in_desc');

    const previewName = document.getElementById('preview_name');
    const previewSku = document.getElementById('preview_sku');
    const previewCategory = document.getElementById('preview_category');
    const previewPrice = document.getElementById('preview_price');
    const previewStockBadge = document.getElementById('preview_stock_badge');
    const previewDesc = document.getElementById('preview_desc');

    function updatePreview() {
        previewName.textContent = inName.value.trim() || 'Product Name';
        previewSku.textContent = inSku.value.trim() ? 'SKU: ' + inSku.value.trim().toUpperCase() : 'SKU: PROD-XXXX';
        previewCategory.textContent = inCategory.value.trim() || 'Uncategorized';

        const priceVal = parseFloat(inPrice.value);
        previewPrice.textContent = isNaN(priceVal) ? '₹ 0.00' : '₹ ' + priceVal.toFixed(2);

        const stockVal = parseInt(inStock.value);
        if (!isNaN(stockVal) && stockVal > 0) {
            previewStockBadge.className = 'stock-pill stock-pill-in';
            previewStockBadge.innerHTML = `<i class="bi bi-check-circle-fill me-1"></i>${stockVal} In Stock`;
        } else {
            previewStockBadge.className = 'stock-pill stock-pill-out';
            previewStockBadge.innerHTML = `<i class="bi bi-x-circle-fill me-1"></i>Out of Stock`;
        }

        previewDesc.textContent = inDesc.value.trim() ? (inDesc.value.length > 70 ? inDesc.value.substring(0, 70) + '...' : inDesc.value) : 'No description provided.';
    }

    function generateSKU() {
        const randomNum = Math.floor(1000 + Math.random() * 9000);
        inSku.value = 'PROD-' + randomNum;
        updatePreview();
    }

    function autoFillDemo() {
        inName.value = 'Dell 24-inch FHD IPS Monitor';
        inSku.value = 'PROD-2045';
        inCategory.value = 'Electronics & IT';
        inPrice.value = '12499.00';
        inStock.value = '15';
        inDesc.value = '75Hz refresh rate, HDMI/VGA ports with 3-year onsite hardware warranty.';
        updatePreview();
    }

    [inName, inSku, inCategory, inPrice, inStock, inDesc].forEach(element => {
        element.addEventListener('input', updatePreview);
    });

    document.addEventListener("DOMContentLoaded", updatePreview);
</script>

</body>
</html>
