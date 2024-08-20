@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Categories</h2>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" href="#tour_category" data-bs-toggle="tab" data-bs-target="#tour_category">Tour Category</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" href="#flight_category" data-bs-toggle="tab" data-bs-target="#flight_category">Flight Category</button>
            </li>
        </ul>

        <div class="tab-content">
            @include('admin.categories.tours.index')
            @include('admin.categories.flights.index')
        </div>
    </div>
@endsection

@section('scripts')
    @stack('scripts')
@endsection

