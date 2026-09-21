@extends('layouts.app')

@section('title', 'Checkout | Ecobazar')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Billing Information</h2>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="shipping_first_name" class="form-control" value="{{ old('shipping_first_name', auth()->user()->name ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="shipping_last_name" class="form-control" value="{{ old('shipping_last_name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="shipping_email" class="form-control" value="{{ old('shipping_email', auth()->user()->email ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="shipping_phone" class="form-control" value="{{ old('shipping_phone') }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Street Address</label>
                            <input type="text" name="shipping_address" class="form-control" value="{{ old('shipping_address') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">City</label>
                            <input type="text" name="shipping_city" class="form-control" value="{{ old('shipping_city') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">State / Province</label>
                            <input type="text" name="shipping_state" class="form-control" value="{{ old('shipping_state') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Zip Code</label>
                            <input type="text" name="shipping_zip" class="form-control" value="{{ old('shipping_zip') }}">
                        </div>
                    </div>

                    <h4 class="fw-bold mt-4 mb-3">Payment Method</h4>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cash_on_delivery" checked>
                        <label class="form-check-label fw-bold" for="cod">
                            Cash on Delivery (COD)
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-3">Order Summary</h5>
                    <ul class="list-unstyled mb-3">
                        @foreach($cartItems as $item)
                            @php
                                $price = $item->product->sale_price ?? $item->product->price;
                            @endphp
                            <li class="d-flex justify-content-between mb-2 small">
                                <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                                <span>${{ number_format($price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span class="fw-bold">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping:</span>
                        <span class="text-success">Free</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total Amount:</span>
                        <span class="fw-bold fs-5 text-success">${{ number_format($total, 2) }}</span>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-3 rounded-pill">Place Order</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
