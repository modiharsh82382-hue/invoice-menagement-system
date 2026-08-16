<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Invoice Report</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
        }

        .date {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #333;
            color: white;
            padding: 8px;
            border: 1px solid #333;
        }

        td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        .paid {
            color: green;
            font-weight: bold;
        }

        .pending {
            color: orange;
            font-weight: bold;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Invoice Management System</h1>

    <div class="date">
        Invoice Report
    </div>

    <table>

        <thead>
            <tr>
                <th>#</th>
                <th>Invoice Number</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($invoices as $invoice)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $invoice->invoice_number }}
                    </td>

                    <td>
                        {{ $invoice->customer_name }}
                    </td>

                    <td>
                        {{ $invoice->invoice_date }}
                    </td>

                    <td>
                        ₹ {{ number_format($invoice->total_amount, 2) }}
                    </td>

                    <td class="{{ strtolower($invoice->status) }}">
                        {{ $invoice->status }}
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" style="text-align:center;">
                        No invoices found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="total">
        Total Revenue:
        ₹ {{ number_format($invoices->where('status', 'Paid')->sum('total_amount'), 2) }}
    </div>

</body>
</html>