@extends('layouts.app')

@section('title', 'Order Details | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold">Order #{{ $order->order_number }}</h3>
                <p class="text-muted mb-0">Placed on {{ $order->created_at->format('M d, Y H:i') }}</p>
            </div>
            <div>
                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'info') }} fs-6 text-uppercase">{{ $order->status }}</span>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="fw-bold">Shipping Address:</h6>
                <p class="mb-0">{{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</p>
                <p class="mb-0">{{ $order->shipping_address }}</p>
                <p class="mb-0">{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}</p>
                <p class="mb-0">Phone: {{ $order->shipping_phone }}</p>
                <p class="mb-0">Email: {{ $order->shipping_email }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <h6 class="fw-bold">Payment & Total:</h6>
                <p class="mb-0">Payment Method: {{ ucwords(str_replace('_', ' ', $order->payment_method)) }}</p>
                <p class="fw-bold fs-4 text-success mb-0">Total: ${{ number_format($order->total_amount, 2) }}</p>
            </div>
        </div>

        <h5 class="fw-bold mb-3">Order Items</h5>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td class="fw-bold">${{ number_format($item->subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('order.history') }}" class="btn btn-outline-success rounded-pill px-4">Back to Orders</a>
        </div>
    </div>
</div>
@endsection
