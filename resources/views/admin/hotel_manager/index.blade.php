@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Hotel Management</h2>
        <ul class="nav nav-tabs" id="hotelTabs" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="room-option-tab" data-bs-toggle="tab" data-bs-target="#room-option"
                        type="button" role="tab">Room Option
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="room-availability-tab" data-bs-toggle="tab"
                        data-bs-target="#room-availability" type="button" role="tab">Room Availability
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="room-booking-tab" data-bs-toggle="tab" data-bs-target="#room-booking"
                        type="button" role="tab">Room Booking
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="room-details-tab" data-bs-toggle="tab" data-bs-target="#room-details"
                        type="button" role="tab">Room Details
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="hotel-policies-tab" data-bs-toggle="tab" data-bs-target="#hotel-policies"
                        type="button" role="tab">Hotel Policies
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="cancellation-policies-tab" data-bs-toggle="tab"
                        data-bs-target="#cancellation-policies" type="button" role="tab">Cancellation Policies
                </button>
            </li>
        </ul>

        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="room-option" role="tabpanel" aria-labelledby="room-option-tab">
                @include('admin.hotel_manager.room_option.index')
            </div>
            <div class="tab-pane fade" id="room-availability" role="tabpanel" aria-labelledby="room-availability-tab">
                @include('admin.hotel_manager.room_availability.index')
            </div>
            <div class="tab-pane fade" id="room-booking" role="tabpanel" aria-labelledby="room-booking-tab">
                @include('admin.hotel_manager.room_booking.index')
            </div>
            <div class="tab-pane fade" id="room-details" role="tabpanel" aria-labelledby="room-details-tab">
                @include('admin.hotel_manager.room_details.index')
            </div>
            <div class="tab-pane fade" id="hotel-policies" role="tabpanel" aria-labelledby="hotel-policies-tab">
                @include('admin.hotel_manager.hotel_policies.index')
            </div>
            <div class="tab-pane fade" id="cancellation-policies" role="tabpanel"
                 aria-labelledby="cancellation-policies-tab">
                @include('admin.hotel_manager.cancellation_policies.index')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @stack('scripts')
@endsection
