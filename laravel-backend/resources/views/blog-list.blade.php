@extends('layouts.app')

@section('title', 'Blog | Ecobazar')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Our Latest News & Blogs</h2>
    <div class="row">
        @for($i=1; $i<=3; $i++)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{ asset('src/images/blogs/blog-0' . $i . '.png') }}" class="card-img-top" alt="Blog" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-muted small mb-1">Food • November 18, 2026</p>
                        <h5 class="card-title fw-bold">Curiously lean vegetables & high protein organic meals</h5>
                        <a href="{{ route('blog.single') }}" class="text-success text-decoration-none fw-bold mt-2 d-inline-block">Read More &rarr;</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
