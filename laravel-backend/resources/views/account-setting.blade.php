@extends('layouts.app')

@section('title', 'Account Settings | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm p-3">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item mb-2"><a href="{{ route('dashboard') }}" class="nav-link text-dark">Dashboard</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('order.history') }}" class="nav-link text-dark">Order History</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('wishlist.index') }}" class="nav-link text-dark">Wishlist</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('account.setting') }}" class="nav-link active bg-success">Account Settings</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card border-0 shadow-sm p-4">
                <h4 class="fw-bold mb-3">Account Settings</h4>
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill px-4">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
