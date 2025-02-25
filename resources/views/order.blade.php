@extends('layouts.home_app')

@section('content')

    <head>
        <link rel="stylesheet" href="../css/footer.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="mb-4">📦 Chi Tiết Đơn Hàng</h1>
        </div>

        <div class="card shadow-lg border-0 rounded">
            <div class="card-body">
                <h4 class="card-title text-primary">🛒 Mã Đơn Hàng: <strong>#{{ $order->id }}</strong></h4>
                <p class="card-text"><strong>🟢 Trạng Thái:</strong> <span class="badge bg-info text-dark "
                        style="font-size: large;">{{ ucfirst($order->status) }}</span></p>
                <p class="card-text"><strong>💰 Tổng Tiền:</strong> <span class="text-success fw-bold"
                        style="font-size: larger;">${{ number_format($order->total, 2) }}</span></p>

                <h5 class="mt-4 text-secondary">📋 Danh Sách Sản Phẩm:</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Sản Phẩm</th>
                                <th class="text-center">Số Lượng</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td class="fw-bold">
                                        <img src="/{{$item->product->image}}" alt="Product Image" class="img-thumbnail"
                                            width="50">
                                        {{ $item->product->name }}
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-center text-warning">${{ number_format($item->price, 2) }}</td>
                                    <td class="text-center text-success fw-bold">
                                        ${{ number_format($item->quantity * $item->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@endsection