@extends('layouts.home_app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Your Orders</h2>
    
    @if ($orders->isEmpty())
        <p class="alert alert-info">You have no orders.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $order->product->image) }}" alt="Product Image" width="80">
                    </td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ number_format($order->total_price, 2) }}</td>
                    <td>
                        <span class="badge 
                            @if($order->status == 'In Progress') badge-warning
                            @elseif($order->status == 'Completed') badge-success
                            @elseif($order->status == 'Cancelled') badge-danger
                            @endif">
                            {{ $order->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
