@extends('clients.layouts.hotels.hotel_layout')

@section('hotel_content')
    <div class="row align-items-center g-4 mt-2">


        <!-- Single List -->
        @foreach($data as $item)
            @if($item->hotelCategory_status == 1 && in_array($item->category->name, ['Hotels', 'Hotel', 'hotels', 'hotel']))
                <div class="col-xl-12 col-lg-12 col-12">
                    <div class="card list-layout-block rounded-3 p-3">
                        <div class="row">

                            <div class="col-xl-4 col-lg-3 col-md">
                                <div class="cardImage__caps rounded-2 overflow-hidden h-100">
                                    <div class="position-relative h-100">
                                        <div class="main-carousel list-layouts arrow-hide">
                                            @php
                                                $images = json_decode($item->hotelCategory_images);
                                            @endphp
                                            @foreach($images as $img)
                                                <div class="carousel-cell none">
                                                    <img class="img-fluid h-100 object-fit"
                                                         src="{{ asset('HotelCategories/' .$img) }}" alt="image">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl col-lg col-md">
                                <div class="listLayout_midCaps mt-md-0 mt-3 mb-md-0 mb-3">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="d-inline-block">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $item->hotelCategory_rating)
                                                    <i class="fas fa-star" style="color: gold"></i>
                                                    <!-- full star icon -->
                                                @else
                                                    <i class="far fa-star" style="color: gold"></i>
                                                    <!-- empty star icon -->
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <h4 class="fs-5 fw-bold mb-1">{{$item->hotelCategory_name}}</h4>
                                    <ul class="row gx-2 p-0 excortio">
                                        <li class="col-auto">
                                            <p class="text-muted-2 text-md">Waterloo and Southwark</p>
                                        </li>
                                        <li class="col-auto">
                                            <p class="text-muted-2 text-md fw-bold">.</p>
                                        </li>
                                        <li class="col-auto">
                                            <p class="text-muted-2 text-md">9.8 km from Delhi Airport</p>
                                        </li>
                                        <li class="col-auto">
                                            <p class="text-muted-2 text-md fw-bold">.</p>
                                        </li>
                                        <li class="col-auto">
                                            <p class="text-muted-2 text-md"><a href="#" class="text-primary">Show
                                                    on Map</a></p>
                                        </li>
                                    </ul>
                                    <div class="row detail ellipsis-container mt-0">
                                        @php
                                            $services = [
                                                'Wifi' => $item->service->wifi, // 1: active, 0: inactive
                                                'Bar' => $item->service->bar,
                                                'Parking' => $item->service->parking,
                                                'Restaurant' => $item->service->restaurant,
                                                'Swimming Pool' => $item->service->swimming_pool,
                                                'Gym' => $item->service->gym,
                                                'Laundry' => $item->service->laundry,
                                                'Air Conditioning' => $item->service->air_conditioning,
                                                'Kitchen' => $item->service->kitchen,
                                            ];

                                             $serviceIcons = [
                                                'Wifi' => 'fa-wifi',
                                                'Bar' => 'fa-cocktail',
                                                'Parking' => 'fa-parking',
                                                'Restaurant' => 'fa-utensils',
                                                'Swimming Pool' => 'fa-swimming-pool',
                                                'Gym' => 'fa-dumbbell',
                                                'Laundry' => 'fa-soap',
                                                'Air Conditioning' => 'fa-fan',
                                                'Kitchen' => 'fa-blender',
                                            ];

                                        @endphp

                                        @foreach($services as $serviceName => $serviceStatus)
                                            <span class="col-5" style="color: {{ $serviceStatus ? '#667BC6' : 'gray' }};
                                            text-decoration: {{ $serviceStatus ? 'none' : 'line-through' }};
                                             margin-right: 15px;">
                                             <i class="fa {{ $serviceIcons[$serviceName] }}" aria-hidden="true"></i>
                                             {{ $serviceName }}
                                             </span>
                                        @endforeach

                                    </div>
                                    <div class="position-relative mt-3">
                                        <div class="fw-medium text-dark">Standard Twin Double Room</div>
                                        <div class="text-md text-muted">Last booed 25min ago</div>
                                    </div>
                                    <div class="position-relative mt-4">
                                        <div class="d-block position-relative"><span
                                                class="label bg-light-success text-success">Free
															Cancellation, till 1 hour of Pick up</span></div>
                                        <div class="text-md">
                                            <p class="m-0"><a href="#" class="text-primary">Login</a> & get
                                                additional $15 Off Using
                                                <span class="text-primary">Visa card</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="col-xl-auto col-lg-auto col-md-auto text-right text-md-left d-flex align-items-start align-items-md-end flex-column">
                                <div
                                    class="row align-items-center justify-content-start justify-content-md-end gx-2 mb-3">
                                    <div class="col-auto text-start text-md-end">
                                        <div class="text-md text-dark fw-medium">Exceptional</div>
                                        <div class="text-md text-muted-2">3,014 reviews</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="square--40 rounded-2 bg-primary text-light">4.8</div>
                                    </div>
                                </div>

                                <div class="position-relative mt-auto full-width">
                                    <div
                                        class="d-flex align-items-center justify-content-start justify-content-md-end mb-1">
                                        <span class="label bg-success text-light">15% Off</span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center justify-content-start justify-content-md-end">
                                        <div class="text-muted-2 fw-medium text-decoration-line-through me-2">
                                            @if($item->lowest_room_price)
                                                ${{$item->lowest_room_price}}
                                            @else
                                                Not Available
                                            @endif
                                        </div>
                                        <div class="text-dark fw-bold fs-3">$59</div>
                                    </div>
                                    <div
                                        class="d-flex align-items-start align-items-md-end justify-content-start justify-content-md-end flex-column mb-2">
                                        <div class="text-muted-2 text-sm">+$22 taxes & Fees</div>
                                        <div class="text-muted-2 text-sm">For 2 Nights</div>
                                    </div>
                                    <div
                                        class="d-flex align-items-start align-items-md-end text-start text-md-end flex-column">
                                        <a href="#" class="btn btn-md btn-primary full-width fw-medium px-lg-4">See
                                            Availability<i
                                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <!-- /Single List -->

        <!-- Offer Coupon Box -->
        <div class="col-xl-12 col-lg12 col-md-12">
            <div
                class="d-md-flex bg-success rounded-2 align-items-center justify-content-between px-3 py-3">
                <div class="d-md-flex align-items-center justify-content-start">
                    <div class="flx-icon-first mb-md-0 mb-3">
                        <div class="square--60 circle bg-white"><i
                                class="fa-solid fa-gift fs-3 text-success"></i></div>
                    </div>
                    <div class="flx-caps-first ps-2">
                        <h6 class="fs-5 fw-medium text-light mb-0">Start Exploring The World</h6>
                        <p class="text-light mb-0">Book FlightsEffortless and Earn $50+ for each booking
                            with Booking.com
                        </p>
                    </div>
                </div>
                <div class="flx-last text-md-end mt-md-0 mt-4">
                    <button type="button" class="btn btn-whites fw-medium full-width text-dark px-xl-4">
                        Get Started
                    </button>
                </div>
            </div>
        </div>


        <div class="col-xl-12 col-lg-12 col-12">
            <div class="pags card py-2 px-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination m-0 p-0">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i
                                                        class="fa-solid fa-arrow-left-long"></i></span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i
                                                        class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
@endsection
