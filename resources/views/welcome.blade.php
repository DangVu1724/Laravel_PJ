<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to FashionShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        .footer {
    background-color: #222;
    color: #fff;
    padding: 40px 0;
    font-family: Arial, sans-serif;
}

.footer-container {
    width: 90%;
    max-width: 1200px;
    margin: auto;
}

.footer-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    text-align: left;
}

.footer-col {
    width: 30%;
    margin-bottom: 20px;
}

.footer-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.footer-text {
    font-size: 14px;
    margin-bottom: 8px;
}

.footer-link {
    color: #f8c12c;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-link:hover {
    color: #ffdd57;
}

.footer-social {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.footer-social a {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 14px;
}

.footer-social i {
    font-size: 16px;
}

.footer-line {
    border: 1px solid #444;
    margin: 20px 0;
}

.footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.footer-bottom .footer-link {
    margin-left: 15px;
}
    </style>
</head>


<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid"> <!-- Change container to container-fluid -->
            <a class="navbar-brand" href="#">Elara Couture</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="login">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="register">Đăng ký</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="outer-container d-flex align-items-center justify-content-center">
        <div class="container text-center">

            <div class="row d-flex justify-content-center">
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 mb-4 justify-content-center">
                        <div class="card shadow-lg border-0 rounded-3 overflow-hidden text-center"
                            style="width: 90%; max-width: 350px; min-height:100px">
                            <img src="/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title text-dark">{{ $product->name }}</h5>
                                <p class="card-text text-muted">
                                    <strong>Price:</strong> ${{ number_format($product->price, 2) }} <br>
                                    <strong>Description:</strong> {{ $product->description }} <br>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer>

    <div class="footer-container">
        <div class="footer-row">
            <!-- Cột thông tin cửa hàng -->
            <div class="footer-col">
                <h5 class="footer-title">Elara Couture</h5>
                <p class="footer-text">Chuyên cung cấp các sản phẩm chất lượng với giá cả hợp lý.</p>
                <p class="footer-text">Địa chỉ: Hà Nội, Việt Nam</p>
            </div>

            <!-- Cột liên hệ -->
            <div class="footer-col">
                <h5 class="footer-title">Liên Hệ</h5>
                <p class="footer-text">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:0123456789" class="footer-link">0123 456 789</a>
                </p>
                <p class="footer-text">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:info@yourshop.com" class="footer-link">ElaraCouture@shop.com</a>
                </p>
                <p class="footer-text">
                    <i class="fas fa-clock"></i> Thời gian mở cửa: 8:00 - 22:00 (Hằng ngày)
                </p>
            </div>

            <!-- Cột mạng xã hội -->
            <div class="footer-col">
                <h5 class="footer-title">Kết Nối Với Chúng Tôi</h5>
                <div class="footer-social">
                    <a href="https://www.facebook.com/yourshop" class="footer-link" target="_blank">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                    <a href="https://www.instagram.com/yourshop" class="footer-link" target="_blank">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a href="https://www.tiktok.com/@yourshop" class="footer-link" target="_blank">
                        <i class="fab fa-tiktok"></i> TikTok
                    </a>
                    <a href="https://www.youtube.com/c/yourshop" class="footer-link" target="_blank">
                        <i class="fab fa-youtube"></i> YouTube
                    </a>
                </div>
            </div>
        </div>

        <hr class="footer-line">

        <div class="footer-bottom">
            <p class="footer-text">&copy; 2024 Your Shop. All rights reserved.</p>
            <div>
                <a href="#" class="footer-link">Chính sách bảo mật</a>
                <a href="#" class="footer-link">Điều khoản sử dụng</a>
            </div>
        </div>
    </div>
</footer>


</html>