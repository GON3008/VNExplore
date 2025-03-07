@extends('clients.layouts.hotels.hotel_layout')

@section('contents')
    <section class="pt-4 gray-simple position-relative">
        <div class="container">
            @include('clients.layouts.booking_payment.step')
            <div class="row align-items-start">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row align-items-start">
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            @include('clients.layouts.booking_payment.ip_notice')
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
                                                <input type="text" class="form-control" placeholder="Passport Number">
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
                        <a href="booking-page.html" class="btn btn-md btn-dark fw-semibold mx-2"><i
                                class="fa-solid fa-arrow-left me-2"></i>Previous</a>
                        <a href="{{ route('booking.page3') }}" class="btn btn-md btn-primary fw-semibold mx-2">Make Your
                            Payment<i
                                class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
