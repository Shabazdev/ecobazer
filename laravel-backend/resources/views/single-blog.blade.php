@extends('layouts.app')

@section('title', 'Blog Details | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-3">Curiously lean vegetables & high protein organic meals</h2>
            <p class="text-muted">Posted on November 18, 2026 by Admin</p>
            <img src="{{ asset('src/images/blogs/blog-01.png') }}" class="img-fluid rounded mb-4 w-100" alt="Blog">
            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
        </div>
    </div>
</div>
@endsection
