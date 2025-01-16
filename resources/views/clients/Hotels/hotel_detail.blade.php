@extends('clients.layouts.hotels.hotel_layout')

@section('room_show')
    <!-- Breadcrumb -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-primary">Hotel in Denver, USA</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$hotelCategory->hotelCategory_name}}</li>
            </ol>
        </nav>
    </div>

    <!-- Gallery & Info -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card border-0 p-3 mb-4">

            <div class="crd-heaader d-md-flex align-items-center justify-content-between">
                <div class="crd-heaader-first">
                    <div class="d-inline-flex align-items-center mb-1">
                        <span class="label bg-light-success text-success">Health Protected</span>
                        <div class="d-inline-block ms-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $hotelCategory->hotelCategory_rating)
                                    <i class="fas fa-star" style="color: gold"></i>
                                    <!-- full star icon -->
                                @else
                                    <i class="far fa-star" style="color: gold"></i>
                                    <!-- empty star icon -->
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="d-block">
                        <h4 class="mb-0">{{ $hotelCategory->hotelCategory_name }}</h4>
                        <div class="">
                            <p class="text-md m-0"><i class="fa-solid fa-location-dot me-2"></i>577 Jalan Sultan Road
                                Singapore, 245652 Singapore. <a href="#" class="text-primary fw-medium ms-2">Show on
                                    Map</a></p>
                        </div>
                    </div>
                </div>
                <div class="crd-heaader-last my-md-0 my-2">
                    <div class="drix-wrap d-flex align-items-center">
                        <div class="drix-first pe-2">
                            <div class="text-dark fw-semibold fs-4">US$107</div>
                            <div class="d-flex align-items-center justify-content-start justify-content-md-end">
                                <span class="label bg-success text-light">15% Off</span>
                            </div>
                        </div>
                        <div class="drix-last">
                            <button type="button" class="btn btn-primary fw-semibold">Select Rooms</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="galleryGrid typeGrid_3 mt-2">
                @php
                    $images = json_decode($hotelCategory->hotelCategory_images);
                @endphp

                @foreach($images as $index => $image)
                    @if($index < 6)
                        <div class="galleryGrid__item">
                            <a href="{{ asset('HotelCategories/' . $image) }}" data-lightbox="roadtrip">
                                <img src="{{ asset('HotelCategories/' . $image) }}" alt="Hotel Image"
                                     class="rounded-2 img-fluid">
                            </a>
                        </div>
                    @elseif($index == 6)
                        <div class="galleryGrid__item position-relative">
                            <a href="{{ asset('HotelCategories/' . $image) }}" data-lightbox="roadtrip">
                                <img src="{{ asset('HotelCategories/' . $image) }}" alt="Hotel Image"
                                     class="rounded-2 img-fluid">
                            </a>
                            <div class="position-absolute end-0 bottom-0 mb-3 me-3">
                                <a href="{{ asset('HotelCategories/' . $image) }}" data-lightbox="roadtrip"
                                   class="btn btn-md btn-whites fw-medium text-dark">
                                    <i class="fa-solid fa-caret-right me-1"></i> {{ count($images) - 7 }} More Photos
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($index > 6)
                        <a href="{{ asset('HotelCategories/' . $image) }}" data-lightbox="roadtrip"
                           style="display: none;"></a>
                    @endif
                @endforeach
            </div>

        </div>
    </div>

    <!-- Top Attractions -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="row align-items-center justify-content-between gx-4">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card p-3 mb-4">
                    <div class="nearestServ-wrap">
                        <div class="nearestServ-head d-flex mb-1">
                            <h6 class="fs-6 fw-semibold text-primary mb-1"><i
                                    class="fa-brands fa-servicestack me-2"></i>Top
                                Attractions</h6>
                        </div>
                        <div class="nearestServ-caps">
                            <ul class="row align-items-start g-2 p-0 m-0">
                                <li class="col-12 text-muted-2">Hong Kong Disneyland (170m)</li>
                                <li class="col-12 text-muted-2">Hong Kong Museum (250m)</li>
                                <li class="col-12 text-muted-2">The Peak Tram (80m)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card p-3 mb-4">
                    <div class="nearestServ-wrap">
                        <div class="nearestServ-head d-flex mb-1">
                            <h6 class="fs-6 fw-semibold text-primary mb-1"><i class="fa-solid fa-jet-fighter me-2"></i>Nearest
                                Airport & Metro</h6>
                        </div>
                        <div class="nearestServ-caps">
                            <ul class="row align-items-start g-2 p-0 m-0">
                                <li class="col-12 text-muted-2">Airport: Janghai Airport (370m)</li>
                                <li class="col-12 text-muted-2">Airport: Shivalay Airport (2.4km)</li>
                                <li class="col-12 text-muted-2">Metro: Mandpam (500m)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card p-3 mb-4">
                    <div class="nearestServ-wrap">
                        <div class="nearestServ-head d-flex mb-1">
                            <h6 class="fs-6 fw-semibold text-primary mb-1"><i
                                    class="fa-solid fa-martini-glass-empty me-2"></i>Cafe & Bars</h6>
                        </div>
                        <div class="nearestServ-caps">
                            <ul class="row align-items-start g-2 p-0 m-0">
                                <li class="col-12 text-muted-2">Cafe: Bekker Cofee Cafe (60m)</li>
                                <li class="col-12 text-muted-2">Cafe: Levendaram restaurants (120m)</li>
                                <li class="col-12 text-muted-2">Bar: The Blue Bar (90m)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Alert -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="d-flex align-items-center justify-content-start py-3 px-3 rounded-2 bg-success mb-4">
            <p class="text-light fw-semibold m-0"><i class="fa-solid fa-gift text-warning me-2"></i><a href="#"
                                                                                                       class="text-white text-decoration-underline">Login</a>
                or <a href="#"
                      class="text-white text-decoration-underline">Register</a> to earn upto 100 coins (approx 1.72 US$)
                after check-out.
            <p>
        </div>
    </div>

    <!-- Rooms Details -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        @foreach($hotelRooms as $room)
            <!-- Single Room Option -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="fw-semibold mb-0">{{ $room->room_name }}</h6>
                </div>

                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-xl-3 col-lg-4 col-md-4">
                            <div class="roomavls-groups">
                                <div class="roomavls-thumb mb-2">
                                    @php
                                        $room_img = json_decode($room->room_images);
                                        $first_image = $room_img[0] ?? null;
                                    @endphp
                                    @if($first_image)
                                        <img src="{{ asset('uploads/hotel_room/' . $first_image) }}" alt="Room Image"
                                             class="img-fluid rounded-2">
                                    @else
                                        <img src="{{ asset('uploads/hotel_room/default.jpg') }}" alt="No Image"
                                             class="img-fluid rounded-2">
                                    @endif
                                </div>
                                <div class="roomavls-caps">
                                    <div class="roomavls-escols d-flex align-items-start mb-2">
                                        <span class="label bg-light-purple text-purple me-2">King Bed</span><span
                                            class="label bg-light-purple text-purple">3 Sleeps</span>
                                    </div>
                                    <div class="roomavls-lists">
                                        <ul class="row align-items-center gx-2 gy-1 mb-0 p-0">
                                            <li class="col-6"><span class="text-muted-2 text-md"><i
                                                        class="fa-brands fa-bity me-2"></i>City View</span></li>
                                            <li class="col-6"><span class="text-muted-2 text-md"><i
                                                        class="fa-solid fa-ban-smoking me-2"></i>Non-Smoking</span></li>
                                            <li class="col-6"><span class="text-muted-2 text-md"><i
                                                        class="fa-solid fa-vector-square me-2"></i>1800sqft | 6 Floor</span>
                                            </li>
                                            <li class="col-6"><span class="text-muted-2 text-md"><i
                                                        class="fa-solid fa-wifi me-2"></i>Free Wi-Fi</span></li>
                                            <li class="col-6"><span class="text-muted-2 text-md"><i
                                                        class="fa-solid fa-bath me-2"></i>Private Bathroom</span></li>
                                            <li class="col-6"><span class="text-muted-2 text-md"><i
                                                        class="fa-solid fa-snowflake me-2"></i>Air Conditioning</span>
                                            </li>
                                            <li class="col-6"><span class="text-muted-2 text-md"><i
                                                        class="fa-solid fa-cash-register me-2"></i>Refrigerator</span>
                                            </li>
                                            <li class="col-6"><span class="text-muted-2 text-md"><i
                                                        class="fa-solid fa-tty me-2"></i>Telephone</span></li>
                                            <li class="col-12"><a href="#" class="text-primary fw-medium text-md">Show
                                                    More
                                                    Room
                                                    Amenties</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-8">

                            <!-- Single Item -->
                            <div class="d-block border br-dashed rounded-2 px-3 py-3 mb-3">
                                <div class="d-flex align-items-sm-end justify-content-between flex-sm-row flex-column">
                                    <div class="typsofrooms-wrap">
                                        <div class="d-flex align-items-center">
                                            <h6 class="fs-6 fw-semibold mb-1 me-2">Your Choice</h6><a href="#"
                                                                                                      class="text-muted fs-6"><i
                                                    class="fa-solid fa-circle-question"></i></a>
                                        </div>
                                        <div class="typsofrooms-groups d-flex align-items-start">
                                            <div class="typsofrooms-brk1 mb-4">
                                                <ul class="row align-items-center g-1 mb-0 p-0">
                                                    <li class="col-12"><span class="text-muted-2 text-md"><i
                                                                class="fa-solid fa-mug-saucer me-2"></i>Breackfast for US$10 (Optional)</span>
                                                    </li>
                                                    <li class="col-12"><span class="text-muted-2 text-md"><i
                                                                class="fa-solid fa-ban-smoking me-2"></i>Non-Refundable</span>
                                                    </li>
                                                    <li class="col-12"><span class="text-success text-md"><i
                                                                class="fa-solid fa-meteor me-2"></i>Instant Confirmation</span>
                                                    </li>
                                                    <li class="col-12"><span class="text-muted-2 text-md"><i
                                                                class="fa-brands fa-cc-visa me-2"></i>Prepay Online</span>
                                                    </li>
                                                    <li class="col-12"><span class="text-success text-md"><i
                                                                class="fa-solid fa-circle-check me-2"></i>Booking of Maximum 5 Rooms</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="typsofrooms-action col-auto">
                                        <div class="prcrounce-groups">
                                            <div
                                                class="d-flex align-items-center justify-content-start justify-content-sm-end">
                                                <div class="text-dark fw-semibold fs-4">US$ 99</div>
                                            </div>
                                            <div
                                                class="d-flex align-items-start align-items-sm-end justify-content-start justify-content-md-end flex-column mb-2">
                                                <div class="text-muted-2 text-sm">After tax US$ 102</div>
                                            </div>
                                        </div>
                                        <div
                                            class="prcrounce-groups-button d-flex flex-column align-items-start align-items-md-end mt-3">
                                            <div class="prcrounce-sngbuttons d-flex mb-2">
                                                <button
                                                    class="btn btn-sm btn-light-primary rounded-1 fw-medium px-4">Book
                                                    at
                                                    This
                                                    Price
                                                </button>
                                            </div>
                                            <div class="prcrounce-sngbuttons d-flex">
                                                <button
                                                    class="btn btn-sm btn-primary rounded-1 fw-medium px-4">Access Lower
                                                    Price
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Single Item -->

                            <!-- Single Item -->
                            <div class="d-block border br-dashed rounded-2 px-3 py-3">
                                <div class="d-flex align-items-sm-end justify-content-between flex-sm-row flex-column">
                                    <div class="typsofrooms-wrap">
                                        <div class="d-flex align-items-center">
                                            <h6 class="fs-6 fw-semibold mb-1 me-2">Your Choice</h6><a href="#"
                                                                                                      class="text-muted fs-6"><i
                                                    class="fa-solid fa-circle-question"></i></a>
                                        </div>
                                        <div class="typsofrooms-groups d-flex align-items-start">
                                            <div class="typsofrooms-brk1 mb-4">
                                                <ul class="row align-items-center g-1 mb-0 p-0">
                                                    <li class="col-12"><span class="text-success text-md"><i
                                                                class="fa-solid fa-mug-saucer me-2"></i>Breackfast Included</span>
                                                    </li>
                                                    <li class="col-12"><span class="text-muted-2 text-md"><i
                                                                class="fa-solid fa-ban-smoking me-2"></i>Non-Refundable</span>
                                                    </li>
                                                    <li class="col-12"><span class="text-success text-md"><i
                                                                class="fa-solid fa-meteor me-2"></i>Instant Confirmation</span>
                                                    </li>
                                                    <li class="col-12"><span class="text-muted-2 text-md"><i
                                                                class="fa-brands fa-cc-visa me-2"></i>Prepay Online</span>
                                                    </li>
                                                    <li class="col-12"><span class="text-success text-md"><i
                                                                class="fa-solid fa-circle-check me-2"></i>Booking of Maximum 5 Rooms</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="typsofrooms-action col-auto">
                                        <div class="prcrounce-groups">
                                            <div
                                                class="d-flex align-items-center justify-content-start justify-content-sm-end">
                                                <div class="text-dark fw-semibold fs-4">US$ 107</div>
                                            </div>
                                            <div
                                                class="d-flex align-items-start align-items-sm-end justify-content-start justify-content-md-end flex-column mb-2">
                                                <div class="text-muted-2 text-sm">After tax US$ 110</div>
                                            </div>
                                        </div>
                                        <div
                                            class="prcrounce-groups-button d-flex flex-column align-items-start align-items-md-end mt-3">
                                            <div class="prcrounce-sngbuttons d-flex mb-2">
                                                <button
                                                    class="btn btn-sm btn-light-primary rounded-1 fw-medium px-4">Book
                                                    at
                                                    This
                                                    Price
                                                </button>
                                            </div>
                                            <div class="prcrounce-sngbuttons d-flex">
                                                <button
                                                    class="btn btn-sm btn-primary rounded-1 fw-medium px-4">Access Lower
                                                    Price
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Single Item -->

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Service & Amenties -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="fs-5 mb-0">Service & Amenties</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <h5 class="fs-6 fw-semibold mb-0">Most Popular Amenities</h5>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8">
                        <div class="row align-items-start">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <ul class="row align-items-center p-0 mb-0">
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Parking<span
                                                class="text-success fw-medium ms-3">Free</span></div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Outdoor Swimming Pool</div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Meeting Room</div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Children's Playground</div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Multi-Function Room</div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Smoking Area</div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Fitness Room</div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Wi-Fi in Public Areas<span
                                                class="text-success fw-medium ms-3">Free</span></div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Languages Spoken at Front Desk</div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">Luggage Storage</div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center mb-3">24-Hour Front Desk</div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <ul class="row align-items-center g-3 p-0 mb-0">
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                        <div class="d-flex flex-column align-items-center rounded border br-dashed p-2">
                                            <div class="room-alsyruk mb-2"><img src="assets/img/hotel/hotel-5.jpg"
                                                                                class="img-fluid rounded"
                                                                                alt=""></div>
                                            <div class="tedfr-caps text-center "><span
                                                    class="text-muted-2">Meeting Room</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                        <div class="d-flex flex-column align-items-center rounded border br-dashed p-2">
                                            <div class="room-alsyruk mb-2"><img src="assets/img/hotel/hotel-5.jpg"
                                                                                class="img-fluid rounded"
                                                                                alt=""></div>
                                            <div class="tedfr-caps text-center "><span
                                                    class="text-muted-2">Restaurant</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                        <div class="d-flex flex-column align-items-center rounded border br-dashed p-2">
                                            <div class="room-alsyruk mb-2"><img src="assets/img/hotel/hotel-5.jpg"
                                                                                class="img-fluid rounded"
                                                                                alt=""></div>
                                            <div class="tedfr-caps text-center "><span
                                                    class="text-muted-2">Playground</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-6">
                                        <div class="d-flex flex-column align-items-center rounded border br-dashed p-2">
                                            <div class="room-alsyruk mb-2"><img src="assets/img/hotel/hotel-5.jpg"
                                                                                class="img-fluid rounded"
                                                                                alt=""></div>
                                            <div class="tedfr-caps text-center "><span
                                                    class="text-muted-2">Night Bars</span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Nearest Services -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="fs-5 mb-0">Nearest Services</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-start mb-4">
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <h5 class="fs-6 fw-semibold mb-0">Transport</h5>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8">
                        <div class="row align-items-start">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <ul class="row align-items-center p-0 mb-0">
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first">Metro:<span class="text-dark ms-2">Lavender</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">360m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first">Metro:<span
                                                    class="text-dark ms-2">Jalan Besar MRT</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">80m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first">Airport:<span class="text-dark ms-2">Singapore Changi
																	Airport</span></div>
                                            <div class="explot-distance"><span class="text-muted">160m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first">Train:<span class="text-dark ms-2">Woodlands Train
																	Checkpoint</span></div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-start mb-4">
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <h5 class="fs-6 fw-semibold mb-0">Landmarks</h5>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8">
                        <div class="row align-items-start">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <ul class="row align-items-center p-0 mb-0">
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">Sentosa</span></div>
                                            <div class="explot-distance"><span class="text-muted">360m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">Gardens by the Bay</span></div>
                                            <div class="explot-distance"><span class="text-muted">80m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">S.E.A. Aquarium</span></div>
                                            <div class="explot-distance"><span class="text-muted">160m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">Singapore Flyer</span></div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">Wings Of Time</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">Sands SkyPark</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-start mb-4">
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <h5 class="fs-6 fw-semibold mb-0">Dining</h5>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8">
                        <div class="row align-items-start">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <ul class="row align-items-center p-0 mb-0">
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">SYMMETRY</span></div>
                                            <div class="explot-distance"><span class="text-muted">360m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">Tai Hwa Pork Noodle</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">80m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">Sungei Road Laksa</span></div>
                                            <div class="explot-distance"><span class="text-muted">160m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">The Dim Sum Place</span></div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">The Ramen Stall</span></div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">Taliwang Restaurant</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-start mb-4">
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <h5 class="fs-6 fw-semibold mb-0">Shopping</h5>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8">
                        <div class="row align-items-start">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <ul class="row align-items-center p-0 mb-0">
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">Bugis Street</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">360m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">Mustafa Centre</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">80m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">Bugis Junction</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">160m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">Tekka Centre</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span
                                                    class="text-dark ms-2">Orchard Central</span></div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">Ngee Ann City</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                    <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="explot-first"><span class="text-dark ms-2">ION Orchard</span>
                                            </div>
                                            <div class="explot-distance"><span class="text-muted">200m</span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Guests Reviews -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="fs-5 mb-0">Guests Reviews</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-4">
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <div class="rounded-3 bg-primary full-width">
                            <div class="py-4 px-3 text-center">
                                <h3 class="text-light display-2 fw-semibold mb-0">92</h3>
                                <p class="text-light lh-base m-0">Extraordinary 786 Reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8">
                        <div class="row align-items-start">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <ul class="row align-items-center p-0 mb-0 gy-3 gx-4">
                                    <li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="revs-wraps">
                                            <div
                                                class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
                                                <span class="text-dark fw-semibold text-md">Dishes</span>
                                                <span class="text-dark fw-semibold text-md">8.7</span>
                                            </div>
                                            <div class="progress " role="progressbar" aria-label="Example"
                                                 aria-valuenow="87"
                                                 aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                                                <div class="progress-bar bg-primary" style="width: 87%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="revs-wraps">
                                            <div
                                                class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
                                                <span class="text-dark fw-semibold text-md">Swimming</span>
                                                <span class="text-dark fw-semibold text-md">9.2</span>
                                            </div>
                                            <div class="progress " role="progressbar" aria-label="Example"
                                                 aria-valuenow="92"
                                                 aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                                                <div class="progress-bar bg-primary" style="width: 92%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="revs-wraps">
                                            <div
                                                class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
                                                <span class="text-dark fw-semibold text-md">Rooms</span>
                                                <span class="text-dark fw-semibold text-md">8.8</span>
                                            </div>
                                            <div class="progress " role="progressbar" aria-label="Example"
                                                 aria-valuenow="88"
                                                 aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                                                <div class="progress-bar bg-primary" style="width: 88%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="revs-wraps">
                                            <div
                                                class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
                                                <span class="text-dark fw-semibold text-md">Location</span>
                                                <span class="text-dark fw-semibold text-md">8.9</span>
                                            </div>
                                            <div class="progress " role="progressbar" aria-label="Example"
                                                 aria-valuenow="89"
                                                 aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                                                <div class="progress-bar bg-primary" style="width: 89%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="revs-wraps">
                                            <div
                                                class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
                                                <span class="text-dark fw-semibold text-md">Services</span>
                                                <span class="text-dark fw-semibold text-md">9.2</span>
                                            </div>
                                            <div class="progress " role="progressbar" aria-label="Example"
                                                 aria-valuenow="92"
                                                 aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                                                <div class="progress-bar bg-primary" style="width: 92%"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="revs-wraps">
                                            <div
                                                class="revs-wraps-flex d-flex align-items-center justify-content-between mb-1">
                                                <span class="text-dark fw-semibold text-md">Cleanliness</span>
                                                <span class="text-dark fw-semibold text-md">8.6</span>
                                            </div>
                                            <div class="progress " role="progressbar" aria-label="Example"
                                                 aria-valuenow="86"
                                                 aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                                                <div class="progress-bar bg-primary" style="width: 86%"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="gstRevws-groups">

                            <!-- Single Reviwws -->
                            <div class="single-gstRevws rounded-2 border p-2 d-flex align-items-start mb-3">
                                <div class="single-gstRevws-thumb">
                                    <div class="rounded-2 overflow-hidden w-25 h-25">
                                        <img src="assets/img/team-1.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="single-gstRevws-caps ps-3">
                                    <div class="gstRevws-head d-flex align-items-start justify-content-between">
                                        <div class="dfls-headers">
                                            <h5 class="h6 text-dark fw-semibold mb-0">Adam Bluecart</h5>
                                            <p class="text-md mb-0">Canada</p>
                                        </div>
                                        <div class="dfls-arrios"><span class="text-muted text-md">10 July 2023</span>
                                        </div>
                                    </div>
                                    <div class="dfls-secription">
                                        <p class="mb-0">In a free hour, But in certain circumstances and owing to the
                                            claims of
                                            duty or the obligations of business when our power of choice is untrammelled
                                            and when
                                            nothing prevents our being able to do what we like best, every pleasure is
                                            to be
                                            welcomed and every pain avoided.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Reviwws -->
                            <div class="single-gstRevws rounded-2 border p-2 d-flex align-items-start mb-3">
                                <div class="single-gstRevws-thumb">
                                    <div
                                        class="rounded-2 bg-light-purple d-flex align-items-center justify-content-center overflow-hidden w-25 h-25">
                                        <h3 class="m-0 fs-1 fw-semibold text-purple">K</h3>
                                    </div>
                                </div>
                                <div class="single-gstRevws-caps ps-3">
                                    <div class="gstRevws-head d-flex align-items-start justify-content-between">
                                        <div class="dfls-headers">
                                            <h5 class="h6 text-dark fw-semibold mb-0">Adam Bluecart</h5>
                                            <p class="text-md mb-0">Canada</p>
                                        </div>
                                        <div class="dfls-arrios"><span class="text-muted text-md">10 July 2023</span>
                                        </div>
                                    </div>
                                    <div class="dfls-secription">
                                        <p class="mb-0">In a free hour, But in certain circumstances and owing to the
                                            claims of
                                            duty or the obligations of business when our power of choice is untrammelled
                                            and when
                                            nothing prevents our being able to do what we like best, every pleasure is
                                            to be
                                            welcomed and every pain avoided.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Reviwws -->
                            <div class="single-gstRevws rounded-2 border p-2 d-flex align-items-start mb-3">
                                <div class="single-gstRevws-thumb">
                                    <div class="rounded-2 overflow-hidden w-25 h-25">
                                        <img src="assets/img/team-3.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="single-gstRevws-caps ps-3">
                                    <div class="gstRevws-head d-flex align-items-start justify-content-between">
                                        <div class="dfls-headers">
                                            <h5 class="h6 text-dark fw-semibold mb-0">Adam Bluecart</h5>
                                            <p class="text-md mb-0">Canada</p>
                                        </div>
                                        <div class="dfls-arrios"><span class="text-muted text-md">10 July 2023</span>
                                        </div>
                                    </div>
                                    <div class="dfls-secription">
                                        <p class="mb-0">In a free hour, But in certain circumstances and owing to the
                                            claims of
                                            duty or the obligations of business when our power of choice is untrammelled
                                            and when
                                            nothing prevents our being able to do what we like best, every pleasure is
                                            to be
                                            welcomed and every pain avoided.</p>
                                    </div>
                                </div>
                            </div>


                            <!-- Single Reviwws -->
                            <div class="show-morerewsbox mb-3">
                                <div class="text-center" role="alert">
                                    <a href="#" class="fw-medium text-primary">Load More Guest Reviews<i
                                            class="fa-solid fa-caret-down ms-2"></i></a>
                                </div>
                            </div>

                            <!-- submit Reviews -->
                            <div class="sbms-rewsbox">
                                <div class="alert alert-success text-center" role="alert">
                                    Login your account to submit reviews <a href="#" class="text-dark">Login</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="row align-items-start justify-content-between gx-3">
            <div class="col-xl-3 col-lg-4 col-md-4">
                <div class="position-relative mb-4">
                    <h4 class="lh-base">FAQ Regarding The Royal Plaza Scout</h4>
                </div>
                <div class="position-relative mb-4">
                    <button class="btn btn-md btn-primary fw-medium" type="button">Submit Request</button>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                How To Book A resort with Booer.com?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or
                                corporate
                                clients corder a publication to be made and presented with the actual content still not
                                being
                                ready. Think of a news blog that's filled with content hourly on the day of going live.
                                However,
                                reviewers tend to be distracted by comprehensible content, say, a random text copied
                                from a
                                newspaper or the internet. The are likely to focus on the text, disregarding the layout
                                and its
                                elements.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                Can We Pay After Check-out?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or
                                corporate
                                clients corder a publication to be made and presented with the actual content still not
                                being
                                ready. Think of a news blog that's filled with content hourly on the day of going live.
                                However,
                                reviewers tend to be distracted by comprehensible content, say, a random text copied
                                from a
                                newspaper or the internet. The are likely to focus on the text, disregarding the layout
                                and its
                                elements.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                Is This Collaborate with Oyo?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or
                                corporate
                                clients corder a publication to be made and presented with the actual content still not
                                being
                                ready. Think of a news blog that's filled with content hourly on the day of going live.
                                However,
                                reviewers tend to be distracted by comprehensible content, say, a random text copied
                                from a
                                newspaper or the internet. The are likely to focus on the text, disregarding the layout
                                and its
                                elements.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                                    aria-controls="flush-collapseFour">
                                Can We get Any Transport For Walk?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or
                                corporate
                                clients corder a publication to be made and presented with the actual content still not
                                being
                                ready. Think of a news blog that's filled with content hourly on the day of going live.
                                However,
                                reviewers tend to be distracted by comprehensible content, say, a random text copied
                                from a
                                newspaper or the internet. The are likely to focus on the text, disregarding the layout
                                and its
                                elements.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFive" aria-expanded="false"
                                    aria-controls="flush-collapseFive">
                                Can We Get Any Extra Services?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">In a professional context it often happens that private or
                                corporate
                                clients corder a publication to be made and presented with the actual content still not
                                being
                                ready. Think of a news blog that's filled with content hourly on the day of going live.
                                However,
                                reviewers tend to be distracted by comprehensible content, say, a random text copied
                                from a
                                newspaper or the internet. The are likely to focus on the text, disregarding the layout
                                and its
                                elements.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
