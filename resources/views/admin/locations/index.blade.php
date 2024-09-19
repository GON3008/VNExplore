@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Location</h2>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" href="#tour_location" data-bs-toggle="tab" data-bs-target="#tour_location">Tour Locations</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" href="#flight_location" data-bs-toggle="tab" data-bs-target="#flight_location">Flight Locations</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" href="#hotel_location" data-bs-toggle="tab" data-bs-target="#hotel_location">Hotel Locations</button>
            </li>
        </ul>

        <div class="tab-content">
            @include('admin.locations.tour_location.index')
            @include('admin.locations.flight_location.index')
            @include('admin.locations.hotel_location.index')
        </div>
    </div>
@endsection

@section('scripts')
    @stack('scripts')
@endsection

