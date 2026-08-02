<!DOCTYPE html>
<html>
<head>
    <title>Invoice Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3>Invoice List</h3>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <div class="d-flex justify-content-between mb-3">

                <a href="/invoices/create" class="btn btn-success">

                    + Add Invoice

                </a>

                <form action="/invoices" method="GET">

                    <input
                        type="text"
                        name="search"
                        placeholder="Search Invoice"
                        class="form-control">

                </form>

            </div>

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Invoice No</th>

                    <th>Customer</th>

                    <th>Date</th>

                    <th>Total</th>

                    <th>Status</th>

                    <th width="180">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($invoices as $invoice)

                <tr>

                    <td>{{ $invoice->id }}</td>

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

                    <td>

                        <a href="/invoices/{{ $invoice->id }}/edit"
                           class="btn btn-primary btn-sm">

                            Edit

                        </a>

                        <form action="/invoices/{{ $invoice->id }}"
                              method="POST"
                              style="display:inline;">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this Invoice?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No Invoice Found

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>