@extends('layouts.admin_app')

@section('content')

    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <div class="container">
        <h2 class="text-center my-4">Orders of {{ $user->name }}</h2>

        <table class="table table-bordered">
            <thead>
                <tr style="font-size: 18px;">
                    <th>Order ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td style="font-size: 18px; font-weight: bold;">{{ $order->id }}</td>
                        <td style="font-size: 18px; font-weight: bold;">${{ number_format($order->total, 2) }}</td>
                        <td>
                            <span
                                class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'delivery' ? 'primary' : 'success') }}"
                                style="font-size: large;">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ config('app.url') . '/admin/user/orders/updateStatus/' . $order->id }}"
                                method="POST">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <select name="status" class="form-select w-auto me-2">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="delivery" {{ $order->status == 'delivery' ? 'selected' : '' }}>Delivery
                                        </option>
                                        <option value="finish" {{ $order->status == 'finish' ? 'selected' : '' }}>Finish</option>
                                    </select>
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                </div>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection