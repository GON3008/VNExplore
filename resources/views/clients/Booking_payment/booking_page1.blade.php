@extends('clients.layouts.hotels.hotel_layout')

@section('contents')
    <!-- ============================ Booking Page ================================== -->
    <section class="pt-4 gray-simple position-relative">
        <div class="container">

            @include('clients.layouts.booking_payment.step')
            <div class="row align-items-start">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row align-items-start">
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            <div class="card p-3 mb-xl-0 mb-lg-0 mb-3">

                                <!-- Booking Info -->
                                <div class="card-box list-layout-block border br-dashed rounded-3 p-2">
                                    <div class="row">

                                        <div class="col-xl-4 col-lg-3 col-md">
                                            <div class="cardImage__caps rounded-2 overflow-hidden h-100">
                                                @php
                                                    $room_img = json_decode($roomBooking->room_images ?? '[]');
                                                    $first_image = $room_img[0] ?? null;
                                                @endphp
                                                @if($first_image)
                                                    <img class="img-fluid h-100 object-fit"
                                                         src="{{ asset('uploads/hotel_room/' . $first_image) }}"
                                                         alt="image">
                                                @else
                                                    <img src="{{ asset('uploads/hotel_room/default.jpg') }}"
                                                         alt="No Image"
                                                         class="img-fluid rounded-2">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-xl col-lg col-md">
                                            <div class="listLayout_midCaps mt-md-0 mt-3 mb-md-0 mb-3">
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <div class="d-inline-block">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $roomBooking->room_rating)
                                                                <i class="fas fa-star" style="color: gold"></i>
                                                                <!-- full star icon -->
                                                            @else
                                                                <i class="far fa-star" style="color: gold"></i>
                                                                <!-- empty star icon -->
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <h4 class="fs-5 fw-bold mb-1">{{ $roomBooking->room_name }}</h4>
                                                <ul class="row g-2 p-0">
                                                    <li class="col-auto">
                                                        <p class="text-muted-2 text-md">Waterloo and Southwark</p>
                                                    </li>
                                                    <li class="col-auto">
                                                        <p class="text-muted-2 text-md fw-bold">.</p>
                                                    </li>
                                                    <li class="col-auto">
                                                        <p class="text-muted-2 text-md">9.8 km from Delhi
                                                            Airport</p>
                                                    </li>
                                                </ul>
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <div
                                                            class="square--40 rounded-2 bg-primary text-light fw-semibold">
                                                            4.8
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-start ps-2">
                                                        <div class="text-md text-dark fw-medium">Exceptional</div>
                                                        <div class="text-md text-muted-2">3,014 reviews</div>
                                                    </div>
                                                </div>
                                                <div class="position-relative mt-3">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div
                                                            class="d-inline-flex align-items-center border br-dashed rounded-2 p-2 me-2 mb-2">
                                                            <div class="export-icon text-muted-2"><i
                                                                    class="fa-solid fa-bed"></i></div>
                                                            <div class="export ps-2">
                                                                <span
                                                                    class="mb-0 text-muted-2 fw-semibold me-1">{{ $roomOption->ro_bed_type }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="d-inline-flex align-items-center border br-dashed rounded-2 p-2 me-2 mb-2">
                                                            <div class="export-icon text-muted-2"><i
                                                                    class="fa-solid fa-bath"></i></div>
                                                            <div class="export ps-2">
                                                                <span
                                                                    class="mb-0 text-muted-2 fw-semibold me-1">02</span><span
                                                                    class="mb-0 text-muted-2 text-md">Baths</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="d-inline-flex align-items-center border br-dashed rounded-2 p-2 me-2 mb-2">
                                                            <div class="export-icon text-muted-2"><i
                                                                    class="fa-solid fa-house-flood-water-circle-arrow-right"></i>
                                                            </div>
                                                            <div class="export ps-2">
                                                                <span
                                                                    class="mb-0 text-muted-2 fw-semibold me-1">5</span><span
                                                                    class="mb-0 text-muted-2 text-md">Floor</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="d-inline-flex align-items-center border br-dashed rounded-2 p-2 me-2 mb-2">
                                                            <div class="export-icon text-muted-2"><i
                                                                    class="fa-solid fa-user-group"></i></div>
                                                            <div class="export ps-2 text-muted-2">
                                                                <span
                                                                    class="mb-0 text-muted-2 fw-semibold me-1">{{ $roomOption->ro_max_guests }}</span><span
                                                                    class="mb-0 text-muted-2 text-md">Guests</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Flight info -->
                                {{--                                @include('clients.layouts.booking_payment.flight_info')--}}

                                <!-- Good to Know -->
                                @include('clients.layouts.booking_payment.goodtoknow')

                            </div>

                            <div class="pt-4">
                                @include('clients.layouts.booking_payment.ip_notice')
                            </div>

                            <div class="pt-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="div-title d-flex align-items-center mb-3">
                                            <h4>Your Information</h4>
                                        </div>
                                        <div class="">
                                            <div class="form-group">
                                                <label class="form-label">Contact's name</label>
                                                <input type="text" class="form-control fw-bold"
                                                       value="{{ auth()->user()->name }}" placeholder="User Name">
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="form-group">
                                                <label class="form-label">Contact's email address</label>
                                                <input type="text" class="form-control fw-bold"
                                                       value="{{ auth()->user()->email }}" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label">Mobile Number</label>
                                            <div class="col-xl-3 col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           placeholder="Passport Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('clients.layouts.booking_payment.res_summary')

                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center d-flex align-items-center justify-content-center mt-4">
                        <a href="{{ route('booking.page2') }}" class="btn btn-md btn-primary fw-semibold">Next<i
                                class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Booking Page End ================================== -->
@endsection

