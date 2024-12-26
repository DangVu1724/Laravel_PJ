<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to FashionShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar a {
            color: white;
        }
        .jumbotron {
            background: url('banner.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .category-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">FashionShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Đăng ký</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sản phẩm</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="jumbotron">
        <h1 class="display-4">Chào mừng đến FashionShop!</h1>
        <p class="lead">Khám phá những sản phẩm thời trang đẹp nhất ngay hôm nay.</p>
        <a href="#" class="btn btn-primary btn-lg">Mua sắm ngay</a>
    </div>

    <!-- Categories -->
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="category1.jpg" class="card-img-top" alt="Men's Fashion">
                    <div class="card-body">
                        <h5 class="card-title">Thời trang Nam</h5>
                        <p class="card-text">Khám phá các sản phẩm dành cho nam giới.</p>
                        <a href="#" class="btn btn-outline-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="category2.jpg" class="card-img-top" alt="Women's Fashion">
                    <div class="card-body">
                        <h5 class="card-title">Thời trang Nữ</h5>
                        <p class="card-text">Cập nhật xu hướng thời trang mới nhất.</p>
                        <a href="#" class="btn btn-outline-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="category3.jpg" class="card-img-top" alt="Accessories">
                    <div class="card-body">
                        <h5 class="card-title">Phụ kiện</h5>
                        <p class="card-text">Tô điểm phong cách với phụ kiện thời trang.</p>
                        <a href="#" class="btn btn-outline-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 FashionShop. All rights reserved.</p>
        <div>
            <a href="#" style="color: white;">Facebook</a> | 
            <a href="#" style="color: white;">Instagram</a> | 
            <a href="#" style="color: white;">Twitter</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
