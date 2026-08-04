<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h2>Reports Module</h2>
        </div>

        <div class="card-body text-center">

            <h4 class="mb-4">Invoice Management Reports</h4>

            <a href="{{ route('reports.pdf') }}" class="btn btn-danger me-2">
                Export PDF
            </a>

            <a href="{{ route('reports.excel') }}" class="btn btn-success me-2">
                Export Excel
            </a>

            <br><br>

            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                Back to Dashboard
            </a>

        </div>

    </div>

</div>

</body>
</html>