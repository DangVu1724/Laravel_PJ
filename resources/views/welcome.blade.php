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

        .navbar-toggler-icon {
            background-color: white;
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #ffc107 !important;
        }

        .outer-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
        padding: 20px;
    }

    .container {
        max-width: 1200px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
    }

    .card {
        transition: transform 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 350px;
        height: 450px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .card-img-top {
        height: 320px;
        object-fit: cover;
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 1rem;
        text-align: center;
        flex-grow: 1; 
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .card-text strong {
        font-weight: bold;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    @media (min-width: 768px) {
        .col-md-4 {
            flex: 0 0 32%;
            max-width: 32%;
        }
    }

    @media (max-width: 767px) {
        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    a.text-decoration-none {
        text-decoration: none;
        color: inherit;
    }

    a.text-decoration-none:hover {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid"> <!-- Change container to container-fluid -->
            <a class="navbar-brand" href="#">FashionShop</a>
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
                    <div class="card shadow-lg border-0 rounded-3 overflow-hidden text-center" style="width: 90%; max-width: 350px; min-height:100px">
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

</html>
