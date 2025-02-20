@extends('layouts.home_app')

@section('content')

    <head>
        <link rel="stylesheet" href="../css/home_app.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    </head>
    <div class="search-container mb-4">
        <input type="text" name="query" id="searchInput" class="form-control rounded-pill"
            placeholder="Tìm kiếm sản phẩm..." value="{{ request('query') }}">
        <!-- Kết quả tìm kiếm hiển thị ở đây -->
        <div id="searchResults"
            class="search-results position-absolute w-100 bg-black border rounded shadow-sm d-none mt-2">
            <!-- Kết quả tìm kiếm sẽ được thêm vào đây -->
        </div>
    </div>


    <!-- <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/cap-nam.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="/images/cap-nam.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="/images/cap-nam.jpg" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->

    <div class="outer-container d-flex align-items-center justify-content-center">
        <div class="container text-center">

            <div class="row d-flex justify-content-center">
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 mb-4 d-flex justify-content-center">
                        <a href="{{ config('app.url') }}/category/productDetails/{{ $product->id }}"
                            class="text-decoration-none">
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
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>








@endsection