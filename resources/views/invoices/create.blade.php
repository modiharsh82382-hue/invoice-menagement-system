<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Invoice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('invoices.index') }}">
            Invoice Management System
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h2>Add New Invoice</h2>
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

            <form action="{{ route('invoices.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Invoice Number</label>

                    <input
                        type="text"
                        name="invoice_number"
                        class="form-control"
                        value="{{ old('invoice_number') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Customer</label>

                    <select
                        name="customer_name"
                        class="form-select"
                        required>

                        <option value="">Select Customer</option>

                        <option value="Harsh Modi">Harsh Modi</option>
                        <option value="Krunal Darji">Krunal Darji</option>
                        <option value="Happy Patel">Happy Patel</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Invoice Date</label>

                    <input
                        type="date"
                        name="invoice_date"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Amount</label>

                    <input
                        type="number"
                        step="0.01"
                        name="total_amount"
                        class="form-control"
                        required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="Pending">Pending</option>
                        <option value="Paid">Paid</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Save Invoice
                </button>

                <a href="{{ route('invoices.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>