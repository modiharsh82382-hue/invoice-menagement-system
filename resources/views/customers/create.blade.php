@extends('layouts.app')

@section('title', 'Add New Customer - Invoice System')

@section('content')

<style>
    /* ==========================================================
       HERO BANNER & GRADIENT HEADER
    ========================================================== */
    .customer-hero {
        background: linear-gradient(135deg, #0d6efd 0%, #0a4296 100%);
        border-radius: 20px;
        padding: 35px 30px;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 14px 28px rgba(13, 110, 253, 0.18), 0 10px 10px rgba(13, 110, 253, 0.12);
        margin-bottom: 30px;
    }

    .customer-hero::before {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        right: -60px;
        top: -80px;
        pointer-events: none;
    }

    .customer-hero::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        right: 80px;
        bottom: -90px;
        pointer-events: none;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 12px;
        letter-spacing: -0.5px;
    }

    .hero-subtitle {
        margin: 0;
        font-size: 15px;
        opacity: 0.92;
        font-weight: 400;
    }

    /* ==========================================================
       MAIN FORM CARD & CARDS LAYOUT
    ========================================================== */
    .form-container-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
        padding: 32px;
        margin-bottom: 40px;
    }

    .preview-badge-card {
        background: #f8fafc;
        border-radius: 20px;
        border: 1px dashed #cbd5e1;
        padding: 26px;
        position: sticky;
        top: 20px;
    }

    .section-divider-title {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 24px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-divider-title i {
        color: #0d6efd;
    }

    /* ==========================================================
       INPUT CONTROLS & GROUP STYLING
    ========================================================== */
    .form-group-wrapper {
        margin-bottom: 22px;
    }

    .custom-label {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
        display: block;
    }

    .custom-label .req-star {
        color: #ef4444;
        margin-left: 2px;
    }

    .custom-input-group {
        display: flex;
        width: 100%;
        position: relative;
    }

    .custom-input-icon {
        width: 48px;
        min-width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        border-right: none;
        border-radius: 10px 0 0 10px;
        color: #0d6efd;
        font-size: 16px;
        transition: all 0.2s ease-in-out;
    }

    .custom-input-field {
        width: 100%;
        height: 48px;
        border: 1px solid #cbd5e1;
        border-radius: 0 10px 10px 0;
        padding: 0 16px;
        font-size: 14px;
        font-weight: 500;
        color: #0f172a;
        background-color: #ffffff;
        outline: none;
        transition: all 0.2s ease-in-out;
    }

    .custom-textarea-field {
        width: 100%;
        min-height: 110px;
        border: 1px solid #cbd5e1;
        border-radius: 0 10px 10px 0;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 500;
        color: #0f172a;
        outline: none;
        resize: vertical;
        transition: all 0.2s ease-in-out;
    }

    .custom-input-field:focus,
    .custom-textarea-field:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3.5px rgba(13, 110, 253, 0.12);
    }

    .custom-input-field:focus + .custom-input-icon,
    .custom-input-group:focus-within .custom-input-icon {
        background-color: #e0edff;
        border-color: #0d6efd;
        color: #0a58ca;
    }

    .field-hint-text {
        font-size: 12px;
        color: #64748b;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .field-error-msg {
        font-size: 12px;
        color: #dc2626;
        margin-top: 6px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* ==========================================================
       ACTION BUTTONS & TOOLBAR
    ========================================================== */
    .form-footer-actions {
        margin-top: 30px;
        padding-top: 24px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
    }

    .btn-action-primary {
        background: #0d6efd;
        color: #ffffff;
        border: none;
        padding: 12px 28px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25);
    }

    .btn-action-primary:hover {
        background: #0b5ed7;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.35);
    }

    .btn-action-secondary {
        background: #f1f5f9;
        color: #475569;
        border: 1px solid #cbd5e1;
        padding: 12px 24px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-action-secondary:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .btn-demo-fill {
        background: #f8fafc;
        color: #64748b;
        border: 1px dashed #94a3b8;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-demo-fill:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    /* ==========================================================
       PREVIEW CARD STYLING
    ========================================================== */
    .preview-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #dbeafe;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .preview-info-row {
        margin-bottom: 10px;
        font-size: 13px;
        color: #475569;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .preview-info-row i {
        width: 18px;
        color: #94a3b8;
    }

    .badge-gst {
        background-color: #e0f2fe;
        color: #0369a1;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 8px;
        border-radius: 6px;
        display: inline-block;
    }
</style>

<!-- HERO HEADER -->
<div class="customer-hero">
    <div class="hero-content">
        <div class="hero-title">
            <i class="fa-solid fa-user-plus"></i>
            <span>Add New Customer</span>
        </div>
        <p class="hero-subtitle">
            Create customer directory records with billing details, GST specifications, and contact parameters.
        </p>
    </div>
</div>

<div class="row">
    <!-- FORM COLUMN -->
    <div class="col-lg-8">
        <div class="form-container-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="section-divider-title m-0 p-0 border-0">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Customer Details Form</span>
                </div>
                <button type="button" class="btn-demo-fill" onclick="autoFillDemo()">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> Auto Fill Demo
                </button>
            </div>

            <form action="/customers" method="POST" id="customerCreateForm">
                @csrf

                <!-- CUSTOMER NAME -->
                <div class="form-group-wrapper">
                    <label class="custom-label">
                        Customer Full Name <span class="req-star">*</span>
                    </label>
                    <div class="custom-input-group">
                        <div class="custom-input-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input
                            type="text"
                            name="customer_name"
                            id="input_customer_name"
                            class="custom-input-field"
                            placeholder="e.g. Acme Corporation or Ramesh Patel"
                            value="{{ old('customer_name') }}"
                            oninput="updatePreview()"
                            required>
                    </div>
                    @error('customer_name')
                        <div class="field-error-msg">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- EMAIL + PHONE -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-wrapper">
                            <label class="custom-label">
                                Official Email Address <span class="req-star">*</span>
                            </label>
                            <div class="custom-input-group">
                                <div class="custom-input-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <input
                                    type="email"
                                    name="email"
                                    id="input_email"
                                    class="custom-input-field"
                                    placeholder="client@domain.com"
                                    value="{{ old('email') }}"
                                    oninput="updatePreview()"
                                    required>
                            </div>
                            @error('email')
                                <div class="field-error-msg">
                                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group-wrapper">
                            <label class="custom-label">
                                Mobile Number (10 Digits) <span class="req-star">*</span>
                            </label>
                            <div class="custom-input-group">
                                <div class="custom-input-icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <input
                                    type="tel"
                                    name="phone"
                                    id="input_phone"
                                    class="custom-input-field"
                                    placeholder="10 digit mobile"
                                    maxlength="10"
                                    value="{{ old('phone') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, ''); updatePreview();"
                                    required>
                            </div>
                            <div class="field-hint-text">
                                <i class="fa-solid fa-circle-info"></i> Numerical values only without country code.
                            </div>
                            @error('phone')
                                <div class="field-error-msg">
                                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- ADDRESS -->
                <div class="form-group-wrapper">
                    <label class="custom-label">
                        Billing & Registered Address <span class="req-star">*</span>
                    </label>
                    <div class="custom-input-group">
                        <div class="custom-input-icon" style="height: auto; align-items: flex-start; padding-top: 14px;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <textarea
                            name="address"
                            id="input_address"
                            class="custom-textarea-field"
                            placeholder="Street address, city, state and PIN code"
                            oninput="updatePreview()"
                            required>{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                        <div class="field-error-msg">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- GST NUMBER -->
                <div class="form-group-wrapper">
                    <label class="custom-label">
                        GST Identification Number (GSTIN) <span class="req-star">*</span>
                    </label>
                    <div class="custom-input-group">
                        <div class="custom-input-icon">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <input
                            type="text"
                            name="gst_number"
                            id="input_gst"
                            class="custom-input-field"
                            placeholder="24ABCDE1234F1Z5"
                            maxlength="15"
                            value="{{ old('gst_number') }}"
                            style="text-transform: uppercase; font-family: monospace; letter-spacing: 1px;"
                            oninput="this.value = this.value.toUpperCase(); updatePreview();"
                            required>
                    </div>
                    <div class="field-hint-text">
                        <i class="fa-solid fa-shield-halved"></i> Must follow standard 15-character statutory GST format.
                    </div>
                    @error('gst_number')
                        <div class="field-error-msg">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- ACTIONS -->
                <div class="form-footer-actions">
                    <a href="/customers" class="btn-action-secondary">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Cancel & Return</span>
                    </a>

                    <div class="d-flex gap-2">
                        <button type="reset" class="btn-action-secondary" onclick="setTimeout(updatePreview, 50)">
                            <i class="fa-solid fa-rotate-left"></i> Reset
                        </button>
                        <button type="submit" class="btn-action-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Save Customer Data</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- LIVE VIEW & PREVIEW COLUMN -->
    <div class="col-lg-4">
        <div class="preview-badge-card shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-primary text-uppercase px-2 py-1" style="font-size: 10px;">Live View Card</span>
                <span class="text-muted" style="font-size: 11px;"><i class="fa-solid fa-bolt text-warning"></i> Real-time</span>
            </div>

            <div class="preview-avatar" id="badge_avatar">
                <i class="fa-solid fa-building-user"></i>
            </div>

            <h5 class="fw-bold mb-1 text-dark" id="badge_name">Customer Name</h5>
            <div class="mb-3">
                <span class="badge-gst" id="badge_gst">GST: NOT PROVIDED</span>
            </div>

            <hr class="my-3 text-muted">

            <div class="preview-info-row">
                <i class="fa-solid fa-envelope"></i>
                <span id="badge_email">no-email@customer.com</span>
            </div>

            <div class="preview-info-row">
                <i class="fa-solid fa-phone"></i>
                <span id="badge_phone">+91 00000 00000</span>
            </div>

            <div class="preview-info-row">
                <i class="fa-solid fa-location-dot"></i>
                <span id="badge_address">Billing address will render here...</span>
            </div>
        </div>
    </div>
</div>

<!-- CLIENT JAVASCRIPT HELPERS -->
<script>
    function updatePreview() {
        const nameVal = document.getElementById('input_customer_name').value.trim();
        const emailVal = document.getElementById('input_email').value.trim();
        const phoneVal = document.getElementById('input_phone').value.trim();
        const addressVal = document.getElementById('input_address').value.trim();
        const gstVal = document.getElementById('input_gst').value.trim();

        document.getElementById('badge_name').innerText = nameVal || 'Customer Name';
        document.getElementById('badge_email').innerText = emailVal || 'no-email@customer.com';
        document.getElementById('badge_phone').innerText = phoneVal ? '+91 ' + phoneVal : '+91 00000 00000';
        document.getElementById('badge_address').innerText = addressVal || 'Billing address will render here...';
        document.getElementById('badge_gst').innerText = gstVal ? 'GSTIN: ' + gstVal : 'GST: NOT PROVIDED';
    }

    function autoFillDemo() {
        document.getElementById('input_customer_name').value = 'TechCorp Solutions LLP';
        document.getElementById('input_email').value = 'billing@techcorp.in';
        document.getElementById('input_phone').value = '9876543210';
        document.getElementById('input_address').value = '402, Titanium City Centre, Satellite, Ahmedabad, Gujarat - 380015';
        document.getElementById('input_gst').value = '24ABCDE1234F1Z5';
        updatePreview();
    }

    document.addEventListener("DOMContentLoaded", function() {
        updatePreview();
    });
</script>

@endsection