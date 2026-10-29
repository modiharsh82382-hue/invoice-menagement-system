<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Module</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .report-hero{
            min-height:112px;
            margin-bottom:24px;
            padding:24px 28px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            border-radius:18px;
            color:#fff;
            background:linear-gradient(110deg,#142b62 0%,#1769e8 100%);
            box-shadow:0 12px 28px rgba(24,78,155,.16);
        }

        .report-hero h1{
            margin:0 0 5px;
            font-size:27px;
            font-weight:800;
        }

        .report-hero p{
            margin:0;
            font-size:14px;
            opacity:.92;
        }

        .card-box{
            border-radius:15px;
            color:white;
            padding:20px;
            transition:0.3s;
        }

        .card-box:hover{
            transform:scale(1.03);
        }
    </style>

</head>
<body>

@include('partials.app-navbar')

<div class="container page-wrapper">

    <header class="report-hero">
        <h1>Reports</h1>
        <p>Review invoice activity, apply filters, and export your records.</p>
    </header>

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card-box bg-primary text-center">

                <h5>Total Customers</h5>

                <h2>{{ $totalCustomers }}</h2>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card-box bg-success text-center">

                <h5>Total Invoices</h5>

                <h2>{{ $totalInvoices }}</h2>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card-box bg-warning text-center">

                <h5>Paid Invoices</h5>

                <h2>{{ $paidInvoices }}</h2>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card-box bg-danger text-center">

                <h5>Pending</h5>

                <h2>{{ $pendingInvoices }}</h2>

            </div>

        </div>

    </div>

    <div class="row mt-2">

        <div class="col-md-12">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">

                    <h4>Total Revenue</h4>

                </div>

                <div class="card-body text-center">

                    <h2 class="text-success">
                        ₹ {{ number_format($totalRevenue,2) }}
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow mt-4">

        <div class="card-header bg-primary text-white">

            <div class="d-flex justify-content-between">

                <h4>Latest Invoice Report</h4>

                <div>

                    <a href="{{ route('reports.pdf', request()->query()) }}"
                        class="btn btn-danger btn-sm">
                            Export PDF
                    </a>

                    <a href="{{ route('reports.excel', request()->query()) }}" class="btn btn-success btn-sm">
                        Export for Excel (CSV)
                    </a>

                    <button onclick="window.print()" class="btn btn-secondary btn-sm">
                        Print
                    </button>

                </div>

            </div>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Invoice No</th>

                    <th>Customer</th>

                    <th>Date</th>

                    <th>Total</th>

                    <th>Status</th>

                </tr>

                </thead>

                <tbody>

                @forelse($invoices as $invoice)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $invoice->invoice_number }}</td>

                    <td>{{ $invoice->customer_name }}</td>

                    <td>{{ $invoice->invoice_date }}</td>

                    <td>₹ {{ $invoice->total_amount }}</td>

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

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center text-danger">

                        No Invoice Found

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>
        <div class="card shadow mt-4">

    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Search & Filter Report</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('reports.index') }}" method="GET">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Search Invoice / Customer
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Invoice No or Customer Name">

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="">All</option>

                        <option value="Paid"
                            {{ request('status') == 'Paid' ? 'selected' : '' }}>
                            Paid
                        </option>

                        <option value="Pending"
                            {{ request('status') == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                    </select>

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">
                        From Date
                    </label>

                    <input
                        type="date"
                        name="from_date"
                        value="{{ request('from_date') }}"
                        class="form-control">

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">
                        To Date
                    </label>

                    <input
                        type="date"
                        name="to_date"
                        value="{{ request('to_date') }}"
                        class="form-control">

                </div>

                <div class="col-md-2 mb-3 d-flex align-items-end">

                    <button class="btn btn-primary w-100">
                        Search
                    </button>

                </div>

            </div>
            <a href="{{ route('reports.index') }}"
                class="btn btn-secondary btn-sm">

                Clear Filters

                    </a>

                </form>

            </div>

        </div>
    </div>

</div>

<footer class="text-center mt-5 mb-3 text-muted">

    © 2026 Invoice Management System

</footer>

</body>
</html>
