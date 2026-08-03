<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Management</title>

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
        </div>

    </div>
</nav>

<div class="container mt-4">

    @if(session('success'))

        <div class="alert alert-success" id="success-alert">

            {{ session('success') }}

        </div>

        <script>
            setTimeout(function () {
                let alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000);
        </script>

    @endif

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Invoice List</h4>

            <span class="badge bg-light text-dark fs-6">
                Total : {{ count($invoices) }}
            </span>

        </div>

        <div class="card-body">

            <div class="row mb-3">

                <div class="col-md-6">

                    <a href="{{ route('invoices.create') }}" class="btn btn-success">

                        + Add Invoice

                    </a>

                </div>

                <div class="col-md-6">

                    <form action="{{ route('invoices.index') }}" method="GET" class="d-flex">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control me-2"
                            placeholder="Search Invoice">

                        <button class="btn btn-primary">

                            Search

                        </button>

                    </form>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                    <tr>

                        <th>No.</th>

                        <th>Invoice No</th>

                        <th>Customer</th>

                        <th>Date</th>

                        <th>Total</th>

                        <th>Status</th>

                        <th width="170">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($invoices as $invoice)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $invoice->invoice_number }}</td>

                            <td>{{ $invoice->customer_name }}</td>

                            <td>{{ $invoice->invoice_date }}</td>

                            <td>₹ {{ number_format($invoice->total_amount,2) }}</td>

                            <td>

                                @if($invoice->status=="Paid")

                                    <span class="badge bg-success">
                                        Paid
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('invoices.edit',$invoice->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('invoices.destroy',$invoice->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this invoice?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center text-danger">

                                No Invoice Found

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<footer class="text-center mt-4 mb-3 text-muted">

    © 2026 Invoice Management System | Developed by Team

</footer>

</body>
</html>