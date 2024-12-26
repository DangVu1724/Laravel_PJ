@extends('layouts.home_app')

@section('content')

<div class="product-detail-container container mt-5">
    <div class="row">
        <!-- Ảnh sản phẩm lớn -->
        <div class="col-md-6 text-center">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid shadow-lg rounded" style="max-height: 400px; object-fit: cover;">
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h1 class="text-primary">{{ $product->name }}</h1>
            <p class="text-muted">
                Category: 
                @foreach ($product->category as $category)
                    {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </p>
            <h4 class="text-danger">Price: ${{ number_format($product->price, 2) }}</h4>
            <p class="text-muted">Stock: {{ $product->stock }}</p>
            <p>{{ $product->description }}</p>

            <!-- Nút thêm vào giỏ hàng -->
            <div class="mt-4">
                <a href="#" class="btn btn-primary btn-lg">Add to Cart</a>
                <a href="#" class="btn btn-secondary btn-lg">Buy Now</a>
            </div>
        </div>
    </div>

    <!-- Phần thông tin bổ sung -->
    <div class="product-extra-info mt-5">
        <h3>Additional Information</h3>
        <p>{{ $product->additional_info }}</p>

        <h3>Reviews</h3>
        <p>No reviews yet. Be the first to write one!</p>
    </div>
</div>

<!-- Thêm CSS -->
<style>
    .product-detail-container {
        max-width: 1200px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .product-detail-container h1 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .product-detail-container h4 {
        font-size: 1.8rem;
    }

    .product-extra-info {
        padding: 20px 0;
        border-top: 1px solid #ddd;
    }

    .product-extra-info h3 {
        margin-top: 20px;
        font-size: 1.5rem;
    }

    .btn-lg {
        padding: 10px 20px;
        font-size: 1.2rem;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection