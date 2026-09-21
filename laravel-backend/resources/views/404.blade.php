@extends('layouts.app')

@section('title', '404 Not Found | Ecobazar')

@section('content')
<div class="container text-center py-5">
    <img src="{{ asset('src/images/404.png') }}" alt="404" class="img-fluid mb-4" style="max-height: 300px;">
    <h2 class="fw-bold mb-3">Oops! Page not found</h2>
    <p class="text-muted mb-4">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
    <a href="{{ route('home') }}" class="btn btn-success rounded-pill px-5 py-3">Back to Homepage</a>
</div>
@endsection
