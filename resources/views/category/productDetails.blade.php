@extends('layouts.home_app')

@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/details.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home_app.css') }}">

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
                <!-- Kiểm tra nếu sản phẩm hết hàng -->
                @if ($product->stock == 0)
                    <p class="out-of-stock" style="color: red; font-weight: bold;">Sản phẩm đã hết hàng!</p>
                    <button type="button" class="btn add-to-cart" disabled style="background-color: grey; cursor: not-allowed;">
                        Add to Cart
                    </button>
                    <a href="#" class="btn buy-now" style="margin-left: 10px; background-color: grey; cursor: not-allowed;"
                        onclick="return false;">
                        Buy Now
                    </a>
                @else
                    <!-- Form thêm vào giỏ hàng -->
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
                        <a href="#" class="btn buy-now" style="margin-left: 10px;">Buy Now</a>
                    </form>
                @endif



            </div>
        </div>

        <!-- Phần thông tin bổ sung -->
        <div class="product-extra-info">
            <h3>Additional Information</h3>
            <p>{{ $product->description }}</p>
            <h2>Reviews</h2>

            <!-- Form để viết review -->
            <form action="{{ config('app.url') . '/reviews/store' }}" method="POST" class="review-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="form-group">
                    <label for="review">Your Review:</label>
                    <textarea name="review" id="review" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label>Your Rating:</label>
                    <div class="rating">
                        @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                            <label for="star{{ $i }}">★</label>
                        @endfor
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="
        margin-top: 10px;
    ">Submit Review</button>
            </form>
            @if($product->reviews->count() > 0)
                @foreach($product->reviews as $review)
                    <div class="review">
                        <div class="review-header">
                            <div>
                                <strong>{{ $review->user->name }}</strong>
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $review->rating ? 'filled-star' : 'empty-star' }}">★</span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="review-text">{{ $review->review }}</p>
                    </div>
                @endforeach
            @else
                <p>No reviews yet. Be the first to write one!</p>
            @endif
        </div>

    </div>
@endsection