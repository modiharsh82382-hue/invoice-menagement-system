<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices | Invoice Management System</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
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

        /* NAVBAR */
        .main-navbar {
            background: linear-gradient(100deg, #1167ed, #1557c8, #1649a5);
            box-shadow: 0 8px 25px rgba(18, 76, 170, 0.18);
            padding: 12px 0;

        /* Sticky Navbar */
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand {
            font-size: 21px;
            font-weight: 700;
            color: white !important;
            letter-spacing: -0.3px;
        }

        .navbar-brand i {
            font-size: 22px;
            margin-right: 8px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 9px 13px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateY(-1px);
        }

        .nav-menu a.active {
            background: rgba(255, 255, 255, 0.18);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.08);
        }

        .nav-menu i {
            margin-right: 5px;
        }

        /* PAGE WRAPPER */
        .page-wrapper {
            padding: 32px 0 45px;
        }

        /* HERO SECTION */
        .invoice-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #123d91 0%, #145fca 48%, #1677f3 100%);
            border-radius: 20px;
            padding: 27px 30px;
            color: white;
            margin-bottom: 24px;
            box-shadow: 0 15px 35px rgba(18, 76, 170, 0.20);
        }

        .invoice-hero::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            right: -75px;
            top: -110px;
        }

        .invoice-hero::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            right: 90px;
            bottom: -110px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 27px;
            font-weight: 700;
            margin: 0 0 5px;
        }

        .hero-title i {
            margin-right: 8px;
        }

        .hero-subtitle {
            margin: 0;
            font-size: 13px;
            opacity: 0.88;
        }

        /* SUMMARY CARDS */
        .summary-row {
            margin-bottom: 22px;
        }

        .summary-card {
            background: white;
            border: 1px solid #e1e8f2;
            border-radius: 15px;
            padding: 17px 19px;
            display: flex;
            align-items: center;
            gap: 13px;
            height: 100%;
            box-shadow: 0 7px 22px rgba(31, 61, 100, 0.06);
            transition: 0.2s;
        }

        .summary-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(31, 61, 100, 0.10);
        }

        .summary-icon {
            width: 45px;
            height: 45px;
            min-width: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .summary-icon.blue {
            background: #e8f1ff;
            color: #1769e8;
        }

        .summary-icon.green {
            background: #e8f8ef;
            color: #198754;
        }

        .summary-icon.yellow {
            background: #fff5dc;
            color: #d89000;
        }

        .summary-label {
            color: #738097;
            font-size: 12px;
            margin-bottom: 2px;
        }

        .summary-value {
            font-size: 20px;
            font-weight: 700;
            color: #172033;
        }

        /* MAIN CARD */
        .invoice-card {
            background: white;
            border: 1px solid #e1e8f2;
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(23, 52, 90, 0.07);
            overflow: hidden;
        }

        .invoice-card-header {
            padding: 19px 23px;
            border-bottom: 1px solid #e7edf5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-heading-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #e9f2ff;
            color: #1769e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .card-heading h4 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            color: #172033;
        }

        .card-heading p {
            margin: 2px 0 0;
            font-size: 11px;
            color: #7b8799;
        }

        /* ADD BUTTON */
        .btn-add-invoice {
            background: linear-gradient(135deg, #1769e8, #1054c4);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 9px 15px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
            box-shadow: 0 5px 13px rgba(23, 105, 232, 0.18);
        }

        .btn-add-invoice:hover {
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(23, 105, 232, 0.25);
        }

        /* SEARCH AREA */
        .search-area {
            padding: 18px 23px;
            background: #fbfcfe;
            border-bottom: 1px solid #e7edf5;
        }

        .search-form {
            max-width: 540px;
            margin-left: auto;
        }

        .search-group {
            display: flex;
            height: 42px;
        }

        .search-icon {
            width: 43px;
            min-width: 43px;
            border: 1px solid #dbe3ef;
            border-right: none;
            border-radius: 8px 0 0 8px;
            background: white;
            color: #718096;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-input {
            flex: 1;
            border: 1px solid #dbe3ef;
            border-left: none;
            border-right: none;
            outline: none;
            padding: 0 10px;
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
        }

        .search-input:focus {
            border-color: #1769e8;
        }

        .search-button {
            border: none;
            background: #1769e8;
            color: white;
            padding: 0 17px;
            border-radius: 0 8px 8px 0;
            font-size: 13px;
            font-weight: 600;
        }

        .search-button:hover {
            background: #0e5bd2;
        }

        /* TABLE */
        .table-wrapper {
            padding: 0 23px 22px;
        }

        .invoice-table {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0 7px;
        }

        .invoice-table thead th {
            border: none;
            background: #f5f8fc;
            color: #66758b;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            padding: 12px 13px;
            white-space: nowrap;
        }

        .invoice-table thead th:first-child {
            border-radius: 8px 0 0 8px;
        }

        .invoice-table thead th:last-child {
            border-radius: 0 8px 8px 0;
        }

        .invoice-table tbody tr {
            background: white;
            box-shadow: 0 2px 8px rgba(35, 59, 90, 0.035);
        }

        .invoice-table tbody td {
            border-top: 1px solid #e9eef5;
            border-bottom: 1px solid #e9eef5;
            padding: 13px;
            font-size: 12px;
            color: #354258;
            vertical-align: middle;
            white-space: nowrap;
        }

        .invoice-table tbody td:first-child {
            border-left: 1px solid #e9eef5;
            border-radius: 9px 0 0 9px;
        }

        .invoice-table tbody td:last-child {
            border-right: 1px solid #e9eef5;
            border-radius: 0 9px 9px 0;
        }

        .invoice-table tbody tr:hover td {
            background: #f9fbff;
        }

        .invoice-number {
            font-weight: 700;
            color: #1769e8;
        }

        .customer-name {
            font-weight: 600;
            color: #27344a;
        }

        .date-text {
            color: #68768b;
        }

        .amount-text {
            font-weight: 700;
            color: #202c40;
        }

        /* STATUS */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-paid {
            color: #167447;
            background: #e8f7ef;
        }

        .status-pending {
            color: #9a6500;
            background: #fff4d6;
        }

        /* ACTION BUTTONS */
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid;
            transition: 0.2s;
            text-decoration: none;
            font-size: 13px;
        }

        .edit-btn {
            color: #c27a00;
            background: #fff7e5;
            border-color: #f2dfb2;
        }

        .edit-btn:hover {
            color: #9d6200;
            background: #ffefc8;
            transform: translateY(-1px);
        }

        .delete-btn {
            color: #dc3545;
            background: #fff0f1;
            border-color: #f2cbd0;
        }

        .delete-btn:hover {
            color: #b52a37;
            background: #ffe1e4;
            transform: translateY(-1px);
        }

        /* EMPTY STATE */
        .empty-state {
            padding: 55px 20px !important;
            text-align: center;
            border: none !important;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 14px;
            border-radius: 50%;
            background: #edf4ff;
            color: #1769e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .empty-state h5 {
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: 700;
            color: #27344a;
        }

        .empty-state p {
            margin-bottom: 18px;
            font-size: 12px;
            color: #7a879a;
        }

        /* SUCCESS ALERT */
        .success-alert {
            border: none;
            border-left: 4px solid #198754;
            background: #eaf8f0;
            color: #176b46;
            border-radius: 9px;
            font-size: 13px;
            box-shadow: 0 5px 16px rgba(25, 135, 84, 0.06);
        }

        /* FOOTER */
        .page-footer {
            text-align: center;
            padding: 20px 0 10px;
            color: #8490a3;
            font-size: 11px;
        }

        /* MOBILE */
        @media(max-width: 768px) {
            .navbar-brand {
                font-size: 17px;
            }

            .nav-menu {
                margin-top: 10px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .page-wrapper {
                padding: 20px 0 35px;
            }

            .invoice-hero {
                padding: 23px;
                border-radius: 16px;
            }

            .hero-title {
                font-size: 22px;
            }

            .invoice-card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-add-invoice {
                width: 100%;
                justify-content: center;
            }

            .search-form {
                max-width: 100%;
                margin: 0;
            }

            .table-wrapper {
                padding-left: 12px;
                padding-right: 12px;
            }

            .invoice-table {
                min-width: 850px;
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
            <a href="/">
                <i class="bi bi-house-fill"></i>
                Home
            </a>
            <a href="/">
                <i class="bi bi-bar-chart-line-fill"></i>
                Dashboard
            </a>
            <a href="/customers">
                <i class="bi bi-people-fill"></i>
                Customers
            </a>
            <a href="#">
                <i class="bi bi-box-seam-fill"></i>
                Products
            </a>
            <a href="{{ route('invoices.index') }}" class="active">
                <i class="bi bi-receipt"></i>
                Invoices
            </a>
            <a href="/reports">
                <i class="bi bi-pie-chart-fill"></i>
                Reports
            </a>
        </div>
    </div>
</nav>

<!-- MAIN -->
<div class="container page-wrapper">

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="alert success-alert alert-dismissible fade show" id="success-alert" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Success:</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- HERO -->
    <div class="invoice-hero">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="bi bi-receipt-cutoff"></i>
                Invoice Management
            </h1>
            <p class="hero-subtitle">
                Create, manage, search and track all customer invoices from one place.
            </p>
        </div>
    </div>

    <!-- SUMMARY CARDS -->
    <div class="row g-3 summary-row">
        <!-- TOTAL -->
        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon blue">
                    <i class="bi bi-receipt"></i>
                </div>
                <div>
                    <div class="summary-label">Total Invoices</div>
                    <div class="summary-value">{{ count($invoices) }}</div>
                </div>
            </div>
        </div>

        <!-- PAID -->
        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon green">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
                    <div class="summary-label">Paid Invoices</div>
                    <div class="summary-value">
                        {{ $invoices->where('status', 'Paid')->count() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- PENDING -->
        <div class="col-md-4">
            <div class="summary-card">
                <div class="summary-icon yellow">
                    <i class="bi bi-clock-fill"></i>
                </div>
                <div>
                    <div class="summary-label">Pending Invoices</div>
                    <div class="summary-value">
                        {{ $invoices->where('status', 'Pending')->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- INVOICE CARD -->
    <div class="invoice-card">

        <!-- CARD HEADER -->
        <div class="invoice-card-header">
            <div class="card-heading">
                <div class="card-heading-icon">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <div>
                    <h4>Invoice List</h4>
                    <p>View and manage your invoices</p>
                </div>
            </div>

            <a href="{{ route('invoices.create') }}" class="btn-add-invoice">
                <i class="bi bi-plus-circle-fill"></i>
                Add New Invoice
            </a>
        </div>

        <!-- SEARCH -->
        <div class="search-area">
            <form action="{{ route('invoices.index') }}" method="GET" class="search-form">
                <div class="search-group">
                    <div class="search-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           class="search-input" 
                           placeholder="Search by invoice number or customer name">
                    <button type="submit" class="search-button">
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- TABLE -->
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="table invoice-table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice Number</th>
                            <th>Customer</th>
                            <th>Invoice Date</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $invoice)
                            <tr>
                                <!-- NUMBER -->
                                <td>
                                    <span class="text-muted fw-semibold">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <!-- INVOICE NUMBER -->
                                <td>
                                    <span class="invoice-number">
                                        <i class="bi bi-hash"></i>
                                        {{ $invoice->invoice_number }}
                                    </span>
                                </td>

                                <!-- CUSTOMER -->
                                <td>
                                    <span class="customer-name">
                                        <i class="bi bi-person-fill me-1 text-primary"></i>
                                        {{ $invoice->customer_name }}
                                    </span>
                                </td>

                                <!-- DATE -->
                                <td>
                                    <span class="date-text">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ $invoice->invoice_date }}
                                    </span>
                                </td>

                                <!-- AMOUNT -->
                                <td>
                                    <span class="amount-text">
                                        ₹ {{ number_format($invoice->total_amount, 2) }}
                                    </span>
                                </td>

                                <!-- STATUS -->
                                <td>
                                    @if($invoice->status === 'Paid')
                                        <span class="status-badge status-paid">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Paid
                                        </span>
                                    @else
                                        <span class="status-badge status-pending">
                                            <i class="bi bi-clock-fill"></i>
                                            Pending
                                        </span>
                                    @endif
                                </td>

                                <!-- ACTIONS -->
                                <td>
                                    <div class="action-buttons">
                                        <!-- EDIT -->
                                        <a href="{{ route('invoices.edit', $invoice->id) }}" 
                                           class="action-btn edit-btn" 
                                           title="Edit Invoice">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <!-- DELETE -->
                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" 
                                              method="POST" 
                                              class="d-inline" 
                                              onsubmit="return confirm('Are you sure you want to delete this invoice?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="action-btn delete-btn" 
                                                    title="Delete Invoice">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <!-- EMPTY STATE -->
                            <tr>
                                <td colspan="7" class="empty-state">
                                    <div class="empty-icon">
                                        <i class="bi bi-receipt"></i>
                                    </div>
                                    <h5>No Invoices Found</h5>
                                    <p>
                                        @if(request('search'))
                                            No invoice matches your search.
                                        @else
                                            You haven't created any invoices yet.
                                        @endif
                                    </p>
                                    @if(request('search'))
                                        <a href="{{ route('invoices.index') }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-arrow-counterclockwise me-1"></i>
                                            Clear Search
                                        </a>
                                    @else
                                        <a href="{{ route('invoices.create') }}" class="btn-add-invoice">
                                            <i class="bi bi-plus-circle-fill"></i>
                                            Create First Invoice
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="page-footer">
    <i class="bi bi-receipt-cutoff me-1"></i>
    © 2026 Invoice Management System
    <span class="mx-1">|</span>
    Developed by Team
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto Hide Success Message -->
<script>
    setTimeout(function () {
        const alertBox = document.getElementById('success-alert');
        if (alertBox) {
            const alert = bootstrap.Alert.getOrCreateInstance(alertBox);
            alert.close();
        }
    }, 3500);
</script>
</body>
</html>