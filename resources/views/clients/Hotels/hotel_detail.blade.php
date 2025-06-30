@extends('clients.layouts.hotels.hotel_layout')

@section('room_show')
    <!-- Form tìm kiếm room_option -->
    <form method="GET" action="{{ route('hotels.show', $hotelCategory->id) }}">
        <label for="checkin_date">Check-in:</label>
        <input type="date" name="checkin_date" value="{{ $checkinDate ?? '' }}" required>

        <label for="checkout_date">Check-out:</label>
        <input type="date" name="checkout_date" value="{{ $checkoutDate ?? '' }}" required>

        <button type="submit">Search</button>
    </form>



    <!-- Breadcrumb -->
    <div class="col-xl-12 col-lg-12 col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="fw-medium"
                                               style="color: rgba(104, 113, 118, 1.00); font-size: 12px">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="fw-medium"
                                               style="color: rgba(104, 113, 118, 1.00); font-size: 12px">Hotel in
                        Denver, USA</a></li>
                <li class="breadcrumb-item active fw-bold" aria-current="page"
                    style="color: rgba(104, 113, 118, 1.00);">{{$hotelCategory->hotelCategory_name}}</li>
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
                            <button type="button" class="btn fw-semibold text-white"
                                    style="background-color: rgba(1, 148, 243, 1.00)">Select Rooms
                            </button>
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
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="bg-body-secondary">Room Option</th>
                                    <th class="text-center bg-body-secondary">Guest</th>
                                    <th class="bg-body-secondary">Price/room/night</th>
                                    <th class="bg-body-secondary"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($room->roomOptions as $option)
                                    <tr>
                                        <td>
                                            <div class="fw-normal"
                                                 style="font-size: 13px;color: rgba(104, 113, 118, 1.00);">
                                                {{ $room->room_name }}
                                            </div>
                                            <div class="fw-bold"
                                                 style="color: rgba(3, 18, 26, 1.00); font-size: 14px">{{ $option->ro_breakfast_included }}</div>

                                            <div style="font-size: 13px;color: rgba(104, 113, 118, 1.00);"
                                                 class="fw-medium">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg" data-id="IcHotelRoomBedType">
                                                    <path
                                                        d="M2 20H3M5 12C3 13 3 14 3 15V16M5 12H19M5 12V7M19 12C21 13 21 14 21 15V16M19 12V7M22 20H21M3 16H21M3 16V20M21 16V20M3 20H21M5 7L5.31623 6.05132C5.72457 4.82629 6.87099 4 8.16228 4H15.8377C17.129 4 18.2754 4.82629 18.6838 6.05132L19 7M5 7V3M19 7V3"
                                                        stroke="#687176" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M6 9.5V11C6 11.5523 6.44772 12 7 12H11V9.5C11 8.67157 10.3284 8 9.5 8H7.5C6.67157 8 6 8.67157 6 9.5Z"
                                                        stroke="#687176" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M13 9.5V12H17C17.5523 12 18 11.5523 18 11V9.5C18 8.67157 17.3284 8 16.5 8H14.5C13.6716 8 13 8.67157 13 9.5Z"
                                                        stroke="#687176" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg> {{ $option->ro_bed_type }}
                                            </div>

                                            <div class="fw-medium" style="font-size: 14px">
                                                @if($option->ro_cancellation_type == 'Free Cancellation until')
                                                    <span style="color: green;">
                                                               @foreach($option->cancellationPolicies as $policy)
                                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 data-id="IcSystemCheckmark"><path
                                                                    d="M6.5 12L10.5 16L18 8.5" stroke="#00875A"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path></svg>
                                                            {{ $option->ro_cancellation_type }} {{ $policy->free_cancellation_until }}
                                                            <svg class="tooltip-trigger" width="12" height="12"
                                                                 viewBox="0 0 24 24"
                                                                 fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 data-id="IcSystemStatusInfo"><path fill-rule="evenodd"
                                                                                                    clip-rule="evenodd"
                                                                                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                                                    stroke="#00875A"
                                                                                                    stroke-width="2"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"></path><path
                                                                    d="M12 11.5V16M11.75 7.75H12.25V8.25H11.75V7.75Z"
                                                                    stroke="#00875A" stroke-width="2"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>

                                                        </svg>
                                                        @endforeach
                                                    </span>
                                                    <!-- <span class="text-success">{{ $option->ro_cancellation_type }}</span> -->
                                                @elseif($option->ro_cancellation_type == 'Non Refundable' || $option->ro_cancellation_type == 'Cancellation Policy Applies')
                                                    <span
                                                        style="color: gray;">
                                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg"
                                                             data-id="IcSystemCheckmark"><path
                                                                d="M6.5 12L10.5 16L18 8.5" stroke="#687176"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path></svg>
                                                        {{ $option->ro_cancellation_type }}
                                                        <svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                             title="" width="12" height="12" viewBox="0 0 24 24"
                                                             fill="none"
                                                             xmlns="http://www.w3.org/2000/svg"
                                                             data-id="IcSystemStatusInfo"><path fill-rule="evenodd"
                                                                                                clip-rule="evenodd"
                                                                                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                                                stroke="#687176"
                                                                                                stroke-width="2"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round"></path><path
                                                                d="M12 11.5V16M11.75 7.75H12.25V8.25H11.75V7.75Z"
                                                                stroke="#687176" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path></svg>
                                                    </span>
                                                    <!-- <span class="text-muted">{{ $option->ro_cancellation_type }}</span> -->
                                                @else
                                                    <span>{{ $option->ro_cancellation_type }}</span>
                                                @endif
                                            </div>

                                        </td>
                                        <td class="text-center">
                                            @if ($option->ro_max_guests <= 3)
                                                @for ($i = 0; $i < $option->ro_max_guests; $i++)
                                                    <i class="fa-solid fa-user" style="color: gray;"></i>
                                                @endfor
                                            @else
                                                <i class="fa-solid fa-user" style="color: gray;"></i> ×
                                                <span class="fw-medium">{{ $option->ro_max_guests }}</span>
                                            @endif
                                        </td>
                                        <td align="right">
                                            <div class="fw-normal"
                                                 style="font-size: 14px; color: rgba(104, 113, 118, 1.00);text-decoration: line-through;">
                                                {{ $option->ro_price }}
                                            </div>
                                            <div class="fw-bold fs-6" style="color: rgb(255, 94, 31)">
                                                {{ $option->ro_discount }}
                                            </div>
                                            <div class="fw-medium"
                                                 style="font-size: 13px;color: rgba(104, 113, 118, 1.00);">
                                                Include taxes & fees
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('booking.page1') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="ro_id" value="{{ $option->id }}">
                                                <button type="submit" class="btn fw-medium"
                                                        style="background-color: #3FA2F6; color: #f0f0f0">
                                                    Choose
                                                </button>
                                            </form>
                                            @foreach($option->availability as $ra)
                                                @if ($ra->available_rooms <= 5)
                                                    <div class="text-danger mt-1 fw-bold">
                                                        {{ $ra->available_rooms }} room(s) left!
                                                    </div>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".tooltip-trigger").forEach(el => {
                tippy(el, {
                    content: `<div class='tooltip-content'>
                        <div class='tooltip-header'>
                            <span class='text-primary fw-bold'>🔵 ${el.dataset.cancelBefore}</span>
                        </div>
                        <div class='tooltip-body text-danger'>
                            🔴 ${el.dataset.cancelFee}
                        </div>
                        <p class='tooltip-text'>
                            ${el.dataset.description}
                        </p>
                        <p class='tooltip-footer'>
                            Times displayed are based on the hotel’s local time.
                        </p>
                    </div>`,
                    allowHTML: true,
                    theme: 'dark',
                    placement: 'bottom',
                });
            });
        });
    </script>
@endsection




