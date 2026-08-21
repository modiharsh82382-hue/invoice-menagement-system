@extends('layouts.app')

@section('title', 'Edit Customer - Invoice System')

@section('content')

<style>
    .customer-hero-edit {
        background: linear-gradient(135deg, #1e40af 0%, #172554 100%);
        border-radius: 20px;
        padding: 35px 30px;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 14px 28px rgba(30, 64, 175, 0.20);
        margin-bottom: 30px;
    }

    .customer-hero-edit::before {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.07);
        right: -50px;
        top: -70px;
        pointer-events: none;
    }

    .hero-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

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
        border: 1px dashed #94a3b8;
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

    .custom-label {
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
        display: block;
    }

    .custom-label .req-star {
        color: #ef4444;
    }

    .custom-input-group {
        display: flex;
        width: 100%;
        margin-bottom: 22px;
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
        color: #2563eb;
        font-size: 16px;
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
        outline: none;
        transition: all 0.2s;
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
    }

    .custom-input-field:focus,
    .custom-textarea-field:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3.5px rgba(37, 99, 235, 0.12);
    }

    .field-error-msg {
        font-size: 12px;
        color: #dc2626;
        margin-top: -16px;
        margin-bottom: 16px;
        font-weight: 600;
    }

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
        background: #2563eb;
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
    }

    .btn-action-primary:hover {
        background: #1d4ed8;
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

<div class="customer-hero-edit">
    <div class="hero-content">
        <div class="hero-title">
            <i class="fa-solid fa-user-pen"></i>
            <span>Edit Customer Profile</span>
        </div>
        <p class="mb-0 text-white-50">
            Updating registered identity for: <strong>{{ $customer->customer_name }}</strong> (ID: #{{ $customer->id }})
        </p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="form-container-card">
            <div class="section-divider-title">
                <i class="fa-solid fa-pen-to-square text-primary"></i>
                <span>Update Customer Details</span>
            </div>

            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- NAME -->
                <label class="custom-label">Customer Name <span class="req-star">*</span></label>
                <div class="custom-input-group">
                    <div class="custom-input-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <input type="text" name="customer_name" id="input_customer_name" class="custom-input-field" 
                           value="{{ old('customer_name', $customer->customer_name) }}" oninput="updatePreview()" required>
                </div>
                @error('customer_name')
                    <div class="field-error-msg"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror

                <!-- EMAIL + PHONE -->
                <div class="row">
                    <div class="col-md-6">
                        <label class="custom-label">Email Address <span class="req-star">*</span></label>
                        <div class="custom-input-group">
                            <div class="custom-input-icon"><i class="fa-solid fa-envelope"></i></div>
                            <input type="email" name="email" id="input_email" class="custom-input-field" 
                                   value="{{ old('email', $customer->email) }}" oninput="updatePreview()" required>
                        </div>
                        @error('email')
                            <div class="field-error-msg"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="custom-label">Mobile Number <span class="req-star">*</span></label>
                        <div class="custom-input-group">
                            <div class="custom-input-icon"><i class="fa-solid fa-phone"></i></div>
                            <input type="tel" name="phone" id="input_phone" class="custom-input-field" maxlength="10" 
                                   value="{{ old('phone', $customer->phone) }}" 
                                   oninput="this.value = this.value.replace(/[^0-9]/g, ''); updatePreview();" required>
                        </div>
                        @error('phone')
                            <div class="field-error-msg"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- ADDRESS -->
                <label class="custom-label">Billing Address <span class="req-star">*</span></label>
                <div class="custom-input-group">
                    <div class="custom-input-icon" style="height: auto; align-items: flex-start; padding-top: 14px;">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <textarea name="address" id="input_address" class="custom-textarea-field" oninput="updatePreview()" required>{{ old('address', $customer->address) }}</textarea>
                </div>
                @error('address')
                    <div class="field-error-msg"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror

                <!-- GST NUMBER -->
                <label class="custom-label">GST Number <span class="req-star">*</span></label>
                <div class="custom-input-group">
                    <div class="custom-input-icon"><i class="fa-solid fa-building-columns"></i></div>
                    <input type="text" name="gst_number" id="input_gst" class="custom-input-field" maxlength="15" 
                           value="{{ old('gst_number', $customer->gst_number) }}" style="text-transform: uppercase;" 
                           oninput="this.value = this.value.toUpperCase(); updatePreview();" required>
                </div>
                @error('gst_number')
                    <div class="field-error-msg"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror

                <!-- ACTIONS -->
                <div class="form-footer-actions">
                    <a href="/customers" class="btn-action-secondary">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Cancel</span>
                    </a>
                    <button type="submit" class="btn-action-primary">
                        <i class="fa-solid fa-check"></i>
                        <span>Update Customer</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- PREVIEW SIDEBAR -->
    <div class="col-lg-4">
        <div class="preview-badge-card shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-primary text-uppercase px-2 py-1" style="font-size: 10px;">Live Update Tracker</span>
                <span class="text-muted" style="font-size: 11px;">#ID: {{ $customer->id }}</span>
            </div>

            <h5 class="fw-bold mb-1 text-dark" id="badge_name">{{ $customer->customer_name }}</h5>
            <div class="mb-3">
                <span class="badge-gst" id="badge_gst">GSTIN: {{ $customer->gst_number }}</span>
            </div>

            <hr class="my-3 text-muted">

            <div class="mb-2 text-secondary small"><i class="fa-solid fa-envelope me-2 text-primary"></i><span id="badge_email">{{ $customer->email }}</span></div>
            <div class="mb-2 text-secondary small"><i class="fa-solid fa-phone me-2 text-primary"></i><span id="badge_phone">+91 {{ $customer->phone }}</span></div>
            <div class="mb-2 text-secondary small"><i class="fa-solid fa-location-dot me-2 text-primary"></i><span id="badge_address">{{ $customer->address }}</span></div>
        </div>
    </div>
</div>

<script>
    function updatePreview() {
        document.getElementById('badge_name').innerText = document.getElementById('input_customer_name').value || 'Customer Name';
        document.getElementById('badge_email').innerText = document.getElementById('input_email').value || 'email@example.com';
        document.getElementById('badge_phone').innerText = '+91 ' + (document.getElementById('input_phone').value || '0000000000');
        document.getElementById('badge_address').innerText = document.getElementById('input_address').value || 'Address...';
        document.getElementById('badge_gst').innerText = 'GSTIN: ' + (document.getElementById('input_gst').value || '---');
    }
</script>

@endsection