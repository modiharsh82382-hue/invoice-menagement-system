<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Invoice Management System')
    </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;

            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(13, 110, 253, 0.08),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(13, 110, 253, 0.07),
                    transparent 25%
                ),
                #f5f8fd;

            color: #14213d;
            min-height: 100vh;
        }


        /* ==============================
           NAVBAR
        ============================== */

        .main-navbar {

            min-height: 72px;

            background:
                linear-gradient(
                    90deg,
                    #1267e8,
                    #1769e8,
                    #145ed0
                );

            display: flex;

            align-items: center;

            padding: 0 48px;

            box-shadow:
                0 4px 18px rgba(20, 91, 190, 0.22);

            position: sticky;

            top: 0;

            z-index: 9999;
        }


        /* ==============================
           BRAND
        ============================== */

        .ims-brand {

            display: flex;

            align-items: center;

            gap: 12px;

            color: white !important;

            text-decoration: none;

            font-size: 20px;

            font-weight: 700;

            white-space: nowrap;
        }


        .ims-brand-icon {

            width: 28px;

            height: 28px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 21px;
        }


        /* ==============================
           NAVIGATION
        ============================== */

        .ims-nav-menu {

            margin-left: auto;

            display: flex;

            align-items: center;

            gap: 3px;
        }


        .ims-nav-link {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            text-decoration: none;

            color: rgba(255,255,255,0.90) !important;

            font-size: 15px;

            font-weight: 500;

            padding: 11px 14px;

            border-radius: 11px;

            white-space: nowrap;

            transition: all 0.2s ease;
        }


        .ims-nav-link i {

            font-size: 16px;

            width: 18px;

            text-align: center;
        }


        .ims-nav-link:hover {

            color: white !important;

            background: rgba(255,255,255,0.13);

            transform: translateY(-1px);
        }


        .ims-nav-link.active {

            color: white !important;

            background: rgba(255,255,255,0.20);

            box-shadow:
                inset 0 0 0 1px
                rgba(255,255,255,0.05);
        }


        /* ==============================
           MAIN CONTENT
        ============================== */

        .ims-page-container {

            width: 100%;

            max-width: 1150px;

            margin: auto;

            padding: 35px 20px 60px;
        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 1100px) {

            .main-navbar {
                padding: 0 25px;
            }

            .ims-brand {
                font-size: 18px;
            }

            .ims-nav-link {
                font-size: 14px;
                padding: 10px 10px;
            }
        }


        @media (max-width: 850px) {

            .main-navbar {

                padding: 10px 18px;

                flex-wrap: wrap;
            }

            .ims-brand {

                width: 100%;

                justify-content: center;

                margin-bottom: 8px;
            }

            .ims-nav-menu {

                width: 100%;

                justify-content: center;

                margin-left: 0;

                overflow-x: auto;
            }
        }


        @media (max-width: 600px) {

            .ims-nav-link span {
                display: none;
            }

            .ims-nav-link {

                width: 42px;

                height: 40px;

                padding: 8px;
            }

            .ims-page-container {

                padding: 25px 14px 45px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="main-navbar">


    <!-- BRAND -->

    <a href="/" class="ims-brand">

        <span class="ims-brand-icon">
            <i class="fa-solid fa-file-invoice"></i>
        </span>

        <span>
            Invoice Management System
        </span>

    </a>


    <!-- MENU -->

    <div class="ims-nav-menu">


        <!-- HOME -->

        <a
            href="/"
            class="ims-nav-link
            {{ request()->is('/') ? 'active' : '' }}">

            <i class="fa-solid fa-house"></i>

            <span>Home</span>

        </a>


        <!-- DASHBOARD -->

        <a
            href="{{ route('dashboard') }}"
            class="ims-nav-link
            {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="fa-solid fa-chart-line"></i>

            <span>Dashboard</span>

        </a>


        <!-- CUSTOMERS -->

        <a
            href="/customers"
            class="ims-nav-link
            {{ request()->is('customers*') ? 'active' : '' }}">

            <i class="fa-solid fa-users"></i>

            <span>Customers</span>

        </a>


        <!-- PRODUCTS -->

        <a
            href="/products"
            class="ims-nav-link
            {{ request()->is('products*') ? 'active' : '' }}">

            <i class="fa-solid fa-box"></i>

            <span>Products</span>

        </a>


        <!-- INVOICES -->

        <a
            href="/invoices"
            class="ims-nav-link
            {{ request()->is('invoices*') ? 'active' : '' }}">

            <i class="fa-solid fa-file-invoice-dollar"></i>

            <span>Invoices</span>

        </a>


        <!-- REPORTS -->

        <a
            href="/reports"
            class="ims-nav-link
            {{ request()->is('reports*') ? 'active' : '' }}">

            <i class="fa-solid fa-chart-pie"></i>

            <span>Reports</span>

        </a>

    </div>

</nav>


<!-- =====================================================
     PAGE CONTENT
===================================================== -->

<main class="ims-page-container">

    @yield('content')

</main>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


@yield('scripts')


</body>

</html>