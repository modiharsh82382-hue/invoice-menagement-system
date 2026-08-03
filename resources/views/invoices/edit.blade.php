<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Invoice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('invoices.index') }}">
            Invoice Management System
        </a>

        <div>
            <a href="/" class="btn btn-light btn-sm">Dashboard</a>
            <a href="/customers" class="btn btn-light btn-sm">Customers</a>
            <a href="/products" class="btn btn-light btn-sm">Products</a>
            <a href="{{ route('invoices.index') }}" class="btn btn-light btn-sm">Invoices</a>
        </div>

    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h3>Edit Invoice</h3>

        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('invoices.update',$invoice->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">Invoice Number</label>

                    <input
                        type="text"
                        name="invoice_number"
                        class="form-control"
                        value="{{ old('invoice_number',$invoice->invoice_number) }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Customer Name</label>

                    <input
                        type="text"
                        name="customer_name"
                        class="form-control"
                        value="{{ old('customer_name',$invoice->customer_name) }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Invoice Date</label>

                    <input
                        type="date"
                        name="invoice_date"
                        class="form-control"
                        value="{{ old('invoice_date',$invoice->invoice_date) }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">Total Amount</label>

                    <input
                        type="number"
                        step="0.01"
                        name="total_amount"
                        class="form-control"
                        value="{{ old('total_amount',$invoice->total_amount) }}"
                        required>

                </div>

                <div class="mb-4">

                    <label class="form-label">Status</label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="Pending"
                            {{ $invoice->status=='Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Paid"
                            {{ $invoice->status=='Paid' ? 'selected' : '' }}>
                            Paid
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    Update Invoice

                </button>

                <a
                    href="{{ route('invoices.index') }}"
                    class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

<footer class="text-center mt-4 text-muted">

© 2026 Invoice Management System

</footer>

</body>
</html>