@extends('layouts.app')

@section('title', 'Admin Orders | Ecobazar')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Orders Management</h2>

    <div class="card border-0 shadow-sm p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $ord)
                        <tr>
                            <td>#{{ $ord->order_number }}</td>
                            <td>{{ $ord->shipping_first_name }} {{ $ord->shipping_last_name }}</td>
                            <td>${{ number_format($ord->total_amount, 2) }}</td>
                            <td><span class="badge bg-{{ $ord->status == 'completed' ? 'success' : 'warning' }} text-uppercase">{{ $ord->status }}</span></td>
                            <td>{{ $ord->created_at->format('M d, Y') }}</td>
                            <td><a href="{{ route('admin.orders.show', $ord->id) }}" class="btn btn-sm btn-outline-success">View Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
