@extends('layouts.admin_app')

@section('content')
<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<div class="container mt-5">
    <h1 class="text-center mb-5 text-primary">Welcome to Admin Dashboard</h1>

    <div class="row g-4">
        <!-- Quản lý sản phẩm -->
        <div class="col-md-6 d-flex justify-content-center">
            <a href="{{ config('app.url') }}/admin/product" class="btn btn-lg btn-primary shadow-lg custom-btn w-75 py-3">
                <i class="bi bi-box-seam me-2"></i> Manage Products
            </a>
        </div>

        <!-- Quản lý người dùng -->
        <div class="col-md-6 d-flex justify-content-center">
            <a href="{{ config('app.url') }}/admin/user" class="btn btn-lg btn-secondary shadow-lg custom-btn w-75 py-3">
                <i class="bi bi-people-fill me-2"></i> Manage Users
            </a>
        </div>
    </div>
</div>

<!-- Thêm CSS -->
<style>
    body {
        background: linear-gradient(135deg, #6e45e2, #88d3ce);
        font-family: 'Roboto', sans-serif;
        color: #333;
        min-height: 100vh;
        justify-content: center;
        align-items: center;
    }

    .container {
        background: linear-gradient(135deg, #6e45e2, #88d3ce);
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        transition: transform 0.5s;
    }

    .container:hover {
        transform: translateY(-10px);
    }

    h1 {
        font-weight: 700;
        color: #343a40;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .custom-btn {
        border-radius: 50px;
        transition: all 0.4s ease;
        font-size: 1.2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
    }

    .custom-btn::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transform: translateX(-100%);
        transition: transform 0.5s ease;
    }

    .custom-btn:hover::before {
        transform: translateX(100%);
    }

    .btn-primary {
        background: linear-gradient(135deg, #007bff, #0056b3);
        border: none;
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d, #495057);
        border: none;
    }

    .btn i {
        font-size: 1.5rem;
    }

    .row {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
</style>

@endsection
