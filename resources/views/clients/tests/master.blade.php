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
   @include('clients.tests.header')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->


    <!-- ============================ Hero Banner  Start================================== -->
    @include('clients.tests.banner')
    <!-- ============================ Hero Banner End ================================== -->


    <!-- ============================ Offers Start ================================== -->
    @include('clients.tests.voucher')
    <!-- ============================ Offers End ================================== -->


    <!-- ============================ Content ================================== -->
    @yield('content')
    <!-- ============================ End Content ================================== -->


    <!-- ============================ Video Helps End ================================== -->
    @include('clients.tests.video_help')
    <!-- ============================ Video Helps End ================================== -->


    <!-- ============================ Our Reviews Start ================================== -->
    @include('clients.tests.review')
    <!-- ============================ Our Reviews End ================================== -->


    <!-- ============================ Flexible features End ================================== -->
    @include('clients.tests.flexible')
    <!-- ============================ Flexible features End ================================== -->


    <!-- ================================ Article Section Start ======================================= -->
    @include('clients.tests.article')
    <!-- ================================ Article Section Start ======================================= -->


    <!-- ============================ Call To Action Start ================================== -->
    @include('clients.tests.call_action')
    <!-- ============================ Call To Action Start ================================== -->


    <!-- ============================ Footer Start ================================== -->
    @include('clients.tests.footer')
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    @include('clients.auth.login.modal_form_login')
    @include('clients.auth.register.modal_form_register')
    @include('clients.auth.forgot_password.modal_form_forgotPW')
    <!-- End Modal -->

    <!-- Choose Currency Modal -->
    @include('clients.tests.currency')


    <!-- Choose Country Modal -->
    @include('clients.tests.countries')

    <!-- Video Modal -->
    <div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popupvideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="popupvideo">
                <iframe class="embed-responsive-item full-width" height="480" src="https://www.youtube.com/embed/qN3OueBm9F4?rel=0" frameborder="0" allowfullscreen></iframe>
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

