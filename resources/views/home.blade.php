
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InvoicePro | Invoice Management System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #4f46e5;
            --dark: #172033;
            --muted: #64748b;
            --light: #f7f8fc;
            --border: #e8eaf2;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--dark);
            background: #fff;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: min(1120px, 90%);
            margin: auto;
        }

        /* Navigation */
        nav {
            height: 78px;
            display: flex;
            align-items: center;
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            font-size: 22px;
            font-weight: 800;
            color: var(--dark);
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--primary);
            color: white;
            font-size: 22px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            border-radius: 9px;
            padding: 13px 21px;
            font-size: 14px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-primary {
            background: var(--primary);
            color: white !important;
            box-shadow: 0 6px 15px #4f46e52a;
        }

        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-2px);
        }

        .btn-outline {
            color: var(--dark);
            border: 1px solid #d9dce8;
            background: white;
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Hero */
        .hero {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 85% 25%, #e4e5ff 0%, transparent 35%),
                linear-gradient(135deg, #fafaff, #f4f5ff);
            padding: 95px 0 100px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            align-items: center;
            gap: 65px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 14px;
            background: #eeedff;
            color: var(--primary);
            border-radius: 30px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .eyebrow-dot {
            height: 7px;
            width: 7px;
            background: #22c55e;
            border-radius: 50%;
        }

        h1 {
            margin: 25px 0 20px;
            font-size: clamp(40px, 5vw, 61px);
            line-height: 1.12;
            letter-spacing: -2px;
            font-weight: 800;
        }

        h1 span {
            color: var(--primary);
        }

        .hero-description {
            max-width: 510px;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.9;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            margin-top: 30px;
        }

        .trust-note {
            margin-top: 27px;
            color: #64748b;
            font-size: 13px;
        }

        .trust-note strong {
            color: #334155;
        }

        /* Preview panel */
        .preview {
            position: relative;
            background: white;
            border: 1px solid #e9eaf5;
            border-radius: 22px;
            padding: 25px;
            box-shadow: 0 25px 70px #33338b18;
        }

        .preview-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .preview-top h3 {
            font-size: 17px;
        }

        .small-label {
            margin-top: 6px;
            color: var(--muted);
            font-size: 12px;
        }

        .status {
            background: #dcfce7;
            color: #15803d;
            padding: 7px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .invoice-total {
            padding: 23px;
            border-radius: 15px;
            color: white;
            background: linear-gradient(120deg, #4f46e5, #7770f5);
        }

        .invoice-total p {
            color: #e0e7ff;
            font-size: 13px;
        }

        .invoice-total h2 {
            margin-top: 12px;
            font-size: 34px;
        }

        .invoice-total span {
            display: inline-block;
            margin-top: 9px;
            font-size: 12px;
            color: #dcfce7;
        }

        .preview-heading {
            display: flex;
            justify-content: space-between;
            margin: 25px 0 15px;
            font-size: 14px;
        }

        .preview-heading span {
            color: var(--primary);
            font-size: 12px;
        }

        .invoice-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f0f1f6;
            gap: 10px;
        }

        .invoice-row:last-child {
            border-bottom: none;
        }

        .invoice-name {
            font-size: 13px;
            font-weight: 700;
        }

        .invoice-sub {
            margin-top: 5px;
            color: var(--muted);
            font-size: 11px;
        }

        .amount {
            text-align: right;
            font-size: 13px;
            font-weight: 700;
        }

        .paid {
            display: inline-block;
            margin-top: 5px;
            color: #15803d;
            background: #dcfce7;
            border-radius: 5px;
            padding: 4px 7px;
            font-size: 10px;
        }

        /* Features */
        .features {
            padding: 90px 0;
        }

        .section-heading {
            max-width: 650px;
            margin: 0 auto 45px;
            text-align: center;
        }

        .section-label {
            color: var(--primary);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .section-heading h2 {
            margin: 14px 0;
            font-size: clamp(29px, 4vw, 40px);
            letter-spacing: -1px;
        }

        .section-heading p {
            color: var(--muted);
            line-height: 1.8;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 23px;
        }

        .feature-card {
            padding: 30px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            transition: .25s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: #c7c5ff;
            box-shadow: 0 16px 35px #1720330b;
        }

        .feature-icon {
            display: grid;
            place-items: center;
            height: 52px;
            width: 52px;
            border-radius: 14px;
            background: #eeedff;
            font-size: 25px;
        }

        .feature-card h3 {
            margin: 22px 0 11px;
            font-size: 18px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        /* Call to action */
        .cta {
            padding: 0 0 85px;
        }

        .cta-box {
            padding: 55px 30px;
            border-radius: 22px;
            text-align: center;
            color: white;
            background: linear-gradient(120deg, #3730a3, #6366f1);
        }

        .cta-box h2 {
            font-size: clamp(27px, 4vw, 38px);
            margin-bottom: 15px;
        }

        .cta-box p {
            color: #e0e7ff;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .cta-box .btn {
            color: var(--primary);
            background: white;
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--border);
            padding: 27px 0;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            color: var(--muted);
            font-size: 13px;
        }

        .footer-brand {
            color: var(--dark);
            font-weight: 800;
        }

        @media (max-width: 850px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .hero {
                padding: 70px 0;
            }

            .preview {
                max-width: 520px;
                width: 100%;
                margin: auto;
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            nav {
                height: 70px;
            }

            .brand {
                font-size: 18px;
            }

            .brand-icon {
                width: 36px;
                height: 36px;
            }

            .nav-links {
                gap: 10px;
            }

            .nav-links .nav-home {
                display: none;
            }

            .nav-links .btn {
                padding: 11px 14px;
            }

            .hero {
                padding: 55px 0;
            }

            h1 {
                letter-spacing: -1px;
            }

            .hero-description {
                font-size: 15px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .features {
                padding: 65px 0;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">▤</span>
                InvoicePro
            </a>

            <div class="nav-links">
                <a class="nav-home" href="#home">Home</a>
                <a class="nav-home" href="#features">Features</a>
                <a href="{{ url('/login') }}" class="btn btn-primary">
                    Login <span>→</span>
                </a>
            </div>
        </div>
    </nav>

    <main>
        <section class="hero" id="home">
            <div class="container hero-grid">

                <div>
                    <div class="eyebrow">
                        <span class="eyebrow-dot"></span>
                        SIMPLE. SMART. ORGANIZED.
                    </div>

                    <h1>
                        Invoicing made
                        <span>simple.</span>
                        Business made easier.
                    </h1>

                    <p class="hero-description">
                        Manage invoices, customer information, products
                        and reports from one organized workspace.
                        Spend less time managing records and more time
                        focusing on your business.
                    </p>

                    <div class="hero-buttons">
                        <a href="{{ url('/login') }}" class="btn btn-primary">
                            Get Started <span>→</span>
                        </a>

                        <a href="#features" class="btn btn-outline">
                            Explore Features
                        </a>
                    </div>

                    <p class="trust-note">
                        <strong>One workspace.</strong>
                        Your essential invoice tools in one place.
                    </p>
                </div>

                <div class="preview">
                    <div class="preview-top">
                        <div>
                            <h3>Invoice Overview</h3>
                            <p class="small-label">A preview of your workspace</p>
                        </div>
                        <span class="status">● Organized</span>
                    </div>

                    <div class="invoice-total">
                        <p>Invoice Management</p>
                        <h2>All in one place</h2>
                        <span>✓ Keep your records organized</span>
                    </div>

                    <div class="preview-heading">
                        <strong>What you can manage</strong>
                        <span>View features</span>
                    </div>

                    <div class="invoice-row">
                        <div>
                            <div class="invoice-name">Invoice Records</div>
                            <div class="invoice-sub">Create and manage invoices</div>
                        </div>
                        <span class="paid">Available</span>
                    </div>

                    <div class="invoice-row">
                        <div>
                            <div class="invoice-name">Customer Details</div>
                            <div class="invoice-sub">Organized customer information</div>
                        </div>
                        <span class="paid">Available</span>
                    </div>

                    <div class="invoice-row">
                        <div>
                            <div class="invoice-name">Products & Reports</div>
                            <div class="invoice-sub">Manage records and review reports</div>
                        </div>
                        <span class="paid">Available</span>
                    </div>
                </div>

            </div>
        </section>

        <section class="features" id="features">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">OUR FEATURES</span>
                    <h2>Everything you need to stay organized</h2>
                    <p>
                        Essential tools designed to make invoice and
                        record management clear, convenient and simple.
                    </p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🧾</div>
                        <h3>Invoice Management</h3>
                        <p>
                            Create, view, update and manage invoice
                            records in an organized workspace.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">👥</div>
                        <h3>Customer Management</h3>
                        <p>
                            Maintain customer details and keep important
                            information easy to find.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📦</div>
                        <h3>Product Management</h3>
                        <p>
                            Keep product information organized to
                            support your invoice workflow.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h3>Reports</h3>
                        <p>
                            Access available reports to review your
                            invoice activity and records.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📄</div>
                        <h3>PDF & Printing</h3>
                        <p>
                            Access supported invoice export and
                            printing options.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">⚙️</div>
                        <h3>Easy Navigation</h3>
                        <p>
                            Find the main areas of your invoice
                            management system from one place.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container">
                <div class="cta-box">
                    <h2>Ready to get organized?</h2>
                    <p>
                        Access your Invoice Management System and
                        manage your records in one convenient place.
                    </p>
                    <a href="{{ url('/login') }}" class="btn">
                        Go to Login <span>→</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-inner">
            <div class="footer-brand">InvoicePro</div>
            <div>© {{ date('Y') }} Invoice Management System</div>
            <div>Designed for simpler invoice management.</div>
        </div>
    </footer>

</body>
</html>
