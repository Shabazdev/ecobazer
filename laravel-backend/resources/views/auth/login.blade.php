@extends('layouts.app')

@section('title', 'Sign In | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                <h3 class="fw-bold mb-4 text-center">Sign In to Ecobazar</h3>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') ?? '#' }}" class="text-success small text-decoration-none">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-3 rounded-pill mb-3">Sign In</button>
                    <p class="text-center small text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-success fw-bold text-decoration-none">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
