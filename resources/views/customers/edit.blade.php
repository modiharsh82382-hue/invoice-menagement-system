<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Invoice Management System</a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="/">Dashboard</a>
            <a class="nav-link active" href="/customers">Customers</a>
            <a class="nav-link" href="#">Products</a>
            <a class="nav-link" href="#">Invoices</a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Edit Customer</h2>
        </div>

        <div class="card-body">

            <form action="/customers/{{ $customer->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Customer Name</label>
                    <input
                        type="text"
                        name="customer_name"
                        class="form-control @error('customer_name') is-invalid @enderror"
                        value="{{ old('customer_name', $customer->customer_name) }}"
                    >

                    @error('customer_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $customer->email) }}"
                    >

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input
                        type="text"
                        name="phone"
                        maxlength="10"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $customer->phone) }}"
                    >

                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>

                    <textarea
                        name="address"
                        rows="4"
                        class="form-control @error('address') is-invalid @enderror"
                    >{{ old('address', $customer->address) }}</textarea>

                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">GST Number</label>

                    <input
                        type="text"
                        name="gst_number"
                        maxlength="15"
                        class="form-control @error('gst_number') is-invalid @enderror"
                        value="{{ old('gst_number', $customer->gst_number) }}"
                    >

                    @error('gst_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-warning">
                    Update Customer
                </button>

                <a href="/customers" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

<footer class="text-center mt-5 mb-3 text-muted">
    © 2026 Invoice Management System
</footer>

</body>
</html>