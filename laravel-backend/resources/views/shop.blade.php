@extends('layouts.app')

@section('title', 'Shop | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm p-4 mb-4">
                <h5 class="fw-bold mb-3">All Categories</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('shop') }}" class="text-decoration-none {{ !request('category') ? 'text-success fw-bold' : 'text-dark' }}">All Products</a>
                    </li>
                    @foreach($categories as $cat)
                        <li class="mb-2">
                            <a href="{{ route('shop', ['category' => $cat->slug]) }}" class="text-decoration-none {{ request('category') == $cat->slug ? 'text-success fw-bold' : 'text-dark' }}">
                                {{ $cat->name }} <span class="text-muted">({{ $cat->products_count }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4 bg-light p-3 rounded">
                <p class="mb-0 text-muted">Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} results</p>
                <form action="{{ route('shop') }}" method="GET" class="d-flex align-items-center">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">Default Sorting</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </form>
            </div>

            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm position-relative">
                            @if($product->sale_price)
                                <span class="badge bg-danger position-absolute m-3">Sale</span>
                            @endif
                            <img src="{{ $product->image ? asset($product->image) : asset('src/images/products/img-01.png') }}" class="card-img-top p-4" alt="{{ $product->name }}" style="height: 200px; object-fit: contain;">
                            <div class="card-body d-flex flex-column">
                                <p class="text-muted small mb-1">{{ $product->category->name ?? '' }}</p>
                                <h6 class="card-title"><a href="{{ route('product.details', $product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a></h6>
                                <div class="pricing mt-auto mb-3">
                                    @if($product->sale_price)
                                        <span class="text-danger fw-bold">${{ number_format($product->sale_price, 2) }}</span>
                                        <span class="text-muted text-decoration-line-through ms-2 small">${{ number_format($product->price, 2) }}</span>
                                    @else
                                        <span class="fw-bold">${{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-success btn-sm w-100 rounded-pill">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h4>No products found.</h4>
                        <a href="{{ route('shop') }}" class="btn btn-success mt-3">Reset Filters</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
