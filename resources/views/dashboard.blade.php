<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Invoice Management System</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f8fd;
            color: #172033;
        }

        /* =========================
           NAVBAR
        ========================= */

        .main-navbar {
            background: linear-gradient(100deg, #1267e8, #1557c8, #1649a5);
            box-shadow: 0 6px 22px rgba(18, 76, 170, 0.18);
            min-height: 70px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            color: white !important;
            font-size: 20px;
            font-weight: 700;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-menu a {
            color: rgba(255,255,255,0.92);
            text-decoration: none;
            padding: 9px 13px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: white;
            background: rgba(255,255,255,0.18);
        }

        /* =========================
           PAGE
        ========================= */

        .page-wrapper {
            padding: 32px 0 45px;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #102f72, #145fca, #1677f3);
            border-radius: 20px;
            padding: 28px 30px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 12px 30px rgba(18, 76, 170, 0.20);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            right: -55px;
            top: -95px;
        }

        .hero h1 {
            font-size: 27px;
            font-weight: 800;
            margin: 0 0 5px;
        }

        .hero p {
            margin: 0;
            font-size: 13px;
            opacity: 0.9;
        }

        .clock-box {
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.18);
            padding: 9px 14px;
            border-radius: 30px;
            font-size: 12px;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stat-card {
            background: white;
            border: 1px solid #e3e9f2;
            border-radius: 17px;
            padding: 21px;
            height: 100%;
            box-shadow: 0 7px 22px rgba(23,52,90,0.06);
            transition: 0.25s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 13px 30px rgba(23,52,90,0.11);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-bottom: 15px;
        }

        .icon-blue {
            background: #e8f1ff;
            color: #1769e8;
        }

        .icon-purple {
            background: #f2eaff;
            color: #7952b3;
        }

        .icon-orange {
            background: #fff1df;
            color: #fd7e14;
        }

        .icon-green {
            background: #e7f8ef;
            color: #198754;
        }

        .stat-label {
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            color: #0f172a;
            font-size: 25px;
            font-weight: 800;
            margin-top: 3px;
        }

        .stat-description {
            color: #8a94a6;
            font-size: 11px;
            margin-top: 5px;
        }

        /* =========================
           CONTENT CARDS
        ========================= */

        .content-card {
            background: white;
            border: 1px solid #e3e9f2;
            border-radius: 17px;
            padding: 23px;
            height: 100%;
            box-shadow: 0 7px 22px rgba(23,52,90,0.06);
        }

        .section-title {
            font-size: 17px;
            font-weight: 700;
            color: #172033;
            margin-bottom: 3px;
        }

        .section-subtitle {
            color: #8a94a6;
            font-size: 11px;
        }

        /* =========================
           QUICK ACTIONS
        ========================= */

        .action-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            background: #f8fafc;
            border: 1px solid #e3e8ef;
            border-radius: 12px;
            text-decoration: none;
            color: #1e293b;
            transition: 0.2s;
            height: 100%;
        }

        .action-link:hover {
            background: #eef5ff;
            border-color: #bdd6ff;
            color: #1769e8;
            transform: translateX(3px);
        }

        .action-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 10px;
            background: #e8f1ff;
            color: #1769e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .action-title {
            font-size: 13px;
            font-weight: 600;
        }

        .action-description {
            color: #8a94a6;
            font-size: 10px;
            margin-top: 2px;
        }

        /* =========================
           SYSTEM STATUS
        ========================= */

        .status-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 15px;
        }

        .status-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e6ebf2;
            font-size: 12px;
        }

        .status-row:last-child {
            border-bottom: none;
        }

        .status-label {
            color: #64748b;
        }

        .status-value {
            font-weight: 600;
            color: #172033;
        }

        .operational {
            color: #198754;
            background: #e8f8ef;
            border: 1px solid #bde8ce;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            color: #8a94a6;
            font-size: 11px;
            padding: 25px 0 10px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {

            .nav-menu {
                margin-top: 10px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .navbar-brand {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 576px) {

            .page-wrapper {
                padding-top: 20px;
            }

            .hero {
                padding: 22px;
            }

            .hero h1 {
                font-size: 22px;
            }

            .nav-menu a {
                font-size: 11px;
                padding: 7px 9px;
            }
        }
    </style>
</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-receipt-cutoff me-2"></i>
            Invoice Management System
        </a>

        <div class="nav-menu ms-auto">

            <a href="{{ route('dashboard') }}" class="active">
                <i class="bi bi-speedometer2 me-1"></i>
                Dashboard
            </a>

            <a href="{{ route('customers.index') }}">
                <i class="bi bi-people-fill me-1"></i>
                Customers
            </a>

            <a href="{{ route('products.index') }}">
                <i class="bi bi-box-seam-fill me-1"></i>
                Products
            </a>

            <a href="{{ route('invoices.index') }}">
                <i class="bi bi-receipt me-1"></i>
                Invoices
            </a>

            <a href="{{ route('reports.index') }}">
                <i class="bi bi-pie-chart-fill me-1"></i>
                Reports
            </a>

        </div>
    </div>
</nav>


<!-- =========================
     MAIN CONTENT
========================= -->

<div class="container page-wrapper">

    <!-- HERO -->

    <div class="hero">

        <div class="d-flex flex-column flex-md-row
                    justify-content-between
                    align-items-md-center gap-3">

            <div>

                <h1>
                    <i class="bi bi-grid-1x2-fill me-2"></i>
                    Dashboard
                </h1>

                <p>
                    Overview of customers, products, invoices and sales.
                </p>

            </div>

            <div class="clock-box">
                <i class="bi bi-clock me-1"></i>
                <span id="live_clock">--:--:--</span>
            </div>

        </div>

    </div>


    <!-- =========================
         STATISTICS
    ========================= -->

    <div class="row g-4 mb-4">

        <!-- PRODUCTS -->

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon icon-blue">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div class="stat-label">
                    Total Products
                </div>

                <div class="stat-value">
                    {{ $totalProducts ?? 0 }}
                </div>

                <div class="stat-description">
                    Products available in catalogue
                </div>

            </div>

        </div>


        <!-- CUSTOMERS -->

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon icon-purple">
                    <i class="bi bi-people"></i>
                </div>

                <div class="stat-label">
                    Total Customers
                </div>

                <div class="stat-value">
                    {{ $totalCustomers ?? 0 }}
                </div>

                <div class="stat-description">
                    Registered customer records
                </div>

            </div>

        </div>


        <!-- INVOICES -->

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon icon-orange">
                    <i class="bi bi-receipt"></i>
                </div>

                <div class="stat-label">
                    Total Invoices
                </div>

                <div class="stat-value">
                    {{ $totalInvoices ?? 0 }}
                </div>

                <div class="stat-description">
                    Invoices generated in system
                </div>

            </div>

        </div>


        <!-- SALES -->

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon icon-green">
                    <i class="bi bi-currency-rupee"></i>
                </div>

                <div class="stat-label">
                    Total Revenue
                </div>

                <div class="stat-value">
                    ₹{{ number_format($totalSales ?? 0, 2) }}
                </div>

                <div class="stat-description">
                    Revenue from paid invoices
                </div>

            </div>

        </div>

    </div>


    <!-- =========================
         QUICK ACTIONS + STATUS
    ========================= -->

    <div class="row g-4">

        <!-- QUICK ACTIONS -->

        <div class="col-lg-8">

            <div class="content-card">

                <div class="mb-4">

                    <div class="section-title">
                        <i class="bi bi-lightning-charge-fill text-warning me-2"></i>
                        Quick Actions
                    </div>

                    <div class="section-subtitle">
                        Quickly access the main system modules.
                    </div>

                </div>


                <div class="row g-3">

                    <!-- CREATE INVOICE -->

                    <div class="col-md-6">

                        <a href="{{ route('invoices.create') }}"
                           class="action-link">

                            <div class="action-icon">
                                <i class="bi bi-plus-circle-fill"></i>
                            </div>

                            <div>

                                <div class="action-title">
                                    Create New Invoice
                                </div>

                                <div class="action-description">
                                    Generate a new customer invoice
                                </div>

                            </div>

                        </a>

                    </div>


                    <!-- MANAGE INVOICES -->

                    <div class="col-md-6">

                        <a href="{{ route('invoices.index') }}"
                           class="action-link">

                            <div class="action-icon">
                                <i class="bi bi-receipt"></i>
                            </div>

                            <div>

                                <div class="action-title">
                                    Manage Invoices
                                </div>

                                <div class="action-description">
                                    View, edit and manage invoices
                                </div>

                            </div>

                        </a>

                    </div>


                    <!-- ADD CUSTOMER -->

                    <div class="col-md-6">

                        <a href="{{ route('customers.create') }}"
                           class="action-link">

                            <div class="action-icon">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>

                            <div>

                                <div class="action-title">
                                    Add Customer
                                </div>

                                <div class="action-description">
                                    Register a new customer
                                </div>

                            </div>

                        </a>

                    </div>


                    <!-- ADD PRODUCT -->

                    <div class="col-md-6">

                        <a href="{{ route('products.create') }}"
                           class="action-link">

                            <div class="action-icon">
                                <i class="bi bi-box-seam-fill"></i>
                            </div>

                            <div>

                                <div class="action-title">
                                    Add Product
                                </div>

                                <div class="action-description">
                                    Add product and stock details
                                </div>

                            </div>

                        </a>

                    </div>


                    <!-- CUSTOMERS -->

                    <div class="col-md-6">

                        <a href="{{ route('customers.index') }}"
                           class="action-link">

                            <div class="action-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <div>

                                <div class="action-title">
                                    Customer Directory
                                </div>

                                <div class="action-description">
                                    View all registered customers
                                </div>

                            </div>

                        </a>

                    </div>


                    <!-- REPORTS -->

                    <div class="col-md-6">

                        <a href="{{ route('reports.index') }}"
                           class="action-link">

                            <div class="action-icon">
                                <i class="bi bi-bar-chart-line-fill"></i>
                            </div>

                            <div>

                                <div class="action-title">
                                    View Reports
                                </div>

                                <div class="action-description">
                                    Analyse and export reports
                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>


        <!-- SYSTEM STATUS -->

        <div class="col-lg-4">

            <div class="content-card">

                <div class="d-flex justify-content-between
                            align-items-center mb-4">

                    <div class="section-title mb-0">
                        <i class="bi bi-cpu-fill text-primary me-2"></i>
                        System Status
                    </div>

                    <span class="operational">
                        Operational
                    </span>

                </div>


                <div class="status-box">

                    <div class="status-row">

                        <span class="status-label">
                            Application
                        </span>

                        <span class="status-value">
                            Invoice System
                        </span>

                    </div>


                    <div class="status-row">

                        <span class="status-label">
                            Database
                        </span>

                        <span class="status-value">
                            Connected
                        </span>

                    </div>


                    <div class="status-row">

                        <span class="status-label">
                            Products Module
                        </span>

                        <span class="status-value text-success">
                            Active
                        </span>

                    </div>


                    <div class="status-row">

                        <span class="status-label">
                            Customer Module
                        </span>

                        <span class="status-value text-success">
                            Active
                        </span>

                    </div>


                    <div class="status-row">

                        <span class="status-label">
                            Invoice Module
                        </span>

                        <span class="status-value text-success">
                            Active
                        </span>

                    </div>


                    <div class="status-row">

                        <span class="status-label">
                            Reports Module
                        </span>

                        <span class="status-value text-success">
                            Active
                        </span>

                    </div>

                </div>


                <div class="mt-4 p-3 border rounded-3 text-center">

                    <div class="text-muted small">
                        Current System Overview
                    </div>

                    <div class="fw-bold text-primary mt-1">
                        {{ ($totalProducts ?? 0)
                           + ($totalCustomers ?? 0)
                           + ($totalInvoices ?? 0) }}
                        Records
                    </div>

                    <small class="text-muted">
                        Across core modules
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- =========================
     FOOTER
========================= -->

<footer class="footer">

    <i class="bi bi-receipt-cutoff me-1"></i>

    © 2026 Invoice Management System

    | All Rights Reserved

</footer>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


<!-- Live Clock -->

<script>

    function updateClock() {

        const now = new Date();

        document.getElementById('live_clock').innerText =
            now.toLocaleTimeString();

    }

    updateClock();

    setInterval(updateClock, 1000);

</script>

</body>
</html>