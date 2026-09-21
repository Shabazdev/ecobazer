@extends('layouts.app')

@section('title', $product->name . ' | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm p-4 text-center">
                <img src="{{ $product->image ? asset($product->image) : asset('src/images/products/img-01.png') }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 400px; object-fit: contain;">
            </div>
        </div>
        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
            <p class="text-muted mb-2">Category: <span class="text-success fw-bold">{{ $product->category->name ?? 'General' }}</span></p>
            <div class="pricing mb-3">
                @if($product->sale_price)
                    <span class="text-danger fw-bold fs-3">${{ number_format($product->sale_price, 2) }}</span>
                    <span class="text-muted text-decoration-line-through ms-2 fs-5">${{ number_format($product->price, 2) }}</span>
                @else
                    <span class="fw-bold fs-3">${{ number_format($product->price, 2) }}</span>
                @endif
            </div>
            <p class="text-muted mb-4">{{ $product->description }}</p>

            <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center gap-3">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" class="form-control text-center" style="width: 80px;">
                <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill">Add to Cart</button>
            </form>

            <hr class="my-4">
            <p class="small text-muted mb-1"><strong>Availability:</strong> {{ $product->stock > 0 ? 'In Stock (' . $product->stock . ')' : 'Out of Stock' }}</p>
            <p class="small text-muted"><strong>SKU:</strong> ECO-PRD-{{ $product->id }}</p>
        </div>
    </div>

    @if($relatedProducts->count() > 0)
        <div class="row mt-5">
            <h3 class="fw-bold mb-4 text-center">Related Products</h3>
            @foreach($relatedProducts as $rel)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ $rel->image ? asset($rel->image) : asset('src/images/products/img-01.png') }}" class="card-img-top p-3" alt="{{ $rel->name }}" style="height: 180px; object-fit: contain;">
                        <div class="card-body text-center">
                            <h6><a href="{{ route('product.details', $rel->slug) }}" class="text-dark text-decoration-none">{{ $rel->name }}</a></h6>
                            <span class="fw-bold text-success">${{ number_format($rel->sale_price ?? $rel->price, 2) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
