<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Order System</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/customer/1/Ernico Uy/Umingan Pangasinan">Customer</a></li>
                    <li class="nav-item"><a class="nav-link" href="/item/666/Cellphone/4500">Item</a></li>
                    <li class="nav-item"><a class="nav-link" href="/order/1/Ernico Uy/5001/2003-04-04">Order</a></li>
                    <li class="nav-item"><a class="nav-link" href="/orderdetails/1001/5001/666/Cellphone/4500/4">Order Details</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
