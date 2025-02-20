@extends('layouts.home_app')

@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-qjIsWkjZoHs7sxZ/N5S5AsnxTzT9XkWBnSPO3TAUYO+yoPks0ne8G/uokObD+abc" crossorigin="anonymous">

    </head>
    <div class="container mt-5">
        <h1 class="text-center mb-4">🛒 Your Shopping Cart</h2>

            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if(empty($cart))
                <div class="text-center">
                    <img src="/images/empty-cart.png" alt="Empty Cart" class="img-fluid" width="250">
                    <p class="mt-3">Your cart is empty. <a href="/" class="btn btn-primary">Continue Shopping</a></p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $item)
                                <tr>
                                    <td class="text-center align-middle">
                                        <img src="/{{ $item['image'] }}" class="rounded shadow-sm" width="60">
                                    </td>
                                    <td class="align-middle fw-bold text-dark">{{ $item['name'] }}</td>
                                    <td class="align-middle text-center">
                                        <span class="badge bg-primary">{{ $item['size'] }}</span>
                                    </td>
                                    <td class="align-middle text-success text-center price">
                                        ${{ number_format($item['price'], 2) }}
                                    </td>
                                    <td class="align-middle text-center">
                                        <input type="number" class="form-control text-center quantity-input border-primary"
                                            value="{{ $item['quantity'] }}" min="1" data-id="{{ $id }}" style="width: 70px;">
                                    </td>
                                    <td class="align-middle fw-bold text-primary text-center total">
                                        ${{ number_format($item['quantity'] * $item['price'], 2) }}
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="{{ config('app.url') . '/cart/remove/' . $id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                🗑 Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="checkout-container">
                    <h4>Total:
                        <span class="cart-total">
                            ${{ number_format(array_sum(array_map(fn($item) => $item['quantity'] * $item['price'], $cart)), 2) }}
                        </span>
                    </h4>
                    <form action="/checkout" method="GET">
                        <button type="submit" class="btn-checkout">Thanh Toán</button>
                    </form>
                </div>


            @endif
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const quantityInputs = document.querySelectorAll(".quantity-input");

            quantityInputs.forEach(input => {
                input.addEventListener("change", function () {
                    const row = this.closest("tr");
                    const price = parseFloat(row.querySelector(".price").textContent.replace("$", ""));
                    const totalCell = row.querySelector(".total");
                    const newQuantity = parseInt(this.value);

                    if (newQuantity < 1) {
                        this.value = 1; // Không cho phép số lượng nhỏ hơn 1
                        return;
                    }

                    const newTotal = (newQuantity * price).toFixed(2);
                    totalCell.textContent = `$${newTotal}`;

                    // Gửi AJAX request để cập nhật số lượng trong session
                    const productId = this.dataset.id;
                    updateCartQuantity(productId, newQuantity);
                });
            });

            function updateCartQuantity(productId, quantity) {
                fetch(`{{ config('app.url') }}/cart/update/${productId}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ quantity: quantity })
                }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.querySelector(".cart-total").textContent = `$${data.total}`;
                        }
                    });
            }
        });
    </script>

    <style>
        .table-responsive {
            width: 100%;
        }

        .table {
            width: 100%;
            max-width: 100%;
        }

        .table td img {
            display: block;
            margin: auto;
            max-height: 60px;
        }


        .container {

            width: 1200px;
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            /* justify-content: space-between; */
            margin: 20px auto;

        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
            transition: background-color 0.3s ease;
        }

        .table th,
        .table td {
            padding: 15px;
        }

        .form-control {
            width: 80px;
            margin: 0 auto;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }


        .rounded {
            border-radius: 10px !important;
        }

        .quantity-input {
            width: 70px;
            text-align: center;
        }

        .badge.bg-primary {
            font-size: 0.9em;
            padding: 0.5em 0.75em;
        }

        .checkout-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #f8f9fa;
            /* Màu nền nhẹ */
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .checkout-container h4 {
            margin: 0;
            font-weight: bold;
        }

        .checkout-container .cart-total {
            color: #dc3545;
            /* Màu đỏ */
            font-size: 1.2rem;
        }

        .checkout-container .btn-checkout {
            margin-left: auto;
            /* Đẩy nút sang phải */
            padding: 10px 20px;
            font-size: 1.2rem;
            background-color: black;
            border: none;
            color: white;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .checkout-container .btn-checkout:hover {
            background-color: #218838;
        }
    </style>
@endsection