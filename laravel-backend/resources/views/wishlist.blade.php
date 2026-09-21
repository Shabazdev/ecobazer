@extends('layouts.app')

@section('title', 'My Wishlist | Ecobazar')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">My Wishlist</h2>

    @if($wishlists->count() > 0)
        <div class="row">
            @foreach($wishlists as $wish)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm position-relative">
                        <img src="{{ $wish->product->image ? asset($wish->product->image) : asset('src/images/products/img-01.png') }}" class="card-img-top p-4" alt="{{ $wish->product->name }}" style="height: 200px; object-fit: contain;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><a href="{{ route('product.details', $wish->product->slug) }}" class="text-dark text-decoration-none">{{ $wish->product->name }}</a></h5>
                            <span class="fw-bold text-success mb-3">${{ number_format($wish->product->sale_price ?? $wish->product->price, 2) }}</span>
                            <form action="{{ route('cart.add') }}" method="POST" class="mt-auto">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $wish->product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success btn-sm w-100 rounded-pill">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <h4>Your wishlist is empty.</h4>
            <a href="{{ route('shop') }}" class="btn btn-success mt-3 rounded-pill px-4">Explore Shop</a>
        </div>
    @endif
</div>
@endsection
