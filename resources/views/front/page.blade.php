@extends('layouts.app')
@section('content')
<div class="container front">
    <h1 class="card-title col-8 mt-3">Welcome to the Booking home page</h1>
    <p class="card-text col-6 mt-3">You might have had bad experiences in the past with hold reservations or such businesses, but Booking is different. Check our services!</p>
</div>
<div class="container div-btn-box1 mt-5">
    
    <div class="card-deck mb-3 text-center col-5 m-5">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Our Destinations and Hotels</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-muted">Top Rated Holidays</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Only best hotels</li>
                    <li>Best price</li>
                    <li>Top service</li>
                    <li>Extra deals and meny others..</li>
                </ul>
                <a href="{{route('order-index')}}" class="btn btn-lg btn-block btn-outline-primary">Check our Hotels</a>
            </div>
        </div>
    </div>
    
</div>
@endsection