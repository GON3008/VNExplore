<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GeoTrip - Tour & Travel Booking Agency HTML Template | ThemezHub</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

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
    @include('clients.layouts.hotels.hotel_header')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Hero Banner  Start================================== -->
    <div class="py-4 position-relative" style="background-image: linear-gradient(160deg, #1A2F78 0%, #1870C9 50%, #5195E3 100%);
}">
        <div class="container">

            <!-- Search Form -->
           @include('clients.layouts.hotels.search_form')
            <!-- </row> -->

        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->


    <!-- ============================ Searches List Start ================================== -->
    <section class="gray-simple">
        <div class="container">
            <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

                <!-- Sidebar -->
               @include('clients.layouts.hotels.sidebar')

                <!-- All List -->
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <h5 class="fw-bold fs-6 mb-lg-0 mb-3">Showing 280 Search Results</h5>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            <div
                                class="d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap">
                                <div class="flsx-first me-2">
                                    <div class="bg-white rounded py-2 px-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                   id="mapoption">
                                            <label class="form-check-label ms-1" for="mapoption">Map</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="flsx-first mt-sm-0 mt-2">
                                    <ul class="nav nav-pills nav-fill p-1 small lights blukker bg-primary rounded-3 shadow-sm"
                                        id="filtersblocks" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active rounded-3" id="trending" data-bs-toggle="tab"
                                                    type="button"
                                                    role="tab" aria-selected="true">Our Trending
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-3" id="mostpopular" data-bs-toggle="tab"
                                                    type="button"
                                                    role="tab" aria-selected="false">Most Popular
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-3" id="lowprice" data-bs-toggle="tab"
                                                    type="button" role="tab"
                                                    aria-selected="false">Lowest Price
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                   @yield('hotel_content')

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Searches List End ================================== -->


    <!-- ============================ Content ================================== -->
    @yield('content')
    <!-- ============================ End Content ================================== -->


    <!-- ============================ Footer Start ================================== -->
    @include('clients.layouts.hotels.hotel_footer')
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    @include('clients.auth.login.modal_form_login')
    @include('clients.auth.signUp.modal_form_signUp')
    <!-- End Modal -->

    <!-- Choose Currency Modal -->
    @include('clients.tests.currency')


    <!-- Choose Country Modal -->
    @include('clients.tests.countries')

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>

</html>
