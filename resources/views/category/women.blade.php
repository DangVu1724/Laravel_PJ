@extends('layouts.home_app')

@section('content')

    <head>
        <link rel="stylesheet" href="../css/home_app.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    </head>
    <div class="grid-x grid-margin-x align-center">
        <!-- Thanh tìm kiếm -->
        <div class="cell medium-5">
            <div class="search-container">
                <input type="text" name="query" id="searchInput" class="input-group-field rounded"
                    placeholder="Tìm kiếm sản phẩm..." value="{{ request('query') }}">
                <div id="searchResults"
                    class="search-results position-absolute w-100 bg-black border rounded shadow-sm d-none mt-2">
                    <!-- Kết quả tìm kiếm sẽ được thêm vào đây -->
                </div>
            </div>
        </div>

        <!-- Dropdown sắp xếp -->
        <div class="cell medium-2 text-center" style="
        margin-top: 18px;">
            <button class="button hollow dropdown" type="button" data-toggle="filterDropdown">
                <i class="fas fa-filter"></i> Sắp xếp
            </button>
            <div class="dropdown-pane" id="filterDropdown" data-dropdown data-hover="true" data-hover-pane="true">
                <ul class="no-bullet">
                    <li><a href="?sort=default"><i class="fas fa-list-ul"></i> Mặc định</a></li>
                    <li><a href="?sort=price_asc"><i class="fas fa-sort-up"></i> Giá: Thấp đến cao</a></li>
                    <li><a href="?sort=price_desc"><i class="fas fa-sort-down"></i> Giá: Cao đến thấp</a></li>
                    <li><a href="?sort=name_asc"><i class="fas fa-sort-alpha-up"></i> Tên: A-Z</a></li>
                    <li><a href="?sort=name_desc"><i class="fas fa-sort-alpha-down"></i> Tên: Z-A</a></li>
                </ul>
            </div>
        </div>
    </div>
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
                                        <strong>Description:</strong> <span class="description-text">{{ $product->description }}</span> <br>
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