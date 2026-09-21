@extends('layouts.app')

@section('title', 'Order History | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm p-3">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item mb-2"><a href="{{ route('dashboard') }}" class="nav-link text-dark">Dashboard</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('order.history') }}" class="nav-link active bg-success">Order History</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('wishlist.index') }}" class="nav-link text-dark">Wishlist</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('account.setting') }}" class="nav-link text-dark">Account Settings</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card border-0 shadow-sm p-4">
                <h4 class="fw-bold mb-3">Order History</h4>
                @if($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $ord)
                                    <tr>
                                        <td>#{{ $ord->order_number }}</td>
                                        <td>{{ $ord->created_at->format('M d, Y') }}</td>
                                        <td>${{ number_format($ord->total_amount, 2) }}</td>
                                        <td><span class="badge bg-{{ $ord->status == 'completed' ? 'success' : 'warning' }} text-uppercase">{{ $ord->status }}</span></td>
                                        <td><a href="{{ route('order.details', $ord->id) }}" class="btn btn-sm btn-success rounded-pill">View Details</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $orders->links() }}
                    </div>
                @else
                    <p class="text-muted mb-0">You have no orders yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
