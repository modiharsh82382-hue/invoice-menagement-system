<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#0d6efd;
            color:white;
            position:fixed;
            padding-top:20px;
        }

        .sidebar h3{
            text-align:center;
            margin-bottom:30px;
        }

        .sidebar a{
            color:white;
            display:block;
            padding:15px 20px;
            text-decoration:none;
        }

        .sidebar a:hover{
            background:#084298;
        }

        .content{
            margin-left:250px;
            padding:30px;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }
    </style>

</head>

<body>

<div class="sidebar">

    <h3>Invoice System</h3>

    <a href="#">Dashboard</a>
    <a href="#">Products</a>
    <a href="#">Customers</a>
    <a href="#">Invoices</a>
    <a href="#">Reports</a>
    <a href="#">Settings</a>
    <a href="#">Logout</a>

</div>

<div class="content">

<h2>Dashboard</h2>

<div class="row mt-4">

<div class="col-md-3">
<div class="card p-4 text-center">
<h3>120</h3>
<p>Total Products</p>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center">
<h3>80</h3>
<p>Total Customers</p>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center">
<h3>56</h3>
<p>Total Invoices</p>
</div>
</div>

<div class="col-md-3">
<div class="card p-4 text-center">
<h3>₹2,50,000</h3>
<p>Total Sales</p>
</div>
</div>

</div>

</div>

</body>
</html>