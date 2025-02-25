@extends('layouts.home_app')

@section('content')

    <head>
        <link rel="stylesheet" href="../css/footer.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">📜 Lịch Sử Đơn Hàng</h1>

    @if($orders->isEmpty())
        <div class="alert alert-warning text-center shadow-sm p-4 rounded">
            <h4 class="mb-3">😢 Bạn chưa có đơn hàng nào.</h4>
            <a href="{{ config('app.url') }}/dashboard" class="btn btn-primary fw-bold px-4 py-2">
                🛒 Mua Ngay
            </a>
        </div>
    @else
        <div class="table-responsive shadow-lg rounded">
            <table class="table table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th class="text-nowrap px-4 py-3">#</th>
                        <th class="text-nowrap px-4 py-3">Ngày Đặt</th>
                        <th class="text-nowrap px-4 py-3">Trạng Thái</th>
                        <th class="text-nowrap px-4 py-3">Tổng Tiền</th>
                        <th class="text-nowrap px-4 py-3">Chi Tiết</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($orders as $order)
                        @php
                            $statusColors = [
                                'pending' => 'bg-danger text-white',
                                'delivery' => 'bg-warning text-dark',
                                'finish' => 'bg-success text-white'
                            ];
                        @endphp
                        <tr class="border-bottom">
                            <td class="text-nowrap px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="text-nowrap px-4 py-3">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-nowrap px-4 py-3">
                                <span class="badge {{ $statusColors[$order->status] ?? 'bg-secondary' }} px-3 py-2 rounded-pill shadow-sm">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="text-nowrap px-4 py-3 text-success fw-bold fs-5">${{ number_format($order->total, 2) }}</td>
                            <td class="text-nowrap px-4 py-3">
                                <a href="{{ config('app.url') }}/order/{{ $order->id }}" class="btn btn-outline-primary btn-sm px-3 py-2">
                                    📄 Xem Đơn
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<style>
    a {
        text-decoration: none;
    }
    .table thead th {
        background-color: #343a40 !important;
        color: white;
        font-size: 16px;
        text-align: center;
    }
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    .badge {
        font-size: 14px;
    }
</style>

@endsection