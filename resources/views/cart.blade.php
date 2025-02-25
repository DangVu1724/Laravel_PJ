@extends('layouts.home_app')

@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/home_app.css">
        <style>
            thead th {
                padding: .5rem .625rem .625rem;
                font-weight: 700;
                text-align: center;
            }
        </style>

    </head>
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="
                        font-size: 40px;
                        font-weight: bold;
                        color: darkblue;
                    ">🛒 Your Shopping Cart</h1>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if(empty($cart))
            <div class="cart-container">
                <i class="fa-solid fa-cart-shopping cart-icon"></i>
                <p class="cart-text">Your cart is empty.</p>
                <a href="/dashboard" class="continue-btn">
                    Continue Shopping
                </a>
            </div>



        @else
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead class="table-dark" style="text-align: center;">
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
                    <?php
            $price = 0;
            $total = 0;
                                                                                                    ?>
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
                                            <input type="number" class="quantity-input" data-id="{{ $item->id }}"
                                                value="{{ intval($item->quantity) }}">
                                        <td class="align-middle fw-bold text-primary text-center total">
                                            <?php
                            $price = number_format($item['quantity'] * $item['price'], 2);
                            $total += $price;
                                                                                                                                                                                                                                ?>
                                            <?php        echo $price; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="{{ config('app.url') }}/cart/remove/{{ $item->id }}" method="POST">
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
            <div class="checkout-container" style="display: flex;justify-content: space-between;">
                <h4>Total:
                    <span class="cart-total">${{ number_format($total, 2) }}</span>
                </h4>

                <form action="{{ config('app.url') }}/place-order" method="POST">
                    @csrf
                    <button type="submit" id="orderButton" class="btn btn-primary">Đặt Hàng</button>
                </form>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const quantityInputs = document.querySelectorAll(".quantity-input");
            const orderButton = document.querySelector("#orderButton");

            quantityInputs.forEach(input => {
                input.addEventListener("change", function () {
                    const row = this.closest("tr");
                    const price = parseFloat(row.querySelector(".price").textContent.replace("$", ""));
                    const totalCell = row.querySelector(".total");
                    const newQuantity = parseInt(this.value);
                    const productId = this.dataset.id;

                    if (newQuantity < 1) {
                        this.value = 1;
                        return;
                    }

                    const newTotal = (newQuantity * price).toFixed(2);
                    totalCell.textContent = `$${newTotal}`;

                    updateCartQuantity(productId, newQuantity);
                    updateTotalPrice();
                });
            });

            const baseUrl = "{{ config('app.url') }}";

            function updateCartQuantity(productId, quantity) {
                fetch(`${baseUrl}/cart/update/${productId}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                    },
                    body: JSON.stringify({ quantity: quantity })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.querySelector(".cart-total").textContent = `$${data.total}`;
                        }
                    })
                    .catch(error => console.error("Error:", error));
            }

            function updateTotalPrice() {
                let total = 0;
                document.querySelectorAll(".total").forEach(item => {
                    total += parseFloat(item.textContent.replace("$", ""));
                });
                document.querySelector(".cart-total").textContent = `$${total.toFixed(2)}`;
            }

            // Kiểm tra trước khi đặt hàng
            orderButton.addEventListener("click", function (event) {
                let total = parseFloat(document.querySelector(".cart-total").textContent.replace("$", ""));

                if (total === 0) {
                    event.preventDefault();
                    alert("🛑 Giỏ hàng của bạn đang trống! Hãy thêm sản phẩm trước khi đặt hàng.");
                }
            });
        });
    </script>
@endsection