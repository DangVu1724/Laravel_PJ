@extends('layouts.home_app')

@section('content')
<div class="outer-container d-flex align-items-center justify-content-center">
    <div class="container text-center">
        <h1 class="mb-5 text-primary">Các sản phẩm cho Men</h1>

        <div class="row d-flex justify-content-center">
            @foreach ($products as $product)
            <div class="col-12 col-md-4 mb-4 d-flex justify-content-center">
                <a href="{{route('productDetails',['id' => $product->id])}}" class="text-decoration-none">
                    <div class="card shadow-lg border-0 rounded-3 overflow-hidden text-center" style="width: 90%; max-width: 350px; min-height:100px">
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $product->name }}</h5>
                            <p class="card-text text-muted">
                                <strong>Price:</strong> ${{ number_format($product->price, 2) }} <br>
                                <strong>Stock:</strong> {{ $product->stock }} <br>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
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
        gap: 20px;
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
@endsection
