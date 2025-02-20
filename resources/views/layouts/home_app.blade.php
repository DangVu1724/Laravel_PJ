<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qjIsWkjZoHs7sxZ/N5S5AsnxTzT9XkWBnSPO3TAUYO+yoPks0ne8G/uokObD+abc" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/home_app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">




        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.nav_home')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
            @yield('content')
            </main>
        </div>
        <script src="{{ asset('js/home_app.js') }}"></script>
    </body>
    <footer class="footer">
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

    <script>
    const baseUrl = "{{ config('app.url') }}";
</script>
<script src="{{ asset('js/home_app.js') }}"></script>


</html>
