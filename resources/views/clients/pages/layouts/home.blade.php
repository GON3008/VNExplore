@extends('clients.pages.layouts.master')

@section('content')
    <!-- ============================ Popular Hotels Start ================================== -->
    <section class="py-0">
        <div class="container">

            <div class="row align-items-center justify-content-between mb-3">
                <div class="col-8">
                    <div class="upside-heading">
                        <h5 class="fw-bold fs-6 m-0">Explore Hot Rental Properties</h5>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-end grpx-btn">
                        <a href="#" class="btn btn-light-primary btn-md fw-medium">More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 p-0">
                    <div class="main-carousel cols-3 dots-full">

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="pop-touritem">
                                <a href="#" class="card rounded-3 border br-dashed m-0">
                                    <div class="flight-thumb-wrapper">
                                        <div class="popFlights-item-overHidden">
                                            <img src="{{asset('geotrip/assets/img/property/img-1.jpg')}}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="touritem-middle position-relative p-3">
                                        <div class="touritem-flexxer">
                                            <div class="d-flex align-items-start justify-content-start flex-column">
                                                <span class="city-destination label text-success bg-light-success mb-1">House</span>
                                                <h4 class="city fs-title m-0 fw-bold">
                                                    <span>Apogee Property Advisors</span>
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
                                                <span class="label d-inline-flex bg-light-danger text-danger mb-1">15% Off</span>
                                                <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span
                                                        class="price">US$492</span></h5>
                                            </div>
                                            <div class="rates">
                                                <div class="star-rates">
                                                    <i class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i>
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

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="pop-touritem">
                                <a href="#" class="card rounded-3 border br-dashed m-0">
                                    <div class="flight-thumb-wrapper">
                                        <div class="popFlights-item-overHidden">
                                            <img src="assets/img/property/img-2.jpg" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="touritem-middle position-relative p-3">
                                        <div class="touritem-flexxer">
                                            <div class="d-flex align-items-start justify-content-start flex-column">
                                                <span class="city-destination label text-success bg-light-success mb-1">Villa</span>
                                                <h4 class="city fs-title m-0 fw-bold">
                                                    <span>Haven Group Real Estate</span>
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
                                                <span class="label d-inline-flex bg-light-danger text-danger mb-1">15% Off</span>
                                                <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span
                                                        class="price">US$492</span></h5>
                                            </div>
                                            <div class="rates">
                                                <div class="star-rates">
                                                    <i class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i>
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

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="pop-touritem">
                                <a href="#" class="card rounded-3 border br-dashed m-0">
                                    <div class="flight-thumb-wrapper">
                                        <div class="popFlights-item-overHidden">
                                            <img src="assets/img/property/img-3.jpg" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="touritem-middle position-relative p-3">
                                        <div class="touritem-flexxer">
                                            <div class="d-flex align-items-start justify-content-start flex-column">
                                                <span class="city-destination label text-success bg-light-success mb-1">Apartment</span>
                                                <h4 class="city fs-title m-0 fw-bold">
                                                    <span>Larkspur Partners Realty</span>
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
                                                <span class="label d-inline-flex bg-light-danger text-danger mb-1">15% Off</span>
                                                <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span
                                                        class="price">US$492</span></h5>
                                            </div>
                                            <div class="rates">
                                                <div class="star-rates">
                                                    <i class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i>
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

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="pop-touritem">
                                <a href="#" class="card rounded-3 border br-dashed m-0">
                                    <div class="flight-thumb-wrapper">
                                        <div class="popFlights-item-overHidden">
                                            <img src="assets/img/property/img-4.jpg" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="touritem-middle position-relative p-3">
                                        <div class="touritem-flexxer">
                                            <div class="d-flex align-items-start justify-content-start flex-column">
                                                <span class="city-destination label text-success bg-light-success mb-1">Condos</span>
                                                <h4 class="city fs-title m-0 fw-bold">
                                                    <span>Agile Real Estate Group</span>
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
                                                <span class="label d-inline-flex bg-light-danger text-danger mb-1">15% Off</span>
                                                <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span
                                                        class="price">US$492</span></h5>
                                            </div>
                                            <div class="rates">
                                                <div class="star-rates">
                                                    <i class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i>
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

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="pop-touritem">
                                <a href="#" class="card rounded-3 border br-dashed m-0">
                                    <div class="flight-thumb-wrapper">
                                        <div class="popFlights-item-overHidden">
                                            <img src="assets/img/property/img-5.jpg" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="touritem-middle position-relative p-3">
                                        <div class="touritem-flexxer">
                                            <div class="d-flex align-items-start justify-content-start flex-column">
                                                <span class="city-destination label text-success bg-light-success mb-1">Building</span>
                                                <h4 class="city fs-title m-0 fw-bold">
                                                    <span>Found Property Group</span>
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
                                                <span class="label d-inline-flex bg-light-danger text-danger mb-1">15% Off</span>
                                                <h5 class="fs-5 low-price m-0"><span class="tag-span">From</span> <span
                                                        class="price">US$492</span></h5>
                                            </div>
                                            <div class="rates">
                                                <div class="star-rates">
                                                    <i class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i><i class="fa-solid fa-star active"></i><i
                                                        class="fa-solid fa-star active"></i>
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

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Popular Hotels End ================================== -->


    <!-- ============================ Popular Location Start ================================== -->
    <section class="pt-5">
        <div class="container">

            <div class="row align-items-center justify-content-between mb-3">
                <div class="col-8">
                    <div class="upside-heading">
                        <h5 class="fw-bold fs-6 m-0">Explore Top Destinations</h5>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-end grpx-btn">
                        <a href="#" class="btn btn-light-primary btn-md fw-medium">More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 p-0">
                    <div class="main-carousel cols-4 dots-full">

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="cardCities cursor rounded-2">
                                <div class="cardCities-image ratio ratio-4">
                                    <img src="{{asset('geotrip/assets/img/city/c-8.png')}}" class="img-fluid object-fit" alt="image">
                                </div>

                                <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                    <div class="cardCities-bg"></div>

                                    <div class="citiesCard-topcaps">
                                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                        </div>
                                    </div>

                                    <div class="citiesCard-bottomcaps">
                                        <h4 class="text-light fs-3 mb-3">San Jose</h4>
                                        <button class="btn btn-whitener full-width fw-medium">Discover<i
                                                class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="cardCities cursor rounded-2">
                                <div class="cardCities-image ratio ratio-4">
                                    <img src="assets/img/city/c-7.png" class="img-fluid object-fit" alt="image">
                                </div>

                                <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                    <div class="cardCities-bg"></div>

                                    <div class="citiesCard-topcaps">
                                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                        </div>
                                    </div>

                                    <div class="citiesCard-bottomcaps">
                                        <h4 class="text-light fs-3 mb-3">Houston</h4>
                                        <button class="btn btn-whitener full-width fw-medium">Discover<i
                                                class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="cardCities cursor rounded-2">
                                <div class="cardCities-image ratio ratio-4">
                                    <img src="assets/img/city/c-6.png" class="img-fluid object-fit" alt="image">
                                </div>

                                <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                    <div class="cardCities-bg"></div>

                                    <div class="citiesCard-topcaps">
                                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                        </div>
                                    </div>

                                    <div class="citiesCard-bottomcaps">
                                        <h4 class="text-light fs-3 mb-3">San Francisco</h4>
                                        <button class="btn btn-whitener full-width fw-medium">Discover<i
                                                class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="cardCities cursor rounded-2">
                                <div class="cardCities-image ratio ratio-4">
                                    <img src="assets/img/city/c-4.png" class="img-fluid object-fit" alt="image">
                                </div>

                                <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                    <div class="cardCities-bg"></div>

                                    <div class="citiesCard-topcaps">
                                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                        </div>
                                    </div>

                                    <div class="citiesCard-bottomcaps">
                                        <h4 class="text-light fs-3 mb-3">San Diego</h4>
                                        <button class="btn btn-whitener full-width fw-medium">Discover<i
                                                class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="cardCities cursor rounded-2">
                                <div class="cardCities-image ratio ratio-4">
                                    <img src="assets/img/city/ct-12.png" class="img-fluid object-fit" alt="image">
                                </div>

                                <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                    <div class="cardCities-bg"></div>

                                    <div class="citiesCard-topcaps">
                                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                        </div>
                                    </div>

                                    <div class="citiesCard-bottomcaps">
                                        <h4 class="text-light fs-3 mb-3">Los Angeles</h4>
                                        <button class="btn btn-whitener full-width fw-medium">Discover<i
                                                class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="carousel-cell">
                            <div class="cardCities cursor rounded-2">
                                <div class="cardCities-image ratio ratio-4">
                                    <img src="assets/img/city/ct-9.png" class="img-fluid object-fit" alt="image">
                                </div>

                                <div class="citiesCard-content d-flex flex-column justify-content-between text-center px-4 py-4">
                                    <div class="cardCities-bg"></div>

                                    <div class="citiesCard-topcaps">
                                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">10 Hotels</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">25 Flights</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">17 Cars</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">22 Tours</div>
                                            <div class="bg-transparents text-light text-xs rounded fw-medium p-2 m-1">36 Activities</div>
                                        </div>
                                    </div>

                                    <div class="citiesCard-bottomcaps">
                                        <h4 class="text-light fs-3 mb-3">New Orleans</h4>
                                        <button class="btn btn-whitener full-width fw-medium">Discover<i
                                                class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Popular Location End ================================== -->


    <!-- ============================ Locations Design Start ================================== -->
    <section class="gray-simple">
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Popular Location To Stay</h2>
                        <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center g-xl-4 g-lg-4 g-3">

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="card destination-card border-0 rounded-3 overflow-hidden m-0">
                        <div class="destination-card-wraps position-relative">
                            <div class="destination-card-thumbs">
                                <div class="destinations-pics"><a href="#"><img src="assets/img/city/ct-7.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="destination-card-description position-absolute start-0 bottom-0 ps-4 pb-4 z-2">
                                <div class="exploterr-text">
                                    <h3 class="text-light fw-bold mb-1">New York</h3>
                                    <p class="detail ellipsis-container text-light">
                                        <span class="ellipsis-item__normal">10 hotels</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">5 Rental</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="card destination-card border-0 rounded-3 overflow-hidden m-0">
                        <div class="destination-card-wraps position-relative">
                            <div class="destination-card-thumbs">
                                <div class="destinations-pics"><a href="#"><img src="assets/img/city/ct-2.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="destination-card-description position-absolute start-0 bottom-0 ps-4 pb-4 z-2">
                                <div class="exploterr-text">
                                    <h3 class="text-light fw-bold mb-1">Los Angeles</h3>
                                    <p class="detail ellipsis-container text-light">
                                        <span class="ellipsis-item__normal">12 hotels</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">4 Rental</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="card destination-card border-0 rounded-3 overflow-hidden m-0">
                        <div class="destination-card-wraps position-relative">
                            <div class="destination-card-thumbs">
                                <div class="destinations-pics"><a href="#"><img src="assets/img/city/ct-3.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="destination-card-description position-absolute start-0 bottom-0 ps-4 pb-4 z-2">
                                <div class="exploterr-text">
                                    <h3 class="text-light fw-bold mb-1">San Diego</h3>
                                    <p class="detail ellipsis-container text-light">
                                        <span class="ellipsis-item__normal">08 hotels</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">6 Rental</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="card destination-card border-0 rounded-3 overflow-hidden m-0">
                        <div class="destination-card-wraps position-relative">
                            <div class="destination-card-thumbs">
                                <div class="destinations-pics"><a href="#"><img src="assets/img/city/ct-4.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="destination-card-description position-absolute start-0 bottom-0 ps-4 pb-4 z-2">
                                <div class="exploterr-text">
                                    <h3 class="text-light fw-bold mb-1">San Francisco</h3>
                                    <p class="detail ellipsis-container text-light">
                                        <span class="ellipsis-item__normal">32 hotels</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">12 Rental</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="card destination-card border-0 rounded-3 overflow-hidden m-0">
                        <div class="destination-card-wraps position-relative">
                            <div class="destination-card-thumbs">
                                <div class="destinations-pics"><a href="#"><img src="assets/img/city/ct-5.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="destination-card-description position-absolute start-0 bottom-0 ps-4 pb-4 z-2">
                                <div class="exploterr-text">
                                    <h3 class="text-light fw-bold mb-1">Houston</h3>
                                    <p class="detail ellipsis-container text-light">
                                        <span class="ellipsis-item__normal">22 hotels</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">16 Rental</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="card destination-card border-0 rounded-3 overflow-hidden m-0">
                        <div class="destination-card-wraps position-relative">
                            <div class="destination-card-thumbs">
                                <div class="destinations-pics"><a href="#"><img src="assets/img/city/ct-6.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="destination-card-description position-absolute start-0 bottom-0 ps-4 pb-4 z-2">
                                <div class="exploterr-text">
                                    <h3 class="text-light fw-bold mb-1">San Jose</h3>
                                    <p class="detail ellipsis-container text-light">
                                        <span class="ellipsis-item__normal">25 hotels</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">15 Rental</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="card destination-card border-0 rounded-3 overflow-hidden m-0">
                        <div class="destination-card-wraps position-relative">
                            <div class="destination-card-thumbs">
                                <div class="destinations-pics"><a href="#"><img src="assets/img/city/ct-1.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="destination-card-description position-absolute start-0 bottom-0 ps-4 pb-4 z-2">
                                <div class="exploterr-text">
                                    <h3 class="text-light fw-bold mb-1">Denver</h3>
                                    <p class="detail ellipsis-container text-light">
                                        <span class="ellipsis-item__normal">29 hotels</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">14 Rental</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="card destination-card border-0 rounded-3 overflow-hidden m-0">
                        <div class="destination-card-wraps position-relative">
                            <div class="destination-card-thumbs">
                                <div class="destinations-pics"><a href="#"><img src="assets/img/city/ct-10.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <div class="destination-card-description position-absolute start-0 bottom-0 ps-4 pb-4 z-2">
                                <div class="exploterr-text">
                                    <h3 class="text-light fw-bold mb-1">California</h3>
                                    <p class="detail ellipsis-container text-light">
                                        <span class="ellipsis-item__normal">22 hotels</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">12 Rental</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Locations Design Start ================================== -->

    <!-- ============================ All car List Start ================================== -->
    <section>
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Our Awesome Vehicles</h2>
                        <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gy-4 gx-xl-3 gx-lg-4 gx-4">

                <!-- Single -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pop-touritem">
                        <a href="#" class="card rounded-3 shadow-wrap m-0">
                            <div class="flight-thumb-wrapper">
                                <div class=" position-absolute top-0 left-0 ms-3 mt-3 z-1">
                                    <div class="label bg-primary text-light d-inline-flex align-items-center justify-content-center">
											<span class="svg-icon text-light svg-icon-2hx me-1">
												<svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3"
                                                          d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                          fill="currentColor"></path>
													<path
                                                        d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                                        fill="currentColor"></path>
												</svg>
											</span>600Kms included. After that $15/Kms
                                    </div>
                                </div>
                                <div class="popFlights-item-overHidden">
                                    <img src="assets/img/car.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="touritem-middle position-relative p-3">
                                <div class="touritem-flexxer">
                                    <h4 class="city fs-4 m-0 fw-bold">
                                        <span>Carmy Accord</span>
                                    </h4>
                                    <p class="detail ellipsis-container">
                                        <span class="ellipsis-item__normal">SEDAN</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">AC</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">5 Seats</span>
                                    </p>

                                    <div class="touritem-centrio mt-4">
                                        <div class="d-block position-relative"><span class="label bg-light-success text-success">Free
													Cancellation Till 10 Aug 23</span></div>
                                        <div class="aments-lists mt-2">
                                            <div class="detail ellipsis-container mt-1">
                                                <span class="ellipsis">Manual</span>
                                                <span class="ellipsis">1 Large bag</span>
                                                <span class="ellipsis">1 Small bag</span>
                                                <span class="ellipsis">Diesel</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="trsms-foots mt-4">
                                    <div class="flts-flex d-flex align-items-end justify-content-between">
                                        <div class="flts-flex-strat">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span class="label bg-light-danger text-danger">15% Off</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="text-dark fw-bold fs-4">US$59</div>
                                                <div class="text-muted-2 fw-medium text-decoration-line-through ms-2">US$79</div>
                                            </div>
                                        </div>

                                        <div class="flts-flex-end">
                                            <div class="row align-items-center justify-content-end gx-2">
                                                <div class="col-auto text-start text-md-end">
                                                    <div class="text-md text-dark fw-medium">Exceptional</div>
                                                    <div class="text-md text-muted-2">3,014 reviews</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="square--40 rounded-2 bg-primary text-light">4.8</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pop-touritem">
                        <a href="#" class="card rounded-3 shadow-wrap m-0">
                            <div class="flight-thumb-wrapper">
                                <div class=" position-absolute top-0 left-0 ms-3 mt-3 z-1">
                                    <div class="label bg-primary text-light d-inline-flex align-items-center justify-content-center">
											<span class="svg-icon text-light svg-icon-2hx me-1">
												<svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3"
                                                          d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                          fill="currentColor"></path>
													<path
                                                        d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                                        fill="currentColor"></path>
												</svg>
											</span>600Kms included. After that $15/Kms
                                    </div>
                                </div>
                                <div class="popFlights-item-overHidden">
                                    <img src="assets/img/car.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="touritem-middle position-relative p-3">
                                <div class="touritem-flexxer">
                                    <h4 class="city fs-4 m-0 fw-bold">
                                        <span>Audi, BMW</span>
                                    </h4>
                                    <p class="detail ellipsis-container">
                                        <span class="ellipsis-item__normal">Hatchback</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">AC</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">5 Seats</span>
                                    </p>

                                    <div class="touritem-centrio mt-4">
                                        <div class="d-block position-relative"><span class="label bg-light-success text-success">Free
													Cancellation Till 10 Aug 23</span></div>
                                        <div class="aments-lists mt-2">
                                            <div class="detail ellipsis-container mt-1">
                                                <span class="ellipsis">Manual</span>
                                                <span class="ellipsis">1 Large bag</span>
                                                <span class="ellipsis">1 Small bag</span>
                                                <span class="ellipsis">Diesel</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="trsms-foots mt-4">
                                    <div class="flts-flex d-flex align-items-end justify-content-between">
                                        <div class="flts-flex-strat">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span class="label bg-light-danger text-danger">15% Off</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="text-dark fw-bold fs-4">US$59</div>
                                                <div class="text-muted-2 fw-medium text-decoration-line-through ms-2">US$79</div>
                                            </div>
                                        </div>

                                        <div class="flts-flex-end">
                                            <div class="row align-items-center justify-content-end gx-2">
                                                <div class="col-auto text-start text-md-end">
                                                    <div class="text-md text-dark fw-medium">Exceptional</div>
                                                    <div class="text-md text-muted-2">3,014 reviews</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="square--40 rounded-2 bg-primary text-light">4.8</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pop-touritem">
                        <a href="#" class="card rounded-3 shadow-wrap m-0">
                            <div class="flight-thumb-wrapper">
                                <div class=" position-absolute top-0 left-0 ms-3 mt-3 z-1">
                                    <div class="label bg-primary text-light d-inline-flex align-items-center justify-content-center">
											<span class="svg-icon text-light svg-icon-2hx me-1">
												<svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3"
                                                          d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                          fill="currentColor"></path>
													<path
                                                        d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                                        fill="currentColor"></path>
												</svg>
											</span>600Kms included. After that $15/Kms
                                    </div>
                                </div>
                                <div class="popFlights-item-overHidden">
                                    <img src="assets/img/car.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="touritem-middle position-relative p-3">
                                <div class="touritem-flexxer">
                                    <h4 class="city fs-4 m-0 fw-bold">
                                        <span>Ertiga, Xylo</span>
                                    </h4>
                                    <p class="detail ellipsis-container">
                                        <span class="ellipsis-item__normal">LUX</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">AC</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">5 Seats</span>
                                    </p>

                                    <div class="touritem-centrio mt-4">
                                        <div class="d-block position-relative"><span class="label bg-light-success text-success">Free
													Cancellation Till 10 Aug 23</span></div>
                                        <div class="aments-lists mt-2">
                                            <div class="detail ellipsis-container mt-1">
                                                <span class="ellipsis">Manual</span>
                                                <span class="ellipsis">1 Large bag</span>
                                                <span class="ellipsis">1 Small bag</span>
                                                <span class="ellipsis">Diesel</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="trsms-foots mt-4">
                                    <div class="flts-flex d-flex align-items-end justify-content-between">
                                        <div class="flts-flex-strat">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span class="label bg-light-danger text-danger">15% Off</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="text-dark fw-bold fs-4">US$59</div>
                                                <div class="text-muted-2 fw-medium text-decoration-line-through ms-2">US$79</div>
                                            </div>
                                        </div>

                                        <div class="flts-flex-end">
                                            <div class="row align-items-center justify-content-end gx-2">
                                                <div class="col-auto text-start text-md-end">
                                                    <div class="text-md text-dark fw-medium">Exceptional</div>
                                                    <div class="text-md text-muted-2">3,014 reviews</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="square--40 rounded-2 bg-primary text-light">4.8</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pop-touritem">
                        <a href="#" class="card rounded-3 shadow-wrap m-0">
                            <div class="flight-thumb-wrapper">
                                <div class=" position-absolute top-0 left-0 ms-3 mt-3 z-1">
                                    <div class="label bg-primary text-light d-inline-flex align-items-center justify-content-center">
											<span class="svg-icon text-light svg-icon-2hx me-1">
												<svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3"
                                                          d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                          fill="currentColor"></path>
													<path
                                                        d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                                        fill="currentColor"></path>
												</svg>
											</span>600Kms included. After that $15/Kms
                                    </div>
                                </div>
                                <div class="popFlights-item-overHidden">
                                    <img src="assets/img/car.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="touritem-middle position-relative p-3">
                                <div class="touritem-flexxer">
                                    <h4 class="city fs-4 m-0 fw-bold">
                                        <span>Suv, Innova Crysta</span>
                                    </h4>
                                    <p class="detail ellipsis-container">
                                        <span class="ellipsis-item__normal">SUV</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">AC</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">5 Seats</span>
                                    </p>

                                    <div class="touritem-centrio mt-4">
                                        <div class="d-block position-relative"><span class="label bg-light-success text-success">Free
													Cancellation Till 10 Aug 23</span></div>
                                        <div class="aments-lists mt-2">
                                            <div class="detail ellipsis-container mt-1">
                                                <span class="ellipsis">Manual</span>
                                                <span class="ellipsis">1 Large bag</span>
                                                <span class="ellipsis">1 Small bag</span>
                                                <span class="ellipsis">Diesel</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="trsms-foots mt-4">
                                    <div class="flts-flex d-flex align-items-end justify-content-between">
                                        <div class="flts-flex-strat">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span class="label bg-light-danger text-danger">15% Off</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="text-dark fw-bold fs-4">US$59</div>
                                                <div class="text-muted-2 fw-medium text-decoration-line-through ms-2">US$79</div>
                                            </div>
                                        </div>

                                        <div class="flts-flex-end">
                                            <div class="row align-items-center justify-content-end gx-2">
                                                <div class="col-auto text-start text-md-end">
                                                    <div class="text-md text-dark fw-medium">Exceptional</div>
                                                    <div class="text-md text-muted-2">3,014 reviews</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="square--40 rounded-2 bg-primary text-light">4.8</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pop-touritem">
                        <a href="#" class="card rounded-3 shadow-wrap m-0">
                            <div class="flight-thumb-wrapper">
                                <div class=" position-absolute top-0 left-0 ms-3 mt-3 z-1">
                                    <div class="label bg-primary text-light d-inline-flex align-items-center justify-content-center">
											<span class="svg-icon text-light svg-icon-2hx me-1">
												<svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3"
                                                          d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                          fill="currentColor"></path>
													<path
                                                        d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                                        fill="currentColor"></path>
												</svg>
											</span>600Kms included. After that $15/Kms
                                    </div>
                                </div>
                                <div class="popFlights-item-overHidden">
                                    <img src="assets/img/car.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="touritem-middle position-relative p-3">
                                <div class="touritem-flexxer">
                                    <h4 class="city fs-4 m-0 fw-bold">
                                        <span>Toyota Aygo</span>
                                    </h4>
                                    <p class="detail ellipsis-container">
                                        <span class="ellipsis-item__normal">SEDAN</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">AC</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">5 Seats</span>
                                    </p>

                                    <div class="touritem-centrio mt-4">
                                        <div class="d-block position-relative"><span class="label bg-light-success text-success">Free
													Cancellation Till 10 Aug 23</span></div>
                                        <div class="aments-lists mt-2">
                                            <div class="detail ellipsis-container mt-1">
                                                <span class="ellipsis">Manual</span>
                                                <span class="ellipsis">1 Large bag</span>
                                                <span class="ellipsis">1 Small bag</span>
                                                <span class="ellipsis">Diesel</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="trsms-foots mt-4">
                                    <div class="flts-flex d-flex align-items-end justify-content-between">
                                        <div class="flts-flex-strat">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span class="label bg-light-danger text-danger">15% Off</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="text-dark fw-bold fs-4">US$59</div>
                                                <div class="text-muted-2 fw-medium text-decoration-line-through ms-2">US$79</div>
                                            </div>
                                        </div>

                                        <div class="flts-flex-end">
                                            <div class="row align-items-center justify-content-end gx-2">
                                                <div class="col-auto text-start text-md-end">
                                                    <div class="text-md text-dark fw-medium">Exceptional</div>
                                                    <div class="text-md text-muted-2">3,014 reviews</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="square--40 rounded-2 bg-primary text-light">4.8</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pop-touritem">
                        <a href="#" class="card rounded-3 shadow-wrap m-0">
                            <div class="flight-thumb-wrapper">
                                <div class=" position-absolute top-0 left-0 ms-3 mt-3 z-1">
                                    <div class="label bg-primary text-light d-inline-flex align-items-center justify-content-center">
											<span class="svg-icon text-light svg-icon-2hx me-1">
												<svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.3"
                                                          d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                                          fill="currentColor"></path>
													<path
                                                        d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z"
                                                        fill="currentColor"></path>
												</svg>
											</span>600Kms included. After that $15/Kms
                                    </div>
                                </div>
                                <div class="popFlights-item-overHidden">
                                    <img src="assets/img/car.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="touritem-middle position-relative p-3">
                                <div class="touritem-flexxer">
                                    <h4 class="city fs-4 m-0 fw-bold">
                                        <span>Ford Focus</span>
                                    </h4>
                                    <p class="detail ellipsis-container">
                                        <span class="ellipsis-item__normal">LUX</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">AC</span>
                                        <span class="separate ellipsis-item__normal"></span>
                                        <span class="ellipsis-item">5 Seats</span>
                                    </p>

                                    <div class="touritem-centrio mt-4">
                                        <div class="d-block position-relative"><span class="label bg-light-success text-success">Free
													Cancellation Till 10 Aug 23</span></div>
                                        <div class="aments-lists mt-2">
                                            <div class="detail ellipsis-container mt-1">
                                                <span class="ellipsis">Manual</span>
                                                <span class="ellipsis">1 Large bag</span>
                                                <span class="ellipsis">1 Small bag</span>
                                                <span class="ellipsis">Diesel</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="trsms-foots mt-4">
                                    <div class="flts-flex d-flex align-items-end justify-content-between">
                                        <div class="flts-flex-strat">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <span class="label bg-light-danger text-danger">15% Off</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="text-dark fw-bold fs-4">US$59</div>
                                                <div class="text-muted-2 fw-medium text-decoration-line-through ms-2">US$79</div>
                                            </div>
                                        </div>

                                        <div class="flts-flex-end">
                                            <div class="row align-items-center justify-content-end gx-2">
                                                <div class="col-auto text-start text-md-end">
                                                    <div class="text-md text-dark fw-medium">Exceptional</div>
                                                    <div class="text-md text-muted-2">3,014 reviews</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="square--40 rounded-2 bg-primary text-light">4.8</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center position-relative mt-5">
                        <button type="button" class="btn btn-light-primary fw-medium px-5">Explore More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ All car List Start ================================== -->
@endsection
