@extends('layouts.app')

@section('title', 'Edit Category | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4">
                <h3 class="fw-bold mb-4">Edit Category</h3>
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control">{{ $category->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Image</label>
                        @if($category->image)
                            <div class="mb-2"><img src="{{ asset($category->image) }}" alt="" style="width: 60px; height: 60px; object-fit: contain;"></div>
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill px-5">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
