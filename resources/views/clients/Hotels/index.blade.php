@extends('clients.layouts.hotels.hotel_layout')

@section('hotel_content')
    <style>
        .city {
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Luôn hiển thị 2 dòng */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5em; /* Đặt chiều cao dòng */
            height: 3em; /* Chiều cao tối đa: 2 dòng */
            max-height: 3em; /* Chống việc vượt qua 2 dòng */
            white-space: normal; /* Đảm bảo xuống dòng */
        }

        .location-container {
            justify-content: flex-start;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding: 10px;
        }

        .location-button {
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 14px;
            border: none;
            font-weight: bold;
            color: #007bff;
            background-color: rgba(247, 249, 250, 1.00);
            cursor: pointer;
            white-space: nowrap;
        }

        .location-button.active {
            background-color: #007bff;
            color: white;
        }
    </style>

    <div class="py-3">
        <h2 class="fs-3">Deal nội địa tiết kiệm cuối năm</h2>
        <div class="location-container">
            <div class="d-flex gap-2 flex-wrap">
                @foreach($hotelLocations as $location)
                    @if ($location->hotel_country == 'Việt Nam')
                        <button class="location-button {{ $loop->first ? 'active' : '' }}">
                            {{ $location->hotel_city }}
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <section class="py-0">
        <div class="row justify-content-center py-2">
            <div class="col-xl-12 col-lg-12 col-md-12 p-0">
                <div class="main-carousel cols-3 dots-full h-auto">
                    <!-- Single Item -->
                    @foreach($data as $item)
                        @if ($item->hotelCategory_status == 1
                           && $item->hotelCategory_deleted == 1
                           && $item->location->hotel_country == 'Việt Nam'
                           && in_array($item->category->name, ['Hotel','Hotels','hotel','hotels']))
                            <div class="carousel-cell">
                                <div class="pop-touritem">
                                    <a href="#" class="card rounded-3 border br-dashed m-0">
                                        <div class="flight-thumb-wrapper">
                                            @php
                                                $images = json_decode($item->hotelCategory_images);
                                                $firstImage = !empty($images) ? $images[0] : null;
                                            @endphp
                                            @if ($firstImage)
                                                <div class="popFlights-item-overHidden">
                                                    <img src="{{asset('HotelCategories/' .$firstImage)}}"
                                                         class="img-fluid" alt="">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="touritem-middle position-relative p-3">
                                            <div class="touritem-flexxer">
                                                <div
                                                    class="d-flex align-items-start justify-content-start flex-column">
                                                        <span
                                                            class="city-destination label text-success bg-light-success mb-1">House</span>
                                                    <h4 class="city fs-title m-0 fw-bold">
                                                        <span>{{$item->hotelCategory_name}}</span>
                                                    </h4>
                                                </div>
                                                <div class="detail ellipsis-container mt-3">
                                                    <span class="ellipsis">3 Beds</span>
                                                    <span class="ellipsis">2 Baths</span>
                                                    <span class="ellipsis">2100 sqft</span>
                                                    <span class="ellipsis">1 Store</span>
                                                </div>
                                            </div>
                                            <div class="flight-footer">
                                                <div class="epocsic">
                                                        <span
                                                            class="label d-inline-flex bg-light-danger text-danger mb-1">15% Off</span>
                                                    <h5 class="fs-5 low-price m-0"><span
                                                            class="tag-span">From</span> <span
                                                            class="price">{{$item->getLowestPrice()}}</span></h5>
                                                </div>
                                                <div class="rates">
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
                                                    <div class="rat-reviews">
                                                        <strong>4.6</strong><span>(142 Reviews)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="pt-5">
        <h2 class="fs-3">Deal nội địa tiết kiệm cuối năm</h2>
        <div class="location-container">
            <div class="d-flex gap-2 flex-wrap">
                @foreach($hotelLocations as $location)
                    @if ($location->hotel_country != 'Việt Nam')
                        <button class="location-button {{ $loop->first ? 'active' : '' }}">
                            {{ $location->hotel_city }}
                        </button>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <section class="py-0">
        <div class="row justify-content-center py-2">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
                <div class="main-carousel cols-3 dots-full h-auto">
                    <!-- Single Item -->
                    @foreach($data as $item)
                        @if ($item->hotelCategory_status == 1
                           && $item->hotelCategory_deleted == 1
                           && $item->location->hotel_country != 'Việt Nam'
                           && in_array($item->category->name, ['Hotel','Hotels','hotel','hotels']))
                            <div class="carousel-cell">
                                <div class="pop-touritem">
                                    <a href="#" class="card rounded-3 border br-dashed m-0">
                                        <div class="flight-thumb-wrapper">
                                            @php
                                                $images = json_decode($item->hotelCategory_images);
                                                $firstImage = !empty($images) ? $images[0] : null;
                                            @endphp
                                            @if ($firstImage)
                                                <div class="popFlights-item-overHidden">
                                                    <img src="{{asset('HotelCategories/' .$firstImage)}}"
                                                         class="img-fluid" alt="">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="touritem-middle position-relative p-3">
                                            <div class="touritem-flexxer">
                                                <div
                                                    class="d-flex align-items-start justify-content-start flex-column">
                                                        <span
                                                            class="city-destination label text-success bg-light-success mb-1">House</span>
                                                    <h4 class="city fs-title m-0 fw-bold">
                                                        <span>{{$item->hotelCategory_name}}</span>
                                                    </h4>
                                                </div>
                                                <div class="detail ellipsis-container mt-3">
                                                    <span class="ellipsis">3 Beds</span>
                                                    <span class="ellipsis">2 Baths</span>
                                                    <span class="ellipsis">2100 sqft</span>
                                                    <span class="ellipsis">1 Store</span>
                                                </div>
                                            </div>
                                            <div class="flight-footer">
                                                <div class="epocsic">
                                                        <span
                                                            class="label d-inline-flex bg-light-danger text-danger mb-1">15% Off</span>
                                                    <h5 class="fs-5 low-price m-0"><span
                                                            class="tag-span">From</span> <span
                                                            class="price">{{$item->getLowestPrice()}}</span></h5>
                                                </div>
                                                <div class="rates">
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
                                                    <div class="rat-reviews">
                                                        <strong>4.6</strong><span>(142 Reviews)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="pt-5">
        <h2 class="fs-3">Giá tốt tại các điểm đến nội địa</h2>
        <div class="py-1">
            <div class="row justify-content-center p-2">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
                    <div class="main-carousel cols-4 dots-full h-auto">
                        @foreach($hotelLocations as $location)
                            @php
                                $images = json_decode($location->hotelLocation_img);
                                $firstImage = !empty($images) ? $images[0] : null;
                            @endphp
                            @if ($firstImage && isset($location->hotel_country) && trim($location->hotel_country) === 'Việt Nam')
                                <div class="carousel-cell">
                                    <img src="{{ asset('uploads/HotelLocation_img/' . $firstImage) }}"
                                         class="img-fluid" alt="Hotel Image">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
