@extends('layouts.app')

@section('title', 'Admin Order Details | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold">Order #{{ $order->order_number }}</h3>
                <p class="text-muted mb-0">Customer: {{ $order->shipping_first_name }} {{ $order->shipping_last_name }} ({{ $order->shipping_email }})</p>
            </div>
            <div>
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex align-items-center gap-2">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-select form-select-sm">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                </form>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="fw-bold">Shipping Address:</h6>
                <p class="mb-0">{{ $order->shipping_address }}</p>
                <p class="mb-0">{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}</p>
                <p class="mb-0">Phone: {{ $order->shipping_phone }}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <h6 class="fw-bold">Payment & Total:</h6>
                <p class="mb-0">Method: {{ ucwords(str_replace('_', ' ', $order->payment_method)) }}</p>
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

        <div class="mt-4">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-success rounded-pill px-4">Back to Orders</a>
        </div>
    </div>
</div>
@endsection
