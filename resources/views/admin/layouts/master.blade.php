<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:48 GMT -->
<head>
    <meta charset="utf-8"/>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>


    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Time picker -->
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
      data-rightbar-onstart="true">
<!-- Begin page -->
<div class="wrapper">
    <! --- ========== Left Sidebar Start ========== -->
    @include('admin.layouts.components.left_menu')

    <!-- ========== Left Sidebar End ========== -->


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @include('admin.layouts.components.top_bar')
            <!-- end Topbar -->

            @yield('content')

            <!-- Footer Start -->
            @include('admin.layouts.components.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- bundle -->
</div>

<!-- Right Sidebar -->
@include('admin.layouts.components.right_menu')
<!-- End Right Sidebar -->

<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

<!-- Apex js -->
<script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>

<!-- Todo js -->
<script src="{{ asset('assets/js/ui/component.todo.js') }}"></script>

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.crm-dashboard.js') }}"></script>
<!-- end demo js-->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>--}}
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<!-- Time picker -->
@yield('scripts')
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/crm-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:49 GMT -->
</html>
