@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Categories</h2>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" href="#tour_category" data-bs-toggle="tab" data-bs-target="#tour_category">Tour Category</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" href="#flight_category" data-bs-toggle="tab" data-bs-target="#flight_category">Flight Category</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" href="#car_category" data-bs-toggle="tab" data-bs-target="#car_category">Car Category</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="tour_category">
                <table class="table table-bordered data-table" id="tourCategoryData"></table>
            </div>
            <div class="tab-pane" id="flight_category">
                <table class="table table-bordered data-table" id="flightCategoryData"></table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataTable('#tourCategoryData', "{{ route('admin.tourCategories.index') }}");
            loadDataTable('#flightCategoryData', "{{ route('admin.flightCategories.index') }}");

            function loadDataTable(tableId, ajaxUrl) {
                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: ajaxUrl,
                    columns: [
                        {title: 'ID', data: 'id', name: 'id'},
                        {title: 'Name', data: 'name', name: 'name'},
                        {title: 'Description', data: 'description', name: 'description'},
                        {title: 'Status', data: 'status', name: 'status'},
                        {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']]
                });
            }
        });
    </script>
@endsection
