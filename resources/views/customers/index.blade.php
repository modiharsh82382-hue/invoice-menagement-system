@extends('layouts.app')

@section('title', 'Customer Directory - Invoice Management System')

@section('content')

{{-- Font & Icons --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    /* ===============================
       MAIN CUSTOMER PAGE
    =============================== */
    .customer-page {
        font-family: 'Poppins', sans-serif;
        background: radial-gradient(circle at 10% 20%, rgba(37,99,235,.08), transparent 28%),
                    radial-gradient(circle at 90% 80%, rgba(59,130,246,.08), transparent 30%),
                    #f4f7fc;
        min-height: calc(100vh - 70px);
        padding: 26px 0 60px;
    }

    /* ===============================
       TOP CUSTOMER MANAGEMENT BANNER
    =============================== */
    .customer-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(115deg, #111c3b 0%, #1d3f91 50%, #2563eb 100%);
        border-radius: 22px;
        padding: 30px 32px;
        color: white;
        box-shadow: 0 18px 40px rgba(37, 99, 235, .18);
        margin-bottom: 22px;
    }

    .customer-hero::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border: 28px solid rgba(255,255,255,.07);
        border-radius: 50%;
        right: -65px;
        top: -110px;
    }

    .customer-hero::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        border: 18px solid rgba(255,255,255,.05);
        border-radius: 50%;
        right: 30px;
        bottom: -105px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 30px;
        font-weight: 800;
        line-height: 1.25;
        letter-spacing: -.5px;
        margin: 0 0 6px;
    }

    .hero-subtitle {
        font-size: 14px;
        font-weight: 400;
        margin: 0;
        opacity: .92;
    }

    .add-customer-btn {
        position: relative;
        z-index: 3;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: white;
        color: #1765e8;
        border: none;
        border-radius: 12px;
        padding: 12px 20px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 8px 20px rgba(0,0,0,.12);
        transition: .2s ease;
    }

    .add-customer-btn:hover {
        transform: translateY(-2px);
        color: #0d4fc2;
        box-shadow: 0 12px 25px rgba(0,0,0,.18);
    }

    /* ===============================
       STATISTICS CARDS
    =============================== */
    .stat-card {
        background: white;
        border: 1px solid #e1e7f0;
        border-radius: 18px;
        padding: 20px;
        height: 100%;
        box-shadow: 0 8px 22px rgba(31,55,90,.06);
        transition: .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(31,55,90,.10);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .stat-icon.blue { color: #1769ed; background: #e6f0ff; }
    .stat-icon.green { color: #079455; background: #e4f8ef; }
    .stat-icon.red { color: #e83e57; background: #ffe9ed; }
    .stat-icon.orange { color: #f08a00; background: #fff0dc; }

    .stat-label {
        color: #577093;
        font-size: 13px;
        font-weight: 500;
        margin-bottom: 4px;
    }

    .stat-number {
        color: #071b41;
        font-size: 27px;
        font-weight: 800;
        line-height: 1;
    }

    /* ===============================
       CUSTOMER DIRECTORY
    =============================== */
    .directory-card {
        background: white;
        border: 1px solid #dfe7f1;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 12px 32px rgba(31,55,90,.07);
        margin-top: 24px;
    }

    .directory-header {
        padding: 24px 26px 20px;
        border-bottom: 1px solid #e6ebf2;
        background: linear-gradient(135deg, #ffffff 0%, #f9fbff 100%);
    }

    .directory-title-wrap {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .directory-title-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #e5efff;
        color: #1769ed;
        font-size: 17px;
    }

    .directory-title {
        margin: 0;
        font-size: 22px;
        font-weight: 800;
        color: #071b41;
        letter-spacing: -.3px;
    }

    .directory-subtitle {
        margin: 2px 0 0;
        font-size: 12px;
        color: #7183a0;
    }

    .record-badge {
        background: #edf5ff;
        border: 1px solid #d5e6ff;
        color: #1769ed;
        font-size: 12px;
        font-weight: 700;
        padding: 8px 14px;
        border-radius: 30px;
        white-space: nowrap;
    }

    /* ===============================
       SEARCH & QUICK FILTERS
    =============================== */
    .search-area {
        padding: 20px 26px;
        background: #fbfcfe;
        border-bottom: 1px solid #e6ebf2;
        width: 100%;
    }

    .search-box {
        display: flex;
        height: 48px;
        border: 1px solid #d7e0eb;
        border-radius: 12px;
        overflow: hidden;
        background: white;
        transition: .2s ease;
        width: 100%; /* અહીં 100% કરવાથી સર્ચ બોક્સ મોટું થઈ જશે */
    }
    .search-area {
        padding: 20px 26px;
        background: #fbfcfe;
        border-bottom: 1px solid #e6ebf2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
    }

    .search-box {
        display: flex;
        height: 48px;
        border: 1px solid #d7e0eb;
        border-radius: 12px;
        overflow: hidden;
        background: white;
        transition: .2s ease;
        min-width: 320px;
    }

    .search-box:focus-within {
        border-color: #1769ed;
        box-shadow: 0 0 0 3px rgba(23,105,237,.10);
    }

    .search-icon {
        width: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #7890b1;
        font-size: 16px;
    }

    .search-input {
        flex: 1;
        border: none;
        outline: none;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        color: #172b4d;
    }

    .search-input::placeholder { color: #8a9ab2; }

    .search-button {
        border: none;
        background: #1769ed;
        color: white;
        padding: 0 24px;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: .2s ease;
    }

    .search-button:hover { background: #0f57cc; }

    /* ===============================
       TABLE STYLING
    =============================== */
    .customer-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .customer-table thead th {
        background: #f8fafc;
        color: #526987;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 14px 16px;
        border-bottom: 1px solid #dfe6ef;
        white-space: nowrap;
    }

    .customer-table tbody tr {
        background: white;
        transition: .18s ease;
    }

    .customer-table tbody tr:hover { background: #f8fbff; }

    .customer-table tbody td {
        padding: 16px;
        border-bottom: 1px solid #e8edf3;
        vertical-align: middle;
        font-size: 13px;
        color: #263b5a;
    }

    .customer-table tbody tr:last-child td { border-bottom: none; }

    /* ===============================
       SERIAL & PROFILE
    =============================== */
    .serial-number {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: linear-gradient(135deg, #edf4ff, #dbeaff);
        border: 1px solid #cfe0fa;
        color: #1769ed;
        font-size: 12px;
        font-weight: 800;
        box-shadow: 0 4px 10px rgba(23,105,237,.08);
    }

    .customer-profile {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .customer-avatar {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #e2efff, #c8ddff);
        border: 1px solid #c9dcfa;
        color: #1769ed;
        font-size: 15px;
        font-weight: 800;
        box-shadow: 0 5px 13px rgba(23,105,237,.10);
    }

    .customer-name {
        color: #102548;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.35;
        margin-bottom: 2px;
    }

    .customer-id {
        color: #8a9ab2;
        font-size: 10px;
        font-weight: 500;
    }

    .customer-id i { color: #7186a5; margin-right: 3px; }

    /* ===============================
       CONTACT & GST
    =============================== */
    .contact-cell, .phone-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .contact-icon {
        width: 34px;
        height: 34px;
        flex: 0 0 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #edf4ff;
        color: #1769ed;
        border: 1px solid #d7e6fb;
        font-size: 13px;
    }

    .phone-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff0f2;
        color: #e83e57;
        border: 1px solid #ffd9df;
        font-size: 13px;
    }

    .email-text { color: #315b96; font-size: 12px; font-weight: 500; cursor: pointer; }
    .phone-number { color: #1c3b69; font-size: 12px; font-weight: 600; cursor: pointer; }

    .gst-status {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #059669;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .gst-dot {
        width: 7px;
        height: 7px;
        background: #10b981;
        border-radius: 50%;
        box-shadow: 0 0 0 3px rgba(16,185,129,.10);
    }

    .gst-number {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 7px;
        background: #f2f6fb;
        border: 1px solid #d9e3ee;
        color: #46617f;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .2px;
        font-family: monospace;
    }

    /* ===============================
       ACTION BUTTONS
    =============================== */
    .action-buttons {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .view-btn, .edit-btn, .delete-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-width: 65px;
        padding: 8px 11px;
        border-radius: 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s ease;
        border: none;
    }

    .view-btn { background: #f0f7ff; color: #0284c7; border: 1px solid #bae6fd; cursor: pointer; }
    .view-btn:hover { background: #e0f2fe; color: #0369a1; transform: translateY(-1px); }

    .edit-btn { background: #fffaf0; color: #d97706; border: 1px solid #f7d48a; }
    .edit-btn:hover { background: #fff2d4; color: #b85c00; transform: translateY(-1px); }

    .delete-btn { background: #fff4f5; color: #dc3545; border: 1px solid #ffccd2; cursor: pointer; }
    .delete-btn:hover { background: #ffe5e8; color: #bd2130; transform: translateY(-1px); }

    .delete-form { display: inline; margin: 0; }

    /* ===============================
       EMPTY STATE
    =============================== */
    .empty-state { text-align: center; padding: 55px 20px; color: #7285a1; }
    .empty-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 15px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #edf4ff;
        color: #1769ed;
        font-size: 25px;
    }

    @media (max-width: 992px) {
        .customer-hero { padding: 25px; }
        .hero-title { font-size: 26px; }
        .directory-card { overflow-x: auto; }
        .customer-table { min-width: 900px; }
    }
</style>

<div class="customer-page">
    <div class="container">

        {{-- HERO SECTION --}}
        <div class="customer-hero">
            <div class="hero-content">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="hero-title">Customer Management</h1>
                        <p class="hero-subtitle">
                            Manage customers, contact information, and verified GST records from one central workspace.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ url('/customers/create') }}" class="add-customer-btn">
                            <i class="fa-solid fa-user-plus"></i>
                            <span>+ Add Customer</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- STATISTICS --}}
        <div class="row g-3">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon blue"><i class="fa-solid fa-users"></i></div>
                    <div class="stat-label">Total Customers</div>
                    <div class="stat-number">{{ $customers->count() }}</div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon green"><i class="fa-solid fa-envelope"></i></div>
                    <div class="stat-label">Email Available</div>
                    <div class="stat-number">{{ $customers->whereNotNull('email')->count() }}</div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon red"><i class="fa-solid fa-phone"></i></div>
                    <div class="stat-label">Phone Available</div>
                    <div class="stat-number">{{ $customers->whereNotNull('phone')->count() }}</div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon orange"><i class="fa-solid fa-file-invoice"></i></div>
                    <div class="stat-label">GST Registered</div>
                    <div class="stat-number">{{ $customers->whereNotNull('gst_number')->count() }}</div>
                </div>
            </div>
        </div>

        {{-- CUSTOMER DIRECTORY CARD --}}
        <div class="directory-card">
            <div class="directory-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="directory-title-wrap">
                            <div class="directory-title-icon"><i class="fa-solid fa-address-book"></i></div>
                            <div>
                                <h2 class="directory-title">Customer Directory</h2>
                                <p class="directory-subtitle">View and manage all registered customer profiles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <span class="record-badge">
                            <i class="fa-solid fa-users me-1"></i> {{ $customers->count() }} Records Found
                        </span>
                    </div>
                </div>
            </div>

            {{-- SEARCH BAR (FULL WIDTH) --}}
            <div class="search-area">
                <form action="{{ url('/customers') }}" method="GET" class="w-100">
                    <div class="search-box">
                        <div class="search-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input
                            type="text"
                            name="search"
                            class="search-input"
                            placeholder="Search by customer name, email, phone or GST..."
                            value="{{ request('search') }}"
                        >
                        <button type="submit" class="search-button">
                            <i class="fa-solid fa-magnifying-glass"></i> Search
                        </button>
                    </div>
                </form>
            </div>

            {{-- CUSTOMER TABLE --}}
            @if($customers->count())
                <div class="table-responsive">
                    <table class="customer-table">
                        <thead>
                            <tr>
                                <th width="70">#</th>
                                <th width="260">Customer Name</th>
                                <th>Email Address</th>
                                <th>Phone</th>
                                <th width="190">GST Details</th>
                                <th width="240">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    {{-- SERIAL NUMBER --}}
                                    <td>
                                        <div class="serial-number">{{ $loop->iteration }}</div>
                                    </td>

                                    {{-- CUSTOMER PROFILE --}}
                                    <td>
                                        <div class="customer-profile">
                                            @php
                                                $initial = strtoupper(substr(trim($customer->customer_name), 0, 1));
                                            @endphp
                                            <div class="customer-avatar">{{ $initial }}</div>
                                            <div>
                                                <div class="customer-name">{{ $customer->customer_name }}</div>
                                                <div class="customer-id">
                                                    <i class="fa-regular fa-id-card"></i> Customer ID #{{ $customer->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- EMAIL --}}
                                    <td>
                                        <div class="contact-cell">
                                            <div class="contact-icon"><i class="fa-regular fa-envelope"></i></div>
                                            <span class="email-text" onclick="copyText('{{ $customer->email }}')" title="Click to copy">
                                                {{ $customer->email }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- PHONE --}}
                                    <td>
                                        <div class="phone-cell">
                                            <div class="phone-icon"><i class="fa-solid fa-phone"></i></div>
                                            <span class="phone-number" onclick="copyText('{{ $customer->phone }}')" title="Click to copy">
                                                {{ $customer->phone }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- GST --}}
                                    <td>
                                        @if($customer->gst_number)
                                            <div class="gst-status">
                                                <span class="gst-dot"></span> ACTIVE GST
                                            </div>
                                            <span class="gst-number">{{ $customer->gst_number }}</span>
                                        @else
                                            <span class="badge bg-light text-muted border">UNREGISTERED</span>
                                        @endif
                                    </td>

                                    {{-- ACTIONS --}}
                                    <td>
                                        <div class="action-buttons">
                                            {{-- VIEW MODAL TRIGGER --}}
                                            <button type="button" class="view-btn" data-bs-toggle="modal" data-bs-target="#customerModal{{ $customer->id }}">
                                                <i class="fa-solid fa-eye"></i> View
                                            </button>

                                            {{-- EDIT --}}
                                            <a href="{{ url('/customers/'.$customer->id.'/edit') }}" class="edit-btn">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </a>

                                            {{-- DELETE --}}
                                            <form action="{{ url('/customers/'.$customer->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this customer?')">
                                                    <i class="fa-solid fa-trash-can"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                {{-- MODAL FOR CUSTOMER DETAILS VIEW --}}
                                <div class="modal fade" id="customerModal{{ $customer->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4 border-0 shadow">
                                            <div class="modal-header bg-primary text-white rounded-top-4">
                                                <h5 class="modal-title fw-bold">
                                                    <i class="fa-solid fa-id-badge me-2"></i> Customer Profile #{{ $customer->id }}
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <div class="text-center mb-3">
                                                    <div class="customer-avatar mx-auto mb-2" style="width:55px;height:55px;font-size:22px;">{{ $initial }}</div>
                                                    <h5 class="fw-bold text-dark mb-0">{{ $customer->customer_name }}</h5>
                                                    <span class="badge bg-primary-subtle text-primary border">{{ $customer->gst_number ?? 'Non-GST' }}</span>
                                                </div>
                                                <hr>
                                                <div class="mb-2"><strong><i class="fa-solid fa-envelope text-muted me-2"></i> Email:</strong> {{ $customer->email }}</div>
                                                <div class="mb-2"><strong><i class="fa-solid fa-phone text-muted me-2"></i> Phone:</strong> {{ $customer->phone }}</div>
                                                <div class="mb-2"><strong><i class="fa-solid fa-location-dot text-muted me-2"></i> Address:</strong> {{ $customer->address ?? 'Not Provided' }}</div>
                                                <div class="mb-0"><strong><i class="fa-solid fa-calendar-check text-muted me-2"></i> Registered:</strong> {{ $customer->created_at->format('d M Y, h:i A') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon"><i class="fa-solid fa-user-slash"></i></div>
                    <h5>No Customers Found</h5>
                    <p>Try another search or add a new customer to get started.</p>
                    <a href="{{ url('/customers/create') }}" class="add-customer-btn">
                        <i class="fa-solid fa-user-plus"></i> Add Customer
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function copyText(text) {
        navigator.clipboard.writeText(text);
        alert('Copied to clipboard: ' + text);
    }
</script>

@endsection