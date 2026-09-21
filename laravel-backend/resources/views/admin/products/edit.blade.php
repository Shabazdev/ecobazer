@extends('layouts.app')

@section('title', 'Edit Product | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4">
                <h3 class="fw-bold mb-4">Edit Product</h3>
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sale Price ($)</label>
                            <input type="number" step="0.01" name="sale_price" class="form-control" value="{{ $product->sale_price }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock Quantity</label>
                        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        @if($product->image)
                            <div class="mb-2"><img src="{{ asset($product->image) }}" alt="" style="width: 60px; height: 60px; object-fit: contain;"></div>
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="featured" {{ $product->is_featured ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">Featured Product</label>
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill px-5">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
