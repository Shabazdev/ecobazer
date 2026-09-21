@extends('layouts.app')

@section('title', 'Shopping Cart | Ecobazar')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">My Shopping Cart</h2>

    @if($cartItems->count() > 0)
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                @php
                                    $price = $item->product->sale_price ?? $item->product->price;
                                    $itemSubtotal = $price * $item->quantity;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item->product->image ? asset($item->product->image) : asset('src/images/products/img-01.png') }}" alt="" style="width: 50px; height: 50px; object-fit: contain;" class="me-3">
                                            <span>{{ $item->product->name }}</span>
                                        </div>
                                    </td>
                                    <td>${{ number_format($price, 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm text-center me-2" style="width: 60px;" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="fw-bold">${{ number_format($itemSubtotal, 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">&times;</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-3">Cart Totals</h5>
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
                        <span class="fw-bold fs-5">Total:</span>
                        <span class="fw-bold fs-5 text-success">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success w-100 py-3 rounded-pill">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <h4>Your shopping cart is empty.</h4>
            <a href="{{ route('shop') }}" class="btn btn-success mt-3 rounded-pill px-4">Continue Shopping</a>
        </div>
    @endif
</div>
@endsection
