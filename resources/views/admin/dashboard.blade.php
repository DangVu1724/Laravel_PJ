@extends('layouts.admin_app')


@section('content')
<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Welcome to Admin Dashboard</h1>

    <div class="row g-4">
        <!-- Quản lý sản phẩm -->
        <div class="col-md-6 d-flex justify-content-center">
            <a href="{{ route('product.index') }}" class="btn btn-lg btn-primary shadow-lg rounded-pill w-75 py-3">
                <i class="bi bi-box-seam me-2"></i> Manage Products
            </a>
        </div>

        <!-- Quản lý người dùng -->
        <div class="col-md-6 d-flex justify-content-center">
            <a href="{{ route('user.index') }}" class="btn btn-lg btn-secondary shadow-lg rounded-pill w-75 py-3">
                <i class="bi bi-people-fill me-2"></i> Manage Users
            </a>
        </div>
    </div>
</div>

<!-- Thêm CSS -->
<style>
    body {
        background-color: #f8f9fa; /* Màu nền nhẹ nhàng */
        font-family: 'Arial', sans-serif; /* Font chữ đơn giản */
    }

    h1 {
        font-weight: bold;
        letter-spacing: 1px;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2); /* Hiệu ứng đổ bóng chữ */
    }

    .btn {
        border: #007bff;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background-color: #007bff;
        border-radius: 10px;
        padding: 5px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-radius: 10px;
        padding: 5px;
    }

    .btn i {
        font-size: 1.2rem;
    }

    .container {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .row {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
</style>

@endsection