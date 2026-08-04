<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Module</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            Invoice Management System
        </a>

        <div>
            <a href="/" class="btn btn-light btn-sm">Dashboard</a>
            <a href="/customers" class="btn btn-light btn-sm">Customers</a>
            <a href="/products" class="btn btn-light btn-sm">Products</a>
            <a href="/invoices" class="btn btn-light btn-sm">Invoices</a>
        </div>

    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                Reports Module
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <!-- Customer Report -->
                <div class="col-md-4 mb-3">

                    <div class="card border-primary h-100">

                        <div class="card-body text-center">

                            <h4>Customer Report</h4>

                            <p class="text-muted">
                                Generate Customer Report
                            </p>

                            <a href="#" class="btn btn-primary">
                                View Report
                            </a>

                        </div>

                    </div>

                </div>

                <!-- Invoice Report -->
                <div class="col-md-4 mb-3">

                    <div class="card border-success h-100">

                        <div class="card-body text-center">

                            <h4>Invoice Report</h4>

                            <p class="text-muted">
                                Generate Invoice Report
                            </p>

                            <a href="#" class="btn btn-success">
                                View Report
                            </a>

                        </div>

                    </div>

                </div>

                <!-- Sales Report -->
                <div class="col-md-4 mb-3">

                    <div class="card border-warning h-100">

                        <div class="card-body text-center">

                            <h4>Sales Report</h4>

                            <p class="text-muted">
                                Generate Sales Report
                            </p>

                            <a href="#" class="btn btn-warning text-dark">
                                View Report
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <hr>

            <div class="text-center">

                <a href="/reports/pdf" class="btn btn-danger me-2">
                    Export PDF
                </a>

                <a href="/reports/excel" class="btn btn-success me-2">
                    Export Excel
                </a>

                <a href="/" class="btn btn-secondary">
                    Back Dashboard
                </a>

            </div>

        </div>

    </div>

</div>

<footer class="text-center mt-5 mb-3 text-muted">
    © 2026 Invoice Management System
</footer>

</body>
</html>