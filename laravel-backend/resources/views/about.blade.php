@extends('layouts.app')

@section('title', 'About Us | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4">
            <h2 class="fw-bold mb-3">100% Trusted Organic Food Store</h2>
            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('src/images/banner/banner-lg-01.png') }}" alt="About" class="img-fluid rounded shadow-sm">
        </div>
    </div>
</div>
@endsection
