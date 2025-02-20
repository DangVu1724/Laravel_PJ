@extends('layouts.home_app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">🛒 Your Shopping Cart</h2>

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
                                    <input type="number" class="quantity-input" data-id="{{ $item->id }}" value="{{ $item->quantity }}">

                                    </td>
                                    <td class="align-middle fw-bold text-primary text-center total">
                                        <?php
                                        $price = number_format($item['quantity'] * $item['price'], 2);
                                        $total += $price;
                                        ?>
                                        <?php echo $price; ?>
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


                <div class="checkout-container">
                <h4>Total:
    <span class="cart-total">${{ number_format($total, 2) }}</span>
</h4>

<a href="{{ config('app.url') }}/order" class="btn-checkout">Thanh Toán</a>

                        
                    
                </div>


            @endif
    </div>

    <script>
         const baseUrl = "{{ config('app.url') }}";
    document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".quantity-input");

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

            // Gửi AJAX request bằng POST
            updateCartQuantity(productId, newQuantity);
        });
    });

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

        /* Căn giữa nội dung */
        .cart-container {
            text-align: center;
            margin-top: 50px;
        }

        /* Icon giỏ hàng */
        .cart-icon {
            font-size: 80px;
            color: #999;
        }

        /* Văn bản thông báo */
        .cart-text {
            font-size: 20px;
            color: #555;
            margin-top: 10px;
        }

        /* Nút Continue Shopping */
        .continue-btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 15px;
            transition: all 0.3s ease-in-out;
        }

        /* Hiệu ứng hover */
        .continue-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
@endsection