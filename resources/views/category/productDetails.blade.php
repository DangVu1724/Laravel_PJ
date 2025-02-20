@extends('layouts.home_app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
</head>
    <div class="product-detail-container">
        <div class="product-detail-content">
            <!-- Ảnh sản phẩm lớn bên trái -->
            <div class="product-image">
                <img src="/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
            </div>

            <!-- Thông tin sản phẩm bên phải -->
            <div class="product-info">
                <h1 class="product-name">{{ $product->name }}</h1>
                <p class="product-category">
                    <strong>Category:</strong>
                    @foreach ($product->category as $category)
                        {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </p>
                <h4 class="product-price">${{ number_format($product->price, 2) }}</h4>
                <p class="product-stock">Stock: {{ $product->stock }}</p>
                <p class="product-description">{{ $product->description }}</p>

                <!-- Nút thêm vào giỏ hàng và mua ngay -->
                <div class="product-actions">
                    <form action="{{ config('app.url') . '/cart/add/' . $product->id }}" method="POST">
                        @csrf
                        <div class="product-size">
                            <h5>Choose Size:</h5>
                            <div class="size-options">
                                @foreach($sizes as $size)
                                    <label class="size-option">
                                        <input type="radio" name="size" value="{{ $size }}" {{ $loop->first ? 'checked' : '' }}>
                                        {{ $size }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn add-to-cart">Add to Cart</button>
                        <a href="#" class="btn buy-now" style="
        margin-left: 10px;">Buy Now</a>
                    </form>


                </div>


            </div>
        </div>

        <!-- Phần thông tin bổ sung -->
        <div class="product-extra-info">
            <h3>Additional Information</h3>
            <p>{{ $product->description }}</p>
            <h3>Reviews</h3>
            <p>No reviews yet. Be the first to write one!</p>
        </div>
    </div>
@endsection