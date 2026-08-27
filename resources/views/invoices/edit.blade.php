<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Invoice | Invoice Management System</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

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
        .main-navbar {
            position: sticky;
            top: 0;
            z-index: 1030;
            background: linear-gradient(100deg, #102f72, #1557c8, #1677f3);
            box-shadow: 0 8px 25px rgba(18, 76, 170, 0.25);
            padding: 11px 0;
        }
        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: white !important;
        }
        .navbar-brand i {
            font-size: 22px;
            margin-right: 8px;
        }
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap;
        }
        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .nav-menu a:hover {
            background: rgba(255,255,255,0.16);
            color: white;
            transform: translateY(-1px);
        }
        .nav-menu a.active {
            background: rgba(255,255,255,0.20);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.10);
        }
        .nav-menu i {
            margin-right: 5px;
        }
        .page-wrapper {
            padding: 32px 0 50px;
        }
        .header-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #102f72 0%, #145fca 48%, #1677f3 100%);
            border-radius: 20px;
            padding: 27px 30px;
            color: white;
            margin-bottom: 24px;
            box-shadow: 0 15px 35px rgba(18, 76, 170, 0.20);
        }
        .header-hero::before {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            right: -80px;
            top: -115px;
        }
        .header-hero::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            right: 120px;
            bottom: -70px;
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
        .form-card {
            background: white;
            border: 1px solid #e1e8f2;
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(23, 52, 90, 0.08);
            overflow: hidden;
            padding: 30px;
        }
        .card-heading {
            border-bottom: 1px solid #e7edf5;
            padding-bottom: 18px;
            margin-bottom: 24px;
        }
        .card-heading h5 {
            font-size: 17px;
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
            font-size: 15px;
            border-radius: 8px 0 0 8px;
            min-width: 44px;
            justify-content: center;
        }
        .money-icon, .payment-icon {
            font-size: 18px !important;
            font-weight: 700 !important;
            color: #0d6efd !important;
        }
        .form-control, .form-select {
            border: 1px solid #dbe3ef;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            color: #172033;
            transition: all 0.2s ease;
        }
        .input-group .form-control, .input-group .form-select {
            border-left: none;
            border-radius: 0 8px 8px 0;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1769e8;
            box-shadow: 0 0 0 3px rgba(23,105,232,0.12);
        }
        .amount-field {
            font-size: 15px !important;
            font-weight: 700 !important;
            color: #123d91 !important;
        }
        .status-select {
            font-weight: 600;
        }
        .btn-update {
            background: linear-gradient(135deg, #1769e8, #1054c4);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 5px 13px rgba(23,105,232,0.18);
            transition: all 0.2s ease;
        }
        .btn-update:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(23,105,232,0.28);
        }
        .btn-back {
            background: #f1f4f8;
            border: 1px solid #dce3ec;
            color: #435166;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .btn-back:hover {
            background: #e4e9f0;
            color: #172033;
            transform: translateY(-1px);
        }
        .invoice-badge {
            background: linear-gradient(135deg, #1769e8, #123d91);
            color: white;
            padding: 9px 15px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 5px 12px rgba(18,61,145,0.18);
        }
        .page-footer {
            text-align: center;
            padding: 25px 0 15px;
            color: #8490a3;
            font-size: 12px;
        }
        @media (max-width: 991px) {
            .main-navbar {
                position: sticky;
            }
            .nav-menu {
                margin-top: 10px;
                justify-content: center;
                width: 100%;
            }
            .nav-menu a {
                font-size: 12px;
                padding: 7px 9px;
            }
            .hero-title {
                font-size: 22px;
            }
            .form-card {
                padding: 22px;
            }
        }
        @media (max-width: 576px) {
            .nav-menu {
                gap: 3px;
            }
            .nav-menu a {
                padding: 6px 7px;
                font-size: 11px;
            }
            .nav-menu i {
                margin-right: 2px;
            }
            .header-hero {
                padding: 22px;
            }
            .hero-title {
                font-size: 20px;
            }
            .form-card {
                padding: 18px;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('invoices.index') }}">
            <i class="bi bi-receipt-cutoff"></i>
            Invoice Management System
        </a>
        <div class="nav-menu">
            <a href="/"><i class="bi bi-house-fill"></i> Home</a>
            <a href="/"><i class="bi bi-bar-chart-line-fill"></i> Dashboard</a>
            <a href="/customers"><i class="bi bi-people-fill"></i> Customers</a>
            <a href="/products"><i class="bi bi-box-seam-fill"></i> Products</a>
            <a href="{{ route('invoices.index') }}" class="active"><i class="bi bi-receipt-cutoff"></i> Invoices</a>
            <a href="/reports"><i class="bi bi-pie-chart-fill"></i> Reports</a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container page-wrapper">
    <!-- HERO HEADER -->
    <div class="header-hero">
        <h1 class="hero-title"><i class="bi bi-pencil-square me-2"></i>Edit Invoice</h1>
        <p class="hero-subtitle">Update customer billing information, invoice details and payment status.</p>
    </div>

    <!-- FORM CARD -->
    <div class="form-card">
        <div class="card-heading d-flex justify-content-between align-items-center">
            <div>
                <h5 class="fw-bold mb-1"><i class="bi bi-file-earmark-ruled text-primary me-2"></i>Invoice Details</h5>
                <small class="text-muted">Modify the required information and save your changes.</small>
            </div>
            <span class="invoice-badge">
                <i class="bi bi-hash me-1"></i>{{ $invoice->invoice_number }}
            </span>
        </div>

        <!-- VALIDATION ALERTS -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Please correct the following:</strong>
                <ul class="mb-0 mt-2 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <!-- INVOICE NUMBER -->
                <div class="col-md-6">
                    <label class="form-label">Invoice Number</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-hash"></i></span>
                        <input type="text" name="invoice_number" class="form-control bg-light fw-bold text-primary" value="{{ old('invoice_number', $invoice->invoice_number) }}" readonly>
                    </div>
                    <small class="text-muted"><i class="bi bi-lock-fill me-1"></i>Invoice number cannot be changed.</small>
                </div>

                <!-- CUSTOMER -->
                <div class="col-md-6">
                    <label class="form-label">Customer Name <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <select name="customer_name" class="form-select @error('customer_name') is-invalid @enderror" required>
                            <option value="">-- Choose Customer --</option>
                            @forelse($customers as $customer)
                                <option value="{{ $customer->customer_name }}" {{ old('customer_name', $invoice->customer_name) == $customer->customer_name ? 'selected' : '' }}>
                                    {{ $customer->customer_name }} {{ $customer->phone ? '('.$customer->phone.')' : '' }}
                                </option>
                            @empty
                                <option value="" disabled>No customers found</option>
                            @endforelse
                        </select>
                    </div>
                    @error('customer_name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- INVOICE DATE -->
                <div class="col-md-6">
                    <label class="form-label">Invoice Date <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                        <input type="date" name="invoice_date" class="form-control @error('invoice_date') is-invalid @enderror" value="{{ old('invoice_date', $invoice->invoice_date) }}" required>
                    </div>
                    @error('invoice_date')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- TOTAL AMOUNT -->
                <div class="col-md-6">
                    <label class="form-label">Total Amount (INR) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-currency-rupee money-icon"></i></span>
                        <input type="number" step="0.01" min="1" name="total_amount" class="form-control amount-field @error('total_amount') is-invalid @enderror" value="{{ old('total_amount', $invoice->total_amount) }}" required>
                    </div>
                    @error('total_amount')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PAYMENT STATUS -->
                <div class="col-12">
                    <label class="form-label">Payment Status <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-credit-card-fill payment-icon"></i></span>
                        <select name="status" class="form-select status-select @error('status') is-invalid @enderror" required>
                            <option value="Pending" {{ old('status', $invoice->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Paid" {{ old('status', $invoice->status) == 'Paid' ? 'selected' : '' }}>Paid</option>
                        </select>
                    </div>
                    @error('status')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            <!-- BUTTONS -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('invoices.index') }}" class="btn btn-back"><i class="bi bi-arrow-left me-1"></i>Back</a>
                <button type="submit" class="btn btn-update"><i class="bi bi-check-circle-fill me-1"></i>Update Invoice</button>
            </div>
        </form>
    </div>
</div>

<!-- FOOTER -->
<footer class="page-footer">
    <i class="bi bi-receipt-cutoff me-1"></i>
    © 2026 Invoice Management System | All Rights Reserved
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>