<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Create Invoice | Invoice Management System</title>


    <!-- =====================================================
         BOOTSTRAP
    ====================================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- =====================================================
         BOOTSTRAP ICONS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- =====================================================
         CUSTOM CSS
    ====================================================== -->

    <style>

        /* =====================================================
           GLOBAL
        ====================================================== */

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            background:
                linear-gradient(
                    180deg,
                    #f3f7fd 0%,
                    #f8fafc 100%
                );

            font-family:
                'Segoe UI',
                Tahoma,
                Geneva,
                Verdana,
                sans-serif;

            color: #172033;
        }


        /* =====================================================
           NAVBAR
        ====================================================== */

        .main-navbar {

            background:
                linear-gradient(
                    90deg,
                    #1769e8 0%,
                    #1458c8 100%
                );

            box-shadow:
                0 5px 18px rgba(21, 74, 160, 0.18);

            padding: 11px 0;
        }


        .navbar-brand {

            font-size: 21px;

            font-weight: 700;

            letter-spacing: 0.2px;

            white-space: nowrap;
        }


        .navbar-brand i {

            font-size: 22px;
        }


        .navbar-menu {

            display: flex;

            align-items: center;

            gap: 4px;
        }


        .navbar-menu .nav-link {

            color: rgba(255,255,255,0.96);

            font-size: 14px;

            font-weight: 600;

            padding: 9px 13px;

            border-radius: 9px;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }


        .navbar-menu .nav-link:hover {

            color: white;

            background: rgba(255,255,255,0.13);

            transform: translateY(-1px);
        }


        .navbar-menu .nav-link.active {

            color: white;

            background:
                rgba(255,255,255,0.19);

            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,0.08);
        }


        /* =====================================================
           MAIN WRAPPER
        ====================================================== */

        .invoice-page {

            max-width: 1180px;

            margin: 0 auto;

            padding:
                28px 18px 35px;
        }


        /* =====================================================
           HERO / HEADER BANNER
        ====================================================== */

        .invoice-hero {

            position: relative;

            overflow: hidden;

            border-radius: 17px;

            padding:
                23px 28px;

            margin-bottom: 20px;

            color: white;

            background:
                linear-gradient(
                    115deg,
                    #101d3a 0%,
                    #15366f 42%,
                    #1769e8 100%
                );

            box-shadow:
                0 13px 30px rgba(20, 68, 145, 0.20);
        }


        .invoice-hero::before {

            content: "";

            position: absolute;

            width: 230px;

            height: 230px;

            right: -90px;

            top: -130px;

            border-radius: 50%;

            background:
                rgba(255,255,255,0.075);
        }


        .invoice-hero::after {

            content: "";

            position: absolute;

            width: 150px;

            height: 150px;

            right: 115px;

            bottom: -115px;

            border-radius: 50%;

            background:
                rgba(255,255,255,0.055);
        }


        .hero-content {

            position: relative;

            z-index: 2;
        }


        .hero-title {

            display: flex;

            align-items: center;

            gap: 11px;

            margin: 0 0 5px;

            font-size: 27px;

            font-weight: 700;

            letter-spacing: -0.3px;
        }


        .hero-title i {

            font-size: 27px;
        }


        .hero-subtitle {

            margin: 0;

            color:
                rgba(255,255,255,0.80);

            font-size: 13px;

            line-height: 1.5;
        }


        /* =====================================================
           MAIN GRID
        ====================================================== */

        .invoice-layout {

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                310px;

            gap: 18px;

            align-items: start;
        }


        /* =====================================================
           FORM CARD
        ====================================================== */

        .invoice-form-card {

            background: white;

            border: 1px solid #e3e9f2;

            border-radius: 16px;

            padding: 23px 24px;

            box-shadow:
                0 7px 25px rgba(28, 54, 92, 0.07);
        }


        .form-heading {

            display: flex;

            align-items: center;

            gap: 9px;

            margin-bottom: 19px;
        }


        .form-heading-icon {

            width: 34px;

            height: 34px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 9px;

            background:
                rgba(23,105,232,0.10);

            color: #1769e8;

            font-size: 17px;
        }


        .form-heading h5 {

            margin: 0;

            font-size: 17px;

            font-weight: 700;

            color: #172033;
        }


        /* =====================================================
           VALIDATION ALERT
        ====================================================== */

        .validation-alert {

            border: 0;

            border-radius: 10px;

            margin-bottom: 18px;

            font-size: 13px;

            box-shadow:
                0 4px 14px rgba(220,53,69,0.08);
        }


        .validation-alert ul {

            padding-left: 19px;

            margin-bottom: 0;
        }


        /* =====================================================
           FORM LABEL
        ====================================================== */

        .form-label {

            display: block;

            margin-bottom: 6px;

            color: #273449;

            font-size: 13px;

            font-weight: 650;
        }


        .required {

            color: #e63946;
        }


        /* =====================================================
           INPUT GROUP
        ====================================================== */

        .input-group {

            width: 100%;
        }


        .input-group-text {

            min-width: 43px;

            justify-content: center;

            background: #f8fafd;

            border-color: #d7e0eb;

            color: #1769e8;

            font-size: 14px;

            border-radius:
                8px 0 0 8px;
        }


        .form-control,
        .form-select {

            height: 43px;

            border-color: #d7e0eb;

            color: #263449;

            font-size: 13px;

            border-radius: 0 8px 8px 0;

            padding:
                8px 12px;

            box-shadow: none;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }


        .form-control:focus,
        .form-select:focus {

            border-color: #1769e8;

            box-shadow:
                0 0 0 3px
                rgba(23,105,232,0.10);

            outline: none;
        }


        .form-control::placeholder {

            color: #9aa7b8;
        }


        .form-control.bg-light {

            background-color:
                #f5f8fc !important;
        }


        /* =====================================================
           FIELD HELP TEXT
        ====================================================== */

        .field-help {

            display: block;

            margin-top: 5px;

            color: #77869a;

            font-size: 11px;
        }


        .field-error {

            margin-top: 5px;

            font-size: 12px;

            color: #dc3545;
        }


        /* =====================================================
           FORM ROW
        ====================================================== */

        .invoice-fields {

            row-gap: 14px;
        }


        /* =====================================================
           DIVIDER
        ====================================================== */

        .form-divider {

            border: 0;

            border-top:
                1px solid #e7edf4;

            margin:
                21px 0 18px;
        }


        /* =====================================================
           ACTION BUTTONS
        ====================================================== */

        .form-actions {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 9px;
        }


        .btn-back {

            min-width: 92px;

            height: 40px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 6px;

            border-radius: 8px;

            font-size: 13px;

            font-weight: 600;
        }


        .btn-save {

            min-width: 137px;

            height: 40px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 6px;

            border: none;

            border-radius: 8px;

            font-size: 13px;

            font-weight: 700;

            background:
                linear-gradient(
                    135deg,
                    #15945b,
                    #16804f
                );

            box-shadow:
                0 5px 12px
                rgba(21,148,91,0.16);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }


        .btn-save:hover {

            color: white;

            transform: translateY(-1px);

            box-shadow:
                0 7px 16px
                rgba(21,148,91,0.22);
        }


        /* =====================================================
           LIVE VIEW CARD
        ====================================================== */

        .live-preview-card {

            background: white;

            border:
                1px dashed #cbd7e7;

            border-radius: 16px;

            padding: 20px;

            box-shadow:
                0 7px 22px
                rgba(28,54,92,0.055);

            position: sticky;

            top: 18px;
        }


        .preview-top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 8px;

            margin-bottom: 17px;
        }


        .preview-badge {

            display: inline-flex;

            align-items: center;

            padding:
                5px 9px;

            border-radius: 6px;

            background: #1769e8;

            color: white;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 0.4px;
        }


        .preview-live {

            color: #68778d;

            font-size: 10px;

            font-weight: 600;
        }


        .preview-live i {

            color: #f59e0b;
        }


        .preview-icon {

            width: 54px;

            height: 54px;

            margin: 0 auto 11px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background:
                rgba(23,105,232,0.10);

            color: #1769e8;

            font-size: 23px;
        }


        .preview-customer {

            margin: 0 0 7px;

            text-align: center;

            color: #202b3d;

            font-size: 17px;

            font-weight: 700;

            word-break: break-word;
        }


        .status-badge {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                5px 10px;

            border-radius: 6px;

            font-size: 10px;

            font-weight: 700;
        }


        .status-pending {

            background: #fff3cd;

            color: #8a6100;
        }


        .status-paid {

            background: #dff5e8;

            color: #137b43;
        }


        .preview-center {

            text-align: center;
        }


        .preview-divider {

            border: 0;

            border-top:
                1px solid #e5eaf1;

            margin:
                16px 0;
        }


        .preview-details {

            display: flex;

            flex-direction: column;

            gap: 10px;
        }


        .preview-row {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            color: #7a8799;

            font-size: 11px;
        }


        .preview-row-left {

            display: flex;

            align-items: center;

            gap: 6px;

            white-space: nowrap;
        }


        .preview-row-left i {

            color: #1769e8;

            font-size: 12px;
        }


        .preview-value {

            color: #263449;

            font-weight: 700;

            text-align: right;

            word-break: break-word;
        }


        .preview-total {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            padding-top: 12px;

            margin-top: 2px;

            border-top:
                1px solid #e6ebf2;
        }


        .preview-total-label {

            color: #273449;

            font-size: 12px;

            font-weight: 700;
        }


        .preview-total-value {

            color: #15945b;

            font-size: 18px;

            font-weight: 800;
        }


        /* =====================================================
           EMPTY CUSTOMER MESSAGE
        ====================================================== */

        .no-customer-message {

            margin-top: 6px;

            color: #dc3545;

            font-size: 11px;

            line-height: 1.5;
        }


        .no-customer-message a {

            color: #1769e8;

            font-weight: 700;

            text-decoration: none;
        }


        .no-customer-message a:hover {

            text-decoration: underline;
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .invoice-footer {

            margin-top: 25px;

            padding:
                15px 10px;

            text-align: center;

            background: white;

            border-top:
                1px solid #e0e6ee;

            color: #718096;

            font-size: 11px;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 1100px) {

            .navbar-menu .nav-link {

                padding-left: 9px;

                padding-right: 9px;
            }

            .navbar-brand {

                font-size: 18px;
            }

            .invoice-layout {

                grid-template-columns:
                    minmax(0, 1fr)
                    285px;
            }
        }


        @media (max-width: 991px) {

            .main-navbar {

                padding: 10px 0;
            }

            .navbar-menu {

                margin-top: 10px;

                flex-wrap: wrap;

                justify-content: center;
            }

            .invoice-layout {

                grid-template-columns: 1fr;
            }

            .live-preview-card {

                position: relative;

                top: auto;
            }
        }


        @media (max-width: 767px) {

            .invoice-page {

                padding:
                    20px 13px 28px;
            }

            .invoice-hero {

                padding:
                    21px 20px;

                border-radius: 14px;
            }

            .hero-title {

                font-size: 23px;
            }

            .hero-title i {

                font-size: 23px;
            }

            .hero-subtitle {

                font-size: 12px;
            }

            .invoice-form-card {

                padding:
                    19px 17px;
            }

            .form-actions {

                flex-direction: column-reverse;

                align-items: stretch;
            }

            .btn-back,
            .btn-save {

                width: 100%;
            }

            .navbar-brand {

                font-size: 17px;
            }

            .navbar-menu {

                gap: 2px;
            }

            .navbar-menu .nav-link {

                font-size: 12px;

                padding:
                    7px 8px;
            }
        }


        @media (max-width: 500px) {

            .navbar-menu .nav-link {

                padding:
                    6px 7px;

                font-size: 11px;
            }

            .navbar-menu .nav-link i {

                margin-right: 2px !important;
            }

            .hero-title {

                font-size: 21px;
            }

            .invoice-fields > div {

                width: 100%;
            }
        }

    </style>

</head>


<body>


<!-- =========================================================
     NAVBAR
========================================================== -->

<nav class="navbar navbar-expand-lg navbar-dark main-navbar">

    <div class="container">

        <!-- BRAND -->

        <a
            class="navbar-brand d-flex align-items-center"
            href="{{ route('invoices.index') }}">

            <i class="bi bi-receipt-cutoff me-2"></i>

            Invoice Management System

        </a>


        <!-- MENU -->

        <div class="navbar-menu ms-auto">

            <!-- HOME -->

            <a
                class="nav-link"
                href="/">

                <i class="bi bi-house-door me-1"></i>

                Home

            </a>


            <!-- DASHBOARD -->

            <a
                class="nav-link"
                href="/">

                <i class="bi bi-speedometer2 me-1"></i>

                Dashboard

            </a>


            <!-- CUSTOMERS -->

            <a
                class="nav-link"
                href="/customers">

                <i class="bi bi-people me-1"></i>

                Customers

            </a>


            <!-- PRODUCTS -->

            <a
                class="nav-link"
                href="/products">

                <i class="bi bi-box-seam me-1"></i>

                Products

            </a>


            <!-- INVOICES -->

            <a
                class="nav-link active"
                href="{{ route('invoices.index') }}">

                <i class="bi bi-receipt me-1"></i>

                Invoices

            </a>


            <!-- REPORTS -->

            <a
                class="nav-link"
                href="/reports">

                <i class="bi bi-pie-chart me-1"></i>

                Reports

            </a>

        </div>

    </div>

</nav>



<!-- =========================================================
     MAIN PAGE
========================================================== -->

<main class="invoice-page">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="invoice-hero">

        <div class="hero-content">

            <h1 class="hero-title">

                <i class="bi bi-plus-square-dotted"></i>

                Create New Invoice

            </h1>


            <p class="hero-subtitle">

                Generate billing invoice records with customer parameters,
                invoice numbering, and real-time ledger tracking.

            </p>

        </div>

    </section>



    <!-- =====================================================
         MAIN LAYOUT
    ====================================================== -->

    <div class="invoice-layout">


        <!-- =================================================
             LEFT FORM
        ================================================== -->

        <section class="invoice-form-card">


            <!-- FORM TITLE -->

            <div class="form-heading">

                <div class="form-heading-icon">

                    <i class="bi bi-file-earmark-ruled"></i>

                </div>


                <h5>

                    Invoice Details Form

                </h5>

            </div>



            <!-- =================================================
                 VALIDATION ERRORS
            ================================================== -->

            @if ($errors->any())

                <div
                    class="alert alert-danger alert-dismissible fade show validation-alert"
                    role="alert">

                    <div class="fw-bold mb-1">

                        <i class="bi bi-exclamation-triangle-fill me-1"></i>

                        Please correct the following errors:

                    </div>


                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>

                                {{ $error }}

                            </li>

                        @endforeach

                    </ul>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                    </button>

                </div>

            @endif



            <!-- =================================================
                 FORM
            ================================================== -->

            <form
                action="{{ route('invoices.store') }}"
                method="POST">

                @csrf



                <div class="row invoice-fields">


                    <!-- =========================================
                         INVOICE NUMBER
                    ========================================== -->

                    <div class="col-md-6">

                        <label
                            class="form-label">

                            Invoice Number

                            <span class="required">*</span>

                        </label>


                        <div class="input-group">

                            <span class="input-group-text">

                                <i class="bi bi-hash"></i>

                            </span>


                            <input
                                type="text"
                                id="input_invoice_number"
                                name="invoice_number"
                                class="form-control bg-light fw-bold text-primary @error('invoice_number') is-invalid @enderror"
                                value="{{ old('invoice_number', $invoiceNumber ?? 'INV-0001') }}"
                                readonly
                                required>

                        </div>


                        <small class="field-help">

                            <i class="bi bi-info-circle me-1"></i>

                            Auto-generated serial number

                        </small>


                        @error('invoice_number')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    <!-- =========================================
                         CUSTOMER
                    ========================================== -->

                    <div class="col-md-6">

                        <label
                            class="form-label">

                            Customer Name

                            <span class="required">*</span>

                        </label>


                        <div class="input-group">

                            <span class="input-group-text">

                                <i class="bi bi-person"></i>

                            </span>


                            <select
                                id="input_customer_name"
                                name="customer_name"
                                class="form-select @error('customer_name') is-invalid @enderror"
                                required>

                                <option value="">

                                    -- Choose Registered Customer --

                                </option>


                                @forelse($customers as $customer)

                                    <option
                                        value="{{ $customer->customer_name }}"
                                        data-phone="{{ $customer->phone ?? '' }}"
                                        {{ old('customer_name') == $customer->customer_name ? 'selected' : '' }}>

                                        {{ $customer->customer_name }}

                                    </option>

                                @empty

                                    <option
                                        value=""
                                        disabled>

                                        No customers registered

                                    </option>

                                @endforelse

                            </select>

                        </div>


                        @if(isset($customers) && $customers->count() == 0)

                            <div class="no-customer-message">

                                <i class="bi bi-exclamation-circle me-1"></i>

                                No customers found.

                                <a href="/customers/create">

                                    Create customer

                                </a>

                                first.

                            </div>

                        @endif


                        @error('customer_name')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    <!-- =========================================
                         INVOICE DATE
                    ========================================== -->

                    <div class="col-md-6">

                        <label
                            class="form-label">

                            Invoice Date

                            <span class="required">*</span>

                        </label>


                        <div class="input-group">

                            <span class="input-group-text">

                                <i class="bi bi-calendar-event"></i>

                            </span>


                            <input
                                type="date"
                                id="input_invoice_date"
                                name="invoice_date"
                                class="form-control @error('invoice_date') is-invalid @enderror"
                                value="{{ old('invoice_date', date('Y-m-d')) }}"
                                required>

                        </div>


                        @error('invoice_date')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    <!-- =========================================
                         TOTAL AMOUNT
                    ========================================== -->

                    <div class="col-md-6">

                        <label
                            class="form-label">

                            Total Amount (INR)

                            <span class="required">*</span>

                        </label>


                        <div class="input-group">

                            <span class="input-group-text fw-bold">

                                ₹

                            </span>


                            <input
                                type="number"
                                step="0.01"
                                min="1"
                                id="input_total_amount"
                                name="total_amount"
                                class="form-control fw-bold @error('total_amount') is-invalid @enderror"
                                placeholder="0.00"
                                value="{{ old('total_amount') }}"
                                required>

                        </div>


                        @error('total_amount')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    <!-- =========================================
                         PAYMENT STATUS
                    ========================================== -->

                    <div class="col-12">

                        <label
                            class="form-label">

                            Payment Status

                            <span class="required">*</span>

                        </label>


                        <div class="input-group">

                            <span class="input-group-text">

                                <i class="bi bi-credit-card"></i>

                            </span>


                            <select
                                id="input_status"
                                name="status"
                                class="form-select @error('status') is-invalid @enderror"
                                required>

                                <option
                                    value="Pending"
                                    {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>

                                    Pending (બિલ ચૂકવવાનું બાકી છે)

                                </option>


                                <option
                                    value="Paid"
                                    {{ old('status') == 'Paid' ? 'selected' : '' }}>

                                    Paid (બિલ ચૂકવાઈ ગયું છે)

                                </option>

                            </select>

                        </div>


                        @error('status')

                            <div class="field-error">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                </div>



                <!-- =================================================
                     DIVIDER
                ================================================== -->

                <hr class="form-divider">



                <!-- =================================================
                     ACTION BUTTONS
                ================================================== -->

                <div class="form-actions">


                    <!-- BACK -->

                    <a
                        href="{{ route('invoices.index') }}"
                        class="btn btn-outline-secondary btn-back">

                        <i class="bi bi-arrow-left"></i>

                        Back

                    </a>


                    <!-- SAVE -->

                    <button
                        type="submit"
                        class="btn btn-success btn-save">

                        <i class="bi bi-check-circle"></i>

                        Save Invoice

                    </button>

                </div>


            </form>

        </section>



        <!-- =================================================
             RIGHT LIVE PREVIEW
        ================================================== -->

        <aside class="live-preview-card">


            <!-- PREVIEW HEADER -->

            <div class="preview-top">

                <span class="preview-badge">

                    LIVE VIEW CARD

                </span>


                <span class="preview-live">

                    <i class="bi bi-lightning-fill"></i>

                    Real-time

                </span>

            </div>



            <!-- PREVIEW MAIN -->

            <div class="preview-center">


                <div class="preview-icon">

                    <i class="bi bi-receipt"></i>

                </div>


                <h5
                    class="preview-customer"
                    id="preview_customer_name">

                    Customer Name

                </h5>


                <span
                    class="status-badge status-pending"
                    id="preview_status_badge">

                    Pending

                </span>

            </div>



            <hr class="preview-divider">



            <!-- PREVIEW DETAILS -->

            <div class="preview-details">


                <!-- INVOICE NUMBER -->

                <div class="preview-row">

                    <div class="preview-row-left">

                        <i class="bi bi-hash"></i>

                        <span>Invoice No.</span>

                    </div>


                    <strong
                        class="preview-value"
                        id="preview_invoice_number">

                        {{ $invoiceNumber ?? 'INV-0001' }}

                    </strong>

                </div>



                <!-- DATE -->

                <div class="preview-row">

                    <div class="preview-row-left">

                        <i class="bi bi-calendar-check"></i>

                        <span>Invoice Date</span>

                    </div>


                    <strong
                        class="preview-value"
                        id="preview_invoice_date">

                        {{ date('d-m-Y') }}

                    </strong>

                </div>



                <!-- TOTAL -->

                <div class="preview-total">

                    <span class="preview-total-label">

                        <i class="bi bi-currency-rupee me-1"></i>

                        Grand Total

                    </span>


                    <strong
                        class="preview-total-value"
                        id="preview_total_amount">

                        ₹ 0.00

                    </strong>

                </div>

            </div>

        </aside>

    </div>

</main>



<!-- =========================================================
     FOOTER
========================================================== -->

<footer class="invoice-footer">

    <small>

        © 2026 Invoice Management System
        | All Rights Reserved

    </small>

</footer>



<!-- =========================================================
     BOOTSTRAP JS
========================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>



<!-- =========================================================
     LIVE PREVIEW JAVASCRIPT
========================================================== -->

<script>

    /* =====================================================
       GET ELEMENTS
    ====================================================== */

    const customerSelect =
        document.getElementById('input_customer_name');

    const previewCustomer =
        document.getElementById('preview_customer_name');

    const inputDate =
        document.getElementById('input_invoice_date');

    const previewDate =
        document.getElementById('preview_invoice_date');

    const inputAmount =
        document.getElementById('input_total_amount');

    const previewAmount =
        document.getElementById('preview_total_amount');

    const inputStatus =
        document.getElementById('input_status');

    const previewBadge =
        document.getElementById('preview_status_badge');

    const inputInvoiceNumber =
        document.getElementById('input_invoice_number');

    const previewInvoiceNumber =
        document.getElementById('preview_invoice_number');


    /* =====================================================
       DATE FORMAT FUNCTION
    ====================================================== */

    function formatDate(dateValue) {

        if (!dateValue) {

            return '-';

        }


        const parts =
            dateValue.split('-');


        if (parts.length !== 3) {

            return dateValue;

        }


        return (
            parts[2] +
            '-' +
            parts[1] +
            '-' +
            parts[0]
        );

    }


    /* =====================================================
       CUSTOMER PREVIEW
    ====================================================== */

    if (customerSelect) {

        customerSelect.addEventListener(
            'change',
            function () {

                previewCustomer.textContent =
                    this.value ||
                    'Customer Name';

            }
        );

    }


    /* =====================================================
       DATE PREVIEW
    ====================================================== */

    if (inputDate) {

        inputDate.addEventListener(
            'input',
            function () {

                previewDate.textContent =
                    formatDate(this.value);

            }
        );

    }


    /* =====================================================
       AMOUNT PREVIEW
    ====================================================== */

    if (inputAmount) {

        inputAmount.addEventListener(
            'input',
            function () {

                const value =
                    parseFloat(this.value);


                if (isNaN(value)) {

                    previewAmount.textContent =
                        '₹ 0.00';

                    return;

                }


                previewAmount.textContent =
                    '₹ ' +
                    value.toLocaleString(
                        'en-IN',
                        {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }
                    );

            }
        );

    }


    /* =====================================================
       STATUS PREVIEW
    ====================================================== */

    if (inputStatus) {

        inputStatus.addEventListener(
            'change',
            function () {

                if (this.value === 'Paid') {

                    previewBadge.className =
                        'status-badge status-paid';

                    previewBadge.textContent =
                        'Paid';

                } else {

                    previewBadge.className =
                        'status-badge status-pending';

                    previewBadge.textContent =
                        'Pending';

                }

            }
        );

    }


    /* =====================================================
       INVOICE NUMBER PREVIEW
    ====================================================== */

    if (inputInvoiceNumber) {

        previewInvoiceNumber.textContent =
            inputInvoiceNumber.value ||
            'INV-0001';

    }


    /* =====================================================
       INITIAL DATE PREVIEW
    ====================================================== */

    if (inputDate) {

        previewDate.textContent =
            formatDate(inputDate.value);

    }


    /* =====================================================
       INITIAL CUSTOMER PREVIEW
    ====================================================== */

    if (customerSelect) {

        previewCustomer.textContent =
            customerSelect.value ||
            'Customer Name';

    }


    /* =====================================================
       INITIAL STATUS PREVIEW
    ====================================================== */

    if (inputStatus &&
        inputStatus.value === 'Paid') {

        previewBadge.className =
            'status-badge status-paid';

        previewBadge.textContent =
            'Paid';

    }


    /* =====================================================
       INITIAL AMOUNT PREVIEW
    ====================================================== */

    if (inputAmount &&
        inputAmount.value) {

        const initialAmount =
            parseFloat(inputAmount.value);


        if (!isNaN(initialAmount)) {

            previewAmount.textContent =
                '₹ ' +
                initialAmount.toLocaleString(
                    'en-IN',
                    {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }
                );

        }

    }

</script>


</body>

</html>