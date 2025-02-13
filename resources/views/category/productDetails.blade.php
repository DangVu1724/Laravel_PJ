@extends('layouts.home_app')

@section('content')

<div class="product-detail-container">
    <div class="product-detail-content">
        <!-- Ảnh sản phẩm lớn bên trái -->
        <div class="product-image">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>

        <!-- Thông tin sản phẩm bên phải -->
        <div class="product-info">
            <h1 class="product-name">{{ $product->name }}</h1>
            <p class="product-category">
                Category: 
                @foreach ($product->category as $category)
                    {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </p>
            <h4 class="product-price">Price: ${{ number_format($product->price, 2) }}</h4>
            <p class="product-stock">Stock: {{ $product->stock }}</p>
            <p class="product-description">{{ $product->description }}</p>

            <!-- Nút thêm vào giỏ hàng và mua ngay -->
            <div class="product-actions">
                <a href="#" class="btn add-to-cart">Add to Cart</a>
                <a href="#" class="btn buy-now">Buy Now</a>
            </div>
        </div>
    </div>

    <!-- Phần thông tin bổ sung -->
    <div class="product-extra-info">
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
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .product-detail-content {
        display: flex;
        gap: 400px;
    } 

    .product-image {
        
        text-align: center;
    }

    .product-image img {
        max-height: 400px;
        object-fit: cover;
        width: 100%;
    }

    .product-info {
        flex: 1 1 50%;
    }

    .product-name {
        font-size: 2.5rem;
        font-weight: bold;
        color: #007bff;
    }

    .product-category {
        font-size: 1rem;
        color: #6c757d;
    }

    .product-price {
        font-size: 1.8rem;
        color: #dc3545;
        margin-top: 10px;
    }

    .product-stock {
        font-size: 1rem;
        color: #6c757d;
    }

    .product-description {
        font-size: 1.1rem;
        color: #333;
        margin-top: 20px;
    }

    .product-actions {
        margin-top: 30px;
    }

    .product-actions .btn {
        padding: 12px 24px;
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        display: inline-block;
        margin-right: 15px;
        border-radius: 30px;
        text-decoration: none;
    }

    .add-to-cart {
        background-color: #007bff;
        color: #fff;
    }

    .add-to-cart:hover {
        background-color: #0056b3;
    }

    .buy-now {
        background-color: #28a745;
        color: #fff;
    }

    .buy-now:hover {
        background-color: #218838;
    }

    .product-extra-info {
        padding-top: 30px;
        border-top: 1px solid #ddd;
    }

    .product-extra-info h3 {
        font-size: 1.5rem;
        margin-top: 20px;
        font-weight: bold;
    }

    .product-extra-info p {
        font-size: 1rem;
        color: #333;
    }
</style>

@endsection
