<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Invoice Management System</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f8fd;
            color: #172033;
        }

        .main-navbar {
            background: linear-gradient(100deg, #1267e8, #1557c8, #1649a5);
            box-shadow: 0 6px 22px rgba(18, 76, 170, 0.18);
            min-height: 70px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand { color: white !important; font-size: 20px; font-weight: 700; }
        .nav-menu { display: flex; align-items: center; gap: 5px; }
        .nav-menu a {
            color: rgba(255,255,255,0.92);
            text-decoration: none;
            padding: 9px 13px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.2s;
        }
        .nav-menu a:hover, .nav-menu a.active {
            color: white;
            background: rgba(255,255,255,0.18);
        }

        .page-wrapper { padding: 32px 0 45px; }
        .hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg, #102f72, #145fca, #1677f3);
            border-radius: 20px;
            padding: 28px 30px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 12px 30px rgba(18, 76, 170, 0.20);
        }
        .hero::after {
            content: "";
            position: absolute;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            right: -55px;
            top: -95px;
        }
        .hero h1 { font-size: 27px; font-weight: 800; margin: 0 0 5px; }
        .hero p { margin: 0; font-size: 13px; opacity: 0.9; }
        .clock-box {
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.18);
            padding: 9px 14px;
            border-radius: 30px;
            font-size: 12px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e3e9f2;
            border-radius: 17px;
            padding: 21px;
            height: 100%;
            box-shadow: 0 7px 22px rgba(23,52,90,0.06);
            transition: 0.25s;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 13px 30px rgba(23,52,90,0.11);
        }
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-bottom: 15px;
        }
        .icon-blue { background: #e8f1ff; color: #1769e8; }
        .icon-purple { background: #f2eaff; color: #7952b3; }
        .icon-orange { background: #fff1df; color: #fd7e14; }
        .icon-green { background: #e7f8ef; color: #198754; }
        .icon-cyan { background: #e4f8fc; color: #0dcaf0; }

        .stat-label {
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .stat-value { color: #0f172a; font-size: 24px; font-weight: 800; margin-top: 3px; }
        .stat-description { color: #8a94a6; font-size: 11px; margin-top: 5px; }

        .content-card {
            background: white;
            border: 1px solid #e3e9f2;
            border-radius: 17px;
            padding: 23px;
            height: 100%;
            box-shadow: 0 7px 22px rgba(23,52,90,0.06);
        }
        .section-title { font-size: 17px; font-weight: 700; color: #172033; margin-bottom: 3px; }
        .section-subtitle { color: #8a94a6; font-size: 11px; }

        .action-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px;
            background: #f8fafc;
            border: 1px solid #e3e8ef;
            border-radius: 12px;
            text-decoration: none;
            color: #1e293b;
            transition: 0.2s;
            height: 100%;
        }
        .action-link:hover {
            background: #eef5ff;
            border-color: #bdd6ff;
            color: #1769e8;
            transform: translateX(3px);
        }
        .action-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 10px;
            background: #e8f1ff;
            color: #1769e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }
        .action-title { font-size: 13px; font-weight: 600; }
        .action-description { color: #8a94a6; font-size: 10px; margin-top: 2px; }

        .chart-container { position: relative; height: 300px; }
        .small-chart-container { position: relative; height: 250px; }

        .dashboard-table { width: 100%; border-collapse: collapse; }
        .dashboard-table th {
            color: #64748b;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            font-weight: 700;
            padding: 11px 8px;
            border-bottom: 1px solid #e8edf4;
        }
        .dashboard-table td {
            color: #334155;
            font-size: 11px;
            padding: 12px 8px;
            border-bottom: 1px solid #edf1f6;
        }
        .dashboard-table tr:last-child td { border-bottom: none; }
        .invoice-number { font-weight: 700; color: #1769e8; }
        .customer-name { font-weight: 600; color: #172033; }
        .status-badge { padding: 5px 9px; border-radius: 20px; font-size: 9px; font-weight: 700; }
        .status-paid { color: #198754; background: #e8f8ef; }
        .status-pending { color: #fd7e14; background: #fff1df; }

        .growth-box {
            background: #f8fafc;
            border: 1px solid #e8edf4;
            border-radius: 12px;
            padding: 13px;
        }
        .growth-value { font-size: 20px; font-weight: 800; }

        .customer-rank {
            width: 30px;
            height: 30px;
            border-radius: 9px;
            background: #e8f1ff;
            color: #1769e8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
        }
        .customer-row {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 0;
            border-bottom: 1px solid #edf1f6;
        }
        .customer-row:last-child { border-bottom: none; }
        .customer-info { flex: 1; }
        .customer-total { font-size: 12px; font-weight: 700; color: #172033; }

        .status-box { background: #f8fafc; border-radius: 12px; padding: 15px; }
        .status-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e6ebf2;
            font-size: 12px;
        }
        .status-row:last-child { border-bottom: none; }
        .status-label { color: #64748b; }
        .status-value { font-weight: 600; color: #172033; }
        .operational {
            color: #198754;
            background: #e8f8ef;
            border: 1px solid #bde8ce;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }
        .footer { text-align: center; color: #8a94a6; font-size: 11px; padding: 25px 0 10px; }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-receipt-cutoff me-2"></i>Invoice Management System
        </a>
        <div class="nav-menu ms-auto">
            <a href="{{ route('dashboard') }}" class="active"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a>
            <a href="{{ route('customers.index') }}"><i class="bi bi-people-fill me-1"></i> Customers</a>
            <a href="{{ route('products.index') }}"><i class="bi bi-box-seam-fill me-1"></i> Products</a>
            <a href="{{ route('invoices.index') }}"><i class="bi bi-receipt me-1"></i> Invoices</a>
            <a href="{{ route('reports.index') }}"><i class="bi bi-pie-chart-fill me-1"></i> Reports</a>
        </div>
    </div>
</nav>

<div class="container page-wrapper">

    <!-- HERO -->
    <div class="hero">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1><i class="bi bi-grid-1x2-fill me-2"></i> Dashboard</h1>
                <p>Overview of customers, products, invoices and sales.</p>
            </div>
            <div class="clock-box">
                <i class="bi bi-clock me-1"></i>
                <span id="live_clock">--:--:--</span>
            </div>
        </div>
    </div>

    <!-- MAIN STATS -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon icon-green"><i class="bi bi-currency-rupee"></i></div>
                <div class="stat-label">Total Revenue</div>
                <div class="stat-value">₹{{ number_format($totalSales ?? 0, 2) }}</div>
                <div class="stat-description">Revenue from paid invoices</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon icon-orange"><i class="bi bi-hourglass-split"></i></div>
                <div class="stat-label">Outstanding Amount</div>
                <div class="stat-value">₹{{ number_format($outstandingAmount ?? 0, 2) }}</div>
                <div class="stat-description">Amount from pending invoices</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon icon-blue"><i class="bi bi-receipt"></i></div>
                <div class="stat-label">Total Invoices</div>
                <div class="stat-value">{{ $totalInvoices ?? 0 }}</div>
                <div class="stat-description">Total invoices generated</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon icon-purple"><i class="bi bi-people"></i></div>
                <div class="stat-label">Total Customers</div>
                <div class="stat-value">{{ $totalCustomers ?? 0 }}</div>
                <div class="stat-description">Registered customers</div>
            </div>
        </div>
    </div>

    <!-- SECONDARY STATS -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon icon-cyan"><i class="bi bi-box-seam"></i></div>
                <div class="stat-label">Total Products</div>
                <div class="stat-value">{{ $totalProducts ?? 0 }}</div>
                <div class="stat-description">Products in catalogue</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon icon-green"><i class="bi bi-check-circle-fill"></i></div>
                <div class="stat-label">Paid Invoices</div>
                <div class="stat-value">{{ $paidInvoices ?? 0 }}</div>
                <div class="stat-description">Successfully paid invoices</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon icon-orange"><i class="bi bi-clock-history"></i></div>
                <div class="stat-label">Pending Invoices</div>
                <div class="stat-value">{{ $pendingInvoices ?? 0 }}</div>
                <div class="stat-description">Invoices awaiting payment</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon icon-blue"><i class="bi bi-graph-up-arrow"></i></div>
                <div class="stat-label">Revenue Growth</div>
                <div class="stat-value {{ ($revenueGrowth ?? 0) >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ ($revenueGrowth ?? 0) >= 0 ? '+' : '' }}{{ number_format($revenueGrowth ?? 0, 1) }}%
                </div>
                <div class="stat-description">Compared with previous month</div>
            </div>
        </div>
    </div>

    <!-- CHARTS -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="content-card">
                <div class="mb-3">
                    <div class="section-title"><i class="bi bi-bar-chart-line-fill text-primary me-2"></i> Revenue Overview</div>
                    <div class="section-subtitle">Paid invoice revenue for the last 6 months.</div>
                </div>
                <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="content-card">
                <div class="mb-3">
                    <div class="section-title"><i class="bi bi-pie-chart-fill text-primary me-2"></i> Invoice Status</div>
                    <div class="section-subtitle">Paid and pending invoice overview.</div>
                </div>
                <div class="small-chart-container">
                    <canvas id="invoiceStatusChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- MONTHLY COMPARISON -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="content-card">
                <div class="section-title mb-3"><i class="bi bi-calendar-check text-primary me-2"></i> Current Month Sales</div>
                <div class="growth-box">
                    <div class="text-muted small">{{ now()->format('F Y') }}</div>
                    <div class="growth-value text-success mt-1">₹{{ number_format($currentMonthSales ?? 0, 2) }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content-card">
                <div class="section-title mb-3"><i class="bi bi-calendar3 text-primary me-2"></i> Previous Month Sales</div>
                <div class="growth-box">
                    <div class="text-muted small">{{ now()->subMonth()->format('F Y') }}</div>
                    <div class="growth-value text-primary mt-1">₹{{ number_format($lastMonthSales ?? 0, 2) }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- RECENT INVOICES & TOP CUSTOMERS -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <div class="section-title"><i class="bi bi-receipt-cutoff text-primary me-2"></i> Recent Invoices</div>
                        <div class="section-subtitle">Latest invoices created in the system.</div>
                    </div>
                    <a href="{{ route('invoices.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="dashboard-table">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentInvoices ?? [] as $invoice)
                                <tr>
                                    <td class="invoice-number">
                                        {{ $invoice->invoice_number ?? '#' . $invoice->id }}
                                    </td>
                                    <td class="customer-name">{{ $invoice->customer_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}</td>
                                    <td>₹{{ number_format($invoice->total_amount, 2) }}</td>
                                    <td>
                                        @if($invoice->status === 'Paid')
                                            <span class="status-badge status-paid"><i class="bi bi-check-circle me-1"></i> Paid</span>
                                        @else
                                            <span class="status-badge status-pending"><i class="bi bi-clock me-1"></i> Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox fs-4 d-block mb-2"></i> No invoices available.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="content-card">
                <div class="mb-3">
                    <div class="section-title"><i class="bi bi-trophy-fill text-warning me-2"></i> Top Customers</div>
                    <div class="section-subtitle">Customers with highest paid sales.</div>
                </div>
                @forelse($topCustomers ?? [] as $index => $customer)
                    <div class="customer-row">
                        <div class="customer-rank">{{ $index + 1 }}</div>
                        <div class="customer-info">
                            <div class="customer-name">{{ $customer->customer_name }}</div>
                            <div class="text-muted" style="font-size: 9px;">Paid Sales</div>
                        </div>
                        <div class="customer-total">₹{{ number_format($customer->total_amount, 2) }}</div>
                    </div>
                @empty
                    <div class="text-center text-muted py-4">
                        <i class="bi bi-people fs-4 d-block mb-2"></i> No paid customer data available.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- QUICK ACTIONS & SYSTEM STATUS -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="content-card">
                <div class="mb-4">
                    <div class="section-title"><i class="bi bi-lightning-charge-fill text-warning me-2"></i> Quick Actions</div>
                    <div class="section-subtitle">Quickly access the main system modules.</div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="{{ route('invoices.create') }}" class="action-link">
                            <div class="action-icon"><i class="bi bi-plus-circle-fill"></i></div>
                            <div>
                                <div class="action-title">Create New Invoice</div>
                                <div class="action-description">Generate a new customer invoice</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('invoices.index') }}" class="action-link">
                            <div class="action-icon"><i class="bi bi-receipt"></i></div>
                            <div>
                                <div class="action-title">Manage Invoices</div>
                                <div class="action-description">View and manage invoices</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('customers.create') }}" class="action-link">
                            <div class="action-icon"><i class="bi bi-person-plus-fill"></i></div>
                            <div>
                                <div class="action-title">Add Customer</div>
                                <div class="action-description">Register a new customer</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('products.create') }}" class="action-link">
                            <div class="action-icon"><i class="bi bi-box-seam-fill"></i></div>
                            <div>
                                <div class="action-title">Add Product</div>
                                <div class="action-description">Add product details</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('customers.index') }}" class="action-link">
                            <div class="action-icon"><i class="bi bi-people-fill"></i></div>
                            <div>
                                <div class="action-title">Customer Directory</div>
                                <div class="action-description">View all customers</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('reports.index') }}" class="action-link">
                            <div class="action-icon"><i class="bi bi-bar-chart-line-fill"></i></div>
                            <div>
                                <div class="action-title">View Reports</div>
                                <div class="action-description">Analyse and export reports</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="section-title mb-0"><i class="bi bi-cpu-fill text-primary me-2"></i> System Status</div>
                    <span class="operational">Operational</span>
                </div>
                <div class="status-box">
                    <div class="status-row"><span class="status-label">Application</span><span class="status-value">Invoice System</span></div>
                    <div class="status-row"><span class="status-label">Database</span><span class="status-value text-success">Connected</span></div>
                    <div class="status-row"><span class="status-label">Products Module</span><span class="status-value text-success">Active</span></div>
                    <div class="status-row"><span class="status-label">Customer Module</span><span class="status-value text-success">Active</span></div>
                    <div class="status-row"><span class="status-label">Invoice Module</span><span class="status-value text-success">Active</span></div>
                    <div class="status-row"><span class="status-label">Reports Module</span><span class="status-value text-success">Active</span></div>
                </div>
                <div class="mt-4 p-3 border rounded-3 text-center">
                    <div class="text-muted small">System Records</div>
                    <div class="fw-bold text-primary mt-1">
                        {{ ($totalProducts ?? 0) + ($totalCustomers ?? 0) + ($totalInvoices ?? 0) }}
                    </div>
                    <small class="text-muted">Across core modules</small>
                </div>
            </div>
        </div>
    </div>

</div>

<footer class="footer">
    <i class="bi bi-receipt-cutoff me-1"></i> &copy; 2026 Invoice Management System | All Rights Reserved
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Live Clock
    function updateClock() {
        const now = new Date();
        document.getElementById('live_clock').innerText = now.toLocaleTimeString();
    }
    updateClock();
    setInterval(updateClock, 1000);

    // Revenue Line Chart (Proper Theme Colors Added)
    const revenueLabels = @json($monthlyLabels ?? []);
    const revenueData = @json($monthlyRevenue ?? []);
    const revenueCanvas = document.getElementById('revenueChart');

    if (revenueCanvas) {
        new Chart(revenueCanvas, {
            type: 'line',
            data: {
                labels: revenueLabels,
                datasets: [{
                    label: 'Revenue',
                    data: revenueData,
                    borderColor: '#1769e8',
                    backgroundColor: 'rgba(23, 105, 232, 0.08)',
                    borderWidth: 3,
                    tension: 0.35,
                    fill: true,
                    pointBackgroundColor: '#1769e8',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return ' ₹' + Number(context.raw).toLocaleString('en-IN', { minimumFractionDigits: 2 });
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₹' + Number(value).toLocaleString('en-IN');
                            }
                        }
                    }
                }
            }
        });
    }

    // Invoice Status Doughnut Chart (Colors & Empty Handling Fixed)
    const paidCount = {{ (int)($paidInvoices ?? 0) }};
    const pendingCount = {{ (int)($pendingInvoices ?? 0) }};
    const statusCanvas = document.getElementById('invoiceStatusChart');

    if (statusCanvas) {
        const isDataAvailable = (paidCount + pendingCount) > 0;

        new Chart(statusCanvas, {
            type: 'doughnut',
            data: {
                labels: isDataAvailable ? ['Paid', 'Pending'] : ['No Invoices'],
                datasets: [{
                    data: isDataAvailable ? [paidCount, pendingCount] : [1],
                    backgroundColor: isDataAvailable ? ['#198754', '#fd7e14'] : ['#e2e8f0'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 16,
                            font: { size: 11 }
                        }
                    }
                }
            }
        });
    }
</script>

</body>
</html>
