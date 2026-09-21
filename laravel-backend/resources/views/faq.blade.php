@extends('layouts.app')

@section('title', 'FAQ | Ecobazar')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item border-0 shadow-sm mb-3">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    What is Ecobazar organic store?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Ecobazar is an online marketplace dedicated to bringing 100% fresh, organic food and groceries direct from local farms to your doorstep.
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 shadow-sm mb-3">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    How do I track my order?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    You can easily track your order status in your user dashboard under "Order History".
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
