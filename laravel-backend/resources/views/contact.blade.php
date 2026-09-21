@extends('layouts.app')

@section('title', 'Contact Us | Ecobazar')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
                <h5 class="fw-bold mb-2">To Satff</h5>
                <p class="text-muted">2715 Ash Dr. San Jose, South Dakota 83475</p>
                <p class="text-success fw-bold">proxy@gmail.com</p>
                <p class="text-dark fw-bold">(219) 555-0193</p>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4">
                <h3 class="fw-bold mb-3">Just Say Hello!</h3>
                <form action="#" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="col-12">
                            <textarea name="message" rows="5" class="form-control" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success px-5 py-3 rounded-pill">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
