<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport, google-signin-client-id" content="width=device-width,
    initial-scale=1,94244170434-1go6b0ucup667ae1smvcii3uv3vi5mla.apps.googleusercontent.com">
    <title>GeoTrip - Tour & Travel Booking Agency HTML Template | ThemezHub</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- All Plugins -->
    <link href="{{asset('geotrip/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/animation.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/dropzone.min.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/flatpickr.min.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/flickity.min.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/magnifypopup.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/rangeSlider.min.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/prism.css')}}" rel="stylesheet">

    <!-- Fontawesome & Bootstrap Icons CSS -->
    <link href="{{asset('geotrip/assets/css/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('geotrip/assets/css/fontawesome.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('geotrip/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div id="preloader">
    <div class="preloader"><span></span><span></span></div>
</div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    @include('clients.pages.layouts.header')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->


    <!-- ============================ Hero Banner  Start================================== -->
    @include('clients.pages.layouts.banner')
    <!-- ============================ Hero Banner End ================================== -->


    <!-- ============================ Offers Start ================================== -->
    @include('clients.pages.layouts.voucher')
    <!-- ============================ Offers End ================================== -->


    <!-- ============================ Section Content ================================== -->
    @yield('content')
    <!-- ============================ Section Content End ================================== -->


    <!-- ============================ Video Helps End ================================== -->
    <section class="bg-cover" style="background:url({{asset('geotrip/assets/img/banner-5.jpg')}})no-repeat;" data-overlay="5">
        <div class="ht-150"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="video-play-wrap text-center">
                        <div class="video-play-btn d-flex align-items-center justify-content-center">
                            <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-bs-toggle="modal"
                               data-bs-target="#popup-video" class="square--90 circle bg-white fs-2 text-primary"><i
                                    class="fa-solid fa-play"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="ht-150"></div>
    </section>
    <!-- ============================ Video Helps End ================================== -->


    <!-- ============================ Our Reviews Start ================================== -->
    <section class="gray-simple bg-cover" style="background:url(assets/img/reviewbg.png)no-repeat;">
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Loving Reviews By Our Customers</h2>
                        <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center g-xl-4 g-lg-4 g-md-4 g-3">

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="card border rounded-3">
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 mt-3 me-3"><span
                                    class="square--40 circle text-primary bg-light-primary"><i
                                        class="fa-solid fa-quote-right"></i></span></div>
                            <div class="d-flex align-items-center flex-thumbes">
                                <div class="revws-pic"><img src="assets/img/team-1.jpg" class="img-fluid rounded-2"
                                                            width="80" alt="">
                                </div>
                                <div class="revws-caps ps-3">
                                    <h6 class="fw-bold fs-6 m-0">Aman Diwakar</h6>
                                    <p class="text-muted-2 text-md m-0">United States</p>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="revws-desc mt-3">
                                <p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut
                                    odit aut fugit,
                                    sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="card border rounded-3">
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 mt-3 me-3"><span
                                    class="square--40 circle text-primary bg-light-primary"><i
                                        class="fa-solid fa-quote-right"></i></span></div>
                            <div class="d-flex align-items-center flex-thumbes">
                                <div class="revws-pic"><img src="assets/img/team-2.jpg" class="img-fluid rounded-2"
                                                            width="80" alt="">
                                </div>
                                <div class="revws-caps ps-3">
                                    <h6 class="fw-bold fs-6 m-0">Kunal M. Thakur</h6>
                                    <p class="text-muted-2 text-md m-0">United States</p>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="revws-desc mt-3">
                                <p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut
                                    odit aut fugit,
                                    sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="card border rounded-3">
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 mt-3 me-3"><span
                                    class="square--40 circle text-primary bg-light-primary"><i
                                        class="fa-solid fa-quote-right"></i></span></div>
                            <div class="d-flex align-items-center flex-thumbes">
                                <div class="revws-pic"><img src="assets/img/team-3.jpg" class="img-fluid rounded-2"
                                                            width="80" alt="">
                                </div>
                                <div class="revws-caps ps-3">
                                    <h6 class="fw-bold fs-6 m-0">Divya Talwar</h6>
                                    <p class="text-muted-2 text-md m-0">United States</p>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="revws-desc mt-3">
                                <p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut
                                    odit aut fugit,
                                    sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="card border rounded-3">
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 mt-3 me-3"><span
                                    class="square--40 circle text-primary bg-light-primary"><i
                                        class="fa-solid fa-quote-right"></i></span></div>
                            <div class="d-flex align-items-center flex-thumbes">
                                <div class="revws-pic"><img src="assets/img/team-4.jpg" class="img-fluid rounded-2"
                                                            width="80" alt="">
                                </div>
                                <div class="revws-caps ps-3">
                                    <h6 class="fw-bold fs-6 m-0">Karan Maheshwari</h6>
                                    <p class="text-muted-2 text-md m-0">United States</p>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="revws-desc mt-3">
                                <p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut
                                    odit aut fugit,
                                    sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="card border rounded-3">
                        <div class="card-body">
                            <div class="position-absolute top-0 end-0 mt-3 me-3"><span
                                    class="square--40 circle text-primary bg-light-primary"><i
                                        class="fa-solid fa-quote-right"></i></span></div>
                            <div class="d-flex align-items-center flex-thumbes">
                                <div class="revws-pic"><img src="assets/img/team-5.jpg" class="img-fluid rounded-2"
                                                            width="80" alt="">
                                </div>
                                <div class="revws-caps ps-3">
                                    <h6 class="fw-bold fs-6 m-0">Ritika Mathur</h6>
                                    <p class="text-muted-2 text-md m-0">United States</p>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                        <span class="me-1 text-xs text-warning"><i class="fa-solid fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="revws-desc mt-3">
                                <p class="m-0 text-md">Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut
                                    odit aut fugit,
                                    sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Our Reviews End ================================== -->


    <!-- ============================ Flexible features End ================================== -->
    <section>
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Why Move To GeoTrip.com</h2>
                        <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-between">

                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="position-relative">
                        <img src="{{asset('geotrip/assets/img/img-1.png')}}" class="img-fluid rounded-3 position-relative z-1" alt="">
                    </div>

                </div>

                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="featuresList-box">

                        <div class="featuresList-single mb-4">
                            <div class="featuresList-counter d-inline-block mb-3"><span
                                    class="bg-success text-light rounded-pill fw-medium py-1 px-3">01</span></div>
                            <div class="featuresList-caption">
                                <h5 class="fw-bold fs-6 mb-2">Get The Superb Discount</h5>
                                <p class="fw-light fs-6">Rigid proponents of content strategy may shun the use of dummy
                                    copy but then
                                    designers might want to ask them to provide style sheets.</p>
                            </div>
                        </div>

                        <div class="featuresList-single mb-4">
                            <div class="featuresList-counter d-inline-block mb-3"><span
                                    class="bg-warning text-light rounded-pill fw-medium py-1 px-3">02</span></div>
                            <div class="featuresList-caption">
                                <h5 class="fw-bold fs-6 mb-2">100% Price Transparency</h5>
                                <p class="fw-light fs-6">Rigid proponents of content strategy may shun the use of dummy
                                    copy but then
                                    designers might want to ask them to provide style sheets.</p>
                            </div>
                        </div>

                        <div class="featuresList-single mb-4">
                            <div class="featuresList-counter d-inline-block mb-3"><span
                                    class="bg-purple text-light rounded-pill fw-medium py-1 px-3">03</span></div>
                            <div class="featuresList-caption">
                                <h5 class="fw-bold fs-6 mb-2">Top Class destination</h5>
                                <p class="fw-light fs-6">Rigid proponents of content strategy may shun the use of dummy
                                    copy but then
                                    designers might want to ask them to provide style sheets.</p>
                            </div>
                        </div>

                        <div class="featuresList-single">
                            <div class="featuresList-counter d-inline-block mb-3"><span
                                    class="bg-primary text-light rounded-pill fw-medium py-1 px-3">04</span></div>
                            <div class="featuresList-caption">
                                <h5 class="fw-bold fs-6 mb-2">Friendly Chat Support</h5>
                                <p class="fw-light fs-6">Rigid proponents of content strategy may shun the use of dummy
                                    copy but then
                                    designers might want to ask them to provide style sheets.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Flexible features End ================================== -->


    <!-- ================================ Article Section Start ======================================= -->
    <section class="pt-0">
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Trending & Popular Articles</h2>
                        <p>Cicero famously orated against his political opponent Lucius Sergius Catilina.</p>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center g-4">

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="blogGrid-wrap d-flex flex-column h-100">
                        <div class="blogGrid-pics">
                            <a href="#" class="d-block"><img src="assets/img/blog-1.jpg" class="img-fluid rounded"
                                                             alt="Blog image"></a>
                        </div>
                        <div class="blogGrid-caps pt-3">
                            <div class="d-flex align-items-center mb-1"><span
                                    class="label text-success bg-light-success">Destination</span></div>
                            <h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi
                                    To Paris in
                                    Comfirtable And Best Price</a></h4>
                            <p class="mb-3">Think of a news blog that's filled with content hourly on the Besides,
                                random text risks
                                to be unintendedly humorous or offensive day of going live.</p>
                            <a class="text-primary fw-medium" href="#">Read More<i
                                    class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="blogGrid-wrap d-flex flex-column h-100">
                        <div class="blogGrid-pics">
                            <a href="#" class="d-block"><img src="assets/img/blog-2.jpg" class="img-fluid rounded"
                                                             alt="Blog image"></a>
                        </div>
                        <div class="blogGrid-caps pt-3">
                            <div class="d-flex align-items-center mb-1"><span
                                    class="label text-success bg-light-success">Journey</span></div>
                            <h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi
                                    To Paris in
                                    Comfirtable And Best Price</a></h4>
                            <p class="mb-3">Think of a news blog that's filled with content hourly on the Besides,
                                random text risks
                                to be unintendedly humorous or offensive day of going live.</p>
                            <a class="text-primary fw-medium" href="#">Read More<i
                                    class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="blogGrid-wrap d-flex flex-column h-100">
                        <div class="blogGrid-pics">
                            <a href="#" class="d-block"><img src="assets/img/blog-3.jpg" class="img-fluid rounded"
                                                             alt="Blog image"></a>
                        </div>
                        <div class="blogGrid-caps pt-3">
                            <div class="d-flex align-items-center mb-1"><span
                                    class="label text-success bg-light-success">Business</span></div>
                            <h4 class="fw-bold fs-6 lh-base"><a href="#" class="text-dark">Make Your Next Journey Delhi
                                    To Paris in
                                    Comfirtable And Best Price</a></h4>
                            <p class="mb-3">Think of a news blog that's filled with content hourly on the Besides,
                                random text risks
                                to be unintendedly humorous or offensive day of going live.</p>
                            <a class="text-primary fw-medium" href="#">Read More<i
                                    class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ================================ Article Section Start ======================================= -->


    <!-- ============================ Call To Action Start ================================== -->
    @include('clients.pages.layouts.call_action')
    <!-- ============================ Call To Action Start ================================== -->


    <!-- ============================ Footer Start ================================== -->
    @include('clients.pages.layouts.footer')
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    @include('clients.auth.login.modal_form_login')
    @include('clients.auth.signUp.modal_form_signUp')
    <!-- End Modal -->

    <!-- Choose Currency Modal -->
    <div class="modal modal-lg fade" id="currencyModal" tabindex="-1" aria-labelledby="currenyModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-6" id="currenyModalLabel">Select Your Currency</h4>
                    <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-square-xmark"></i></a>
                </div>
                <div class="modal-body">
                    <div class="allCurrencylist">

                        <div class="suggestedCurrencylist-wrap mb-4">
                            <div class="d-inline-block mb-0 ps-3">
                                <h5 class="fs-6 fw-bold">Suggested Currency For you</h5>
                            </div>
                            <div class="suggestedCurrencylists">
                                <ul
                                    class="row align-items-center justify-content-start row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-2 gy-2 gx-3 m-0 p-0">
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">United State Dollar</div>
                                            <div class="text-muted-2 text-md text-uppercase">USD</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Pound Sterling</div>
                                            <div class="text-muted-2 text-md text-uppercase">GBP</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency active" href="#">
                                            <div class="text-dark text-md fw-medium">Indian Rupees</div>
                                            <div class="text-muted-2 text-md text-uppercase">Inr</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Euro</div>
                                            <div class="text-muted-2 text-md text-uppercase">EUR</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Australian Dollar</div>
                                            <div class="text-muted-2 text-md text-uppercase">aud</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Thai Baht</div>
                                            <div class="text-muted-2 text-md text-uppercase">thb</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="suggestedCurrencylist-wrap">
                            <div class="d-inline-block mb-0 ps-3">
                                <h5 class="fs-6 fw-bold">All Currencies</h5>
                            </div>
                            <div class="suggestedCurrencylists">
                                <ul
                                    class="row align-items-center justify-content-start row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-2 gy-2 gx-3 m-0 p-0">
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">United State Dollar</div>
                                            <div class="text-muted-2 text-md text-uppercase">USD</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Property currency</div>
                                            <div class="text-muted-2 text-md text-uppercase">GBP</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Argentine Peso</div>
                                            <div class="text-muted-2 text-md text-uppercase">EUR</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Azerbaijani Manat</div>
                                            <div class="text-muted-2 text-md text-uppercase">Inr</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Australian Dollar</div>
                                            <div class="text-muted-2 text-md text-uppercase">aud</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Bahraini Dinar</div>
                                            <div class="text-muted-2 text-md text-uppercase">thb</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Brazilian Real</div>
                                            <div class="text-muted-2 text-md text-uppercase">USD</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Bulgarian Lev</div>
                                            <div class="text-muted-2 text-md text-uppercase">GBP</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Canadian Dollar</div>
                                            <div class="text-muted-2 text-md text-uppercase">EUR</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Chilean Peso</div>
                                            <div class="text-muted-2 text-md text-uppercase">Inr</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Colombian Peso</div>
                                            <div class="text-muted-2 text-md text-uppercase">aud</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Danish Krone</div>
                                            <div class="text-muted-2 text-md text-uppercase">thb</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Egyptian Pound</div>
                                            <div class="text-muted-2 text-md text-uppercase">USD</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Hungarian Forint</div>
                                            <div class="text-muted-2 text-md text-uppercase">GBP</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Japanese Yen</div>
                                            <div class="text-muted-2 text-md text-uppercase">EUR</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Jordanian Dinar</div>
                                            <div class="text-muted-2 text-md text-uppercase">Inr</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Kuwaiti Dinar</div>
                                            <div class="text-muted-2 text-md text-uppercase">aud</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Malaysian Ringgit</div>
                                            <div class="text-muted-2 text-md text-uppercase">thb</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCurrency" href="#">
                                            <div class="text-dark text-md fw-medium">Singapore Dollar</div>
                                            <div class="text-muted-2 text-md text-uppercase">thb</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Choose Country Modal -->
    <div class="modal modal-lg fade" id="countryModal" tabindex="-1" aria-labelledby="countryModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-6" id="countryModalLabel">Select Your Country</h4>
                    <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-square-xmark"></i></a>
                </div>
                <div class="modal-body">
                    <div class="allCountrieslist">

                        <div class="suggestedCurrencylist-wrap mb-4">
                            <div class="d-inline-block mb-0 ps-3">
                                <h5 class="fs-6 fw-bold">Suggested Countries For you</h5>
                            </div>
                            <div class="suggestedCurrencylists">
                                <ul
                                    class="row align-items-center justify-content-start row-cols-xl-4 row-cols-lg-3 row-cols-2 gy-2 gx-3 m-0 p-0">
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/united-states.png"
                                                                             class="img-fluid circle"
                                                                             width="35" alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">United State Dollar</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/united-kingdom.png"
                                                                             class="img-fluid circle"
                                                                             width="35" alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Pound Sterling</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry active" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/flag.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Indian Rupees</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/belgium.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Euro</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/brazil.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Australian Dollar</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/china.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Thai Baht</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="suggestedCurrencylist-wrap">
                            <div class="d-inline-block mb-0 ps-3">
                                <h5 class="fs-6 fw-bold">All Countries</h5>
                            </div>
                            <div class="suggestedCurrencylists">
                                <ul
                                    class="row align-items-center justify-content-start row-cols-xl-4 row-cols-lg-3 row-cols-2 gy-2 gx-3 m-0 p-0">
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/united-states.png"
                                                                             class="img-fluid circle"
                                                                             width="35" alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">United State Dollar</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/vietnam.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Property currency</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/turkey.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Argentine Peso</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/spain.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Azerbaijani Manat</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/japan.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Australian Dollar</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/flag.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Bahraini Dinar</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/portugal.png"
                                                                             class="img-fluid circle"
                                                                             width="35" alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Brazilian Real</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/italy.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Bulgarian Lev</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/germany.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Canadian Dollar</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/france.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Chilean Peso</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/european.png"
                                                                             class="img-fluid circle"
                                                                             width="35" alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Colombian Peso</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/china.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Danish Krone</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/brazil.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Egyptian Pound</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/belgium.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Hungarian Forint</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/turkey.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Japanese Yen</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/spain.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Jordanian Dinar</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/germany.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Kuwaiti Dinar</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/france.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Malaysian Ringgit</div>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a class="selectCountry" href="#">
                                            <div class="d-inline-block"><img src="assets/img/flag/brazil.png"
                                                                             class="img-fluid circle" width="35"
                                                                             alt=""></div>
                                            <div class="text-dark text-md fw-medium ps-2">Singapore Dollar</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popupvideo"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="popupvideo">
                <iframe class="embed-responsive-item full-width" height="480"
                        src="https://www.youtube.com/embed/qN3OueBm9F4?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End Video Modal -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('geotrip/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('geotrip/assets/js/popper.min.js')}}"></script>
<script src="{{asset('geotrip/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('geotrip/assets/js/dropzone.min.js')}}"></script>
<script src="{{asset('geotrip/assets/js/flatpickr.js')}}"></script>
<script src="{{asset('geotrip/assets/js/flickity.pkgd.min.js')}}"></script>
<script src="{{asset('geotrip/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('geotrip/assets/js/rangeslider.js')}}"></script>
<script src="{{asset('geotrip/assets/js/select2.min.js')}}"></script>
<script src="{{asset('geotrip/assets/js/counterup.min.js')}}"></script>
<script src="{{asset('geotrip/assets/js/prism.js')}}"></script>

<script src="{{asset('geotrip/assets/js/addadult.js')}}"></script>
<script src="{{asset('geotrip/assets/js/custom.js')}}"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>

</html>
