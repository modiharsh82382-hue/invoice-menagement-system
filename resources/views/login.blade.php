<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Management System - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-box{
            width:400px;
            background:#fff;
            padding:35px;
            border-radius:15px;
            box-shadow:0 10px 30px rgba(0,0,0,.3);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            font-weight:bold;
        }

        .btn-login{
            width:100%;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Invoice Management System</h2>

    <form>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Enter Email">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter Password">
        </div>

        <button class="btn btn-primary btn-login">
            Login
        </button>
    </form>

</div>

</body>
</html>