@extends('layouts.app')

@section('title', 'Admin Dashboard | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">Admin Dashboard</h2>
            <div>
                <a href="{{ route('admin.products.index') }}" class="btn btn-success btn-sm">Manage Products</a>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary btn-sm">Manage Categories</a>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-dark btn-sm">Manage Orders</a>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm p-4 bg-light">
                <h6>Total Products</h6>
                <h3 class="fw-bold text-success">{{ $totalProducts }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm p-4 bg-light">
                <h6>Total Categories</h6>
                <h3 class="fw-bold text-primary">{{ $totalCategories }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm p-4 bg-light">
                <h6>Total Orders</h6>
                <h3 class="fw-bold text-warning">{{ $totalOrders }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm p-4 bg-light">
                <h6>Total Revenue</h6>
                <h3 class="fw-bold text-danger">${{ number_format($totalRevenue, 2) }}</h3>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm p-4">
        <h4 class="fw-bold mb-3">Recent Orders</h4>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $ord)
                        <tr>
                            <td>#{{ $ord->order_number }}</td>
                            <td>{{ $ord->shipping_first_name }} {{ $ord->shipping_last_name }}</td>
                            <td>${{ number_format($ord->total_amount, 2) }}</td>
                            <td><span class="badge bg-{{ $ord->status == 'completed' ? 'success' : 'warning' }} text-uppercase">{{ $ord->status }}</span></td>
                            <td><a href="{{ route('admin.orders.show', $ord->id) }}" class="btn btn-sm btn-outline-success">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
