@extends('layouts.app')

@section('title', 'Home | Ecobazar')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero__content" style="background-image: url('{{ asset('src/images/banner/bg.png') }}'); background-size: cover; padding: 80px 40px; border-radius: 12px;">
            <span class="sub-title text-success fw-bold text-uppercase">Welcome to Ecobazar</span>
            <h1 class="display-4 fw-bold my-3">Fresh & Healthy <br>Organic Food</h1>
            <p class="lead mb-4">Sale up to <span class="text-danger fw-bold">30% OFF</span> on all fresh products</p>
            <a href="{{ route('shop') }}" class="button button--lg btn btn-success text-white px-5 py-3 rounded-pill">Shop Now &rarr;</a>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="category-section py-5">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-center mb-4">
            <h2>Featured Categories</h2>
            <a href="{{ route('shop') }}" class="text-success text-decoration-none fw-bold">View All (&rarr;)</a>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('shop', ['category' => $category->slug]) }}" class="card text-center p-3 shadow-sm border-0 h-100 text-decoration-none text-dark">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $category->name }}</h5>
                            <p class="text-muted small">{{ $category->products_count }} Products</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="products-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2>Featured Products</h2>
            <p class="text-muted">Handpicked organic products from our trusted local farms</p>
        </div>
        <div class="row">
            @foreach($featuredProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm position-relative">
                        @if($product->sale_price)
                            <span class="badge bg-danger position-absolute m-3">Sale</span>
                        @endif
                        <img src="{{ $product->image ? asset($product->image) : asset('src/images/products/img-01.png') }}" class="card-img-top p-4" alt="{{ $product->name }}" style="height: 220px; object-fit: contain;">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">{{ $product->category->name ?? '' }}</p>
                            <h5 class="card-title"><a href="{{ route('product.details', $product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a></h5>
                            <div class="pricing mt-auto mb-3">
                                @if($product->sale_price)
                                    <span class="text-danger fw-bold fs-5">${{ number_format($product->sale_price, 2) }}</span>
                                    <span class="text-muted text-decoration-line-through ms-2">${{ number_format($product->price, 2) }}</span>
                                @else
                                    <span class="fw-bold fs-5">${{ number_format($product->price, 2) }}</span>
                                @endif
                            </div>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success w-100 rounded-pill">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
