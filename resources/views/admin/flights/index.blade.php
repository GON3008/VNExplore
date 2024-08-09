@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Flights</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewFlight">Create New Flight</a>
        </div>
        <table class="table table-bordered data-table" id="dataFlights"></table>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataFlights").DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: "{{ route('admin.flights.index') }}",
                columns: [
                    {title: 'Id', data: 'id', name: 'id'},
                    {title: 'Name', data: 'name', name: 'name'},
                    {title: 'Image', data: 'image', name: 'image', orderable: false},
                    {title: 'Code', data: 'flight_code', name: 'flight_code'},
                    {title: 'Price', data: 'price', name: 'price'},
                    {title: 'Discount', data: 'price_discount', name: 'price_discount'},
                    {title: 'Flight Number', data: 'flight_number', name: 'flight_number'},
                    {title: 'Departure', data: 'departure_date', name: 'departure_date'},
                    {title: 'Arrival', data: 'return_date', name: 'return_date'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
        })
    </script>
@endsection
