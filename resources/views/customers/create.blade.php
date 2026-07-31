@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h3>Add New Customer</h3>

    </div>

    <div class="card-body">

        <form action="/customers" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">Customer Name</label>

                <input
                    type="text"
                    name="customer_name"
                    class="form-control"
                    value="{{ old('customer_name') }}">

                @error('customer_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}">

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">Phone</label>

                <input
                    type="tel"
                    name="phone"
                    class="form-control"
                    maxlength="10"
                    value="{{ old('phone') }}">

                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">Address</label>

                <textarea
                    name="address"
                    class="form-control"
                    rows="3">{{ old('address') }}</textarea>

                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">GST Number</label>

                <input
                    type="text"
                    name="gst_number"
                    class="form-control"
                    maxlength="15"
                    value="{{ old('gst_number') }}">

                @error('gst_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <button class="btn btn-success">

                Save Customer

            </button>

            <a href="/customers" class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

@endsection