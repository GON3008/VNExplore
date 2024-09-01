@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Flights</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewFlight">Create New Flight</a>
        </div>
        <table class="table table-bordered data-table" id="dataFlights"></table>
    </div>

    @include('admin.flights.modal_form')
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
                ajax: "{{ route('admin.flights.index') }}",
                columns: [
                    {title: 'Id', data: 'id', name: 'id'},
                    {title: 'Name', data: 'name', name: 'name'},
                    // {title: 'Image', data: 'image', name: 'image'},
                    {title: 'Code', data: 'flight_code', name: 'flight_code'},
                    {title: 'Price', data: 'price', name: 'price'},
                    {title: 'Discount', data: 'price_discount', name: 'price_discount'},
                    {title: 'Flight Number', data: 'flight_number', name: 'flight_number'},
                    {title: 'Flight Quantity', data: 'quantity', name: 'quantity'},
                    {title: 'Departure Date', data: 'departure_date', name: 'departure_date'},
                    {title: 'Arrival Date', data: 'return_date', name: 'return_date'},
                    {title: 'Departure Time', data: 'departure_time', name: 'departure_time'},
                    {title: 'Arrival Time', data: 'return_time', name: 'return_time'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']]
            })

            $('#createNewFlight').click(function () {
                $('#saveBtn').val("create-flight");
                $('#flight_id').val('');
                $('#flightForm').trigger("reset");
                $('#modelHeading').html("Create New Flight");
                $('#ajaxModel').modal('show');
            });

            $('#flightForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#flight_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.flights.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#dataFlights').DataTable();
                        onTable.draw(false);
                        $('#saveBtn').html('Save changes');
                    },

                    error: function (xhr) {
                        if(xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            if(errors.name) {
                                $('#name_error').text(errors.name[0]);
                            }
                            // Add more error checks if necessary
                        }
                        $('#saveBtn').html('Save changes');
                    }
                });
            });

            $('body').on('click', '.edit', function (){
                var flight_id = $(this).attr('id');
                $.get("{{ route('admin.flights.index') }}" + '/' + flight_id + '/edit', function (data) {
                    $('#modelHeading').html("Edit Flight");
                    $('#saveBtn').val("edit-flight");
                    $('#ajaxModel').modal('show');
                    $('#flight_id').val(data.id);
                    $('#name').val(data.name);
                    $('#flight_code').val(data.flight_code);
                    $('#price').val(data.price);
                    $('#price_discount').val(data.price_discount);
                    $('#flight_number').val(data.flight_number);
                    $('#quantity').val(data.quantity);
                    $('#departure_date').val(data.departure_date);
                    $('#return_date').val(data.return_date);
                    $('#departure_time').val(data.departure_time);
                    $('#return_time').val(data.return_time);
                    $('#location_arrival_id').val(data.location_arrival_id);
                    $('#location_departure_id').val(data.location_departure_id);
                    $('#category_id').val(data.category_id);
                })
            });

            $('body').on('click', '.delete', function (){
                var flight_id = $(this).attr("id");
                var url = "{{ route('admin.flights.destroy', ':id') }}";
                url = url.replace(':id', flight_id);

                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        success: function (data) {
                            var onTable = $('#dataFlights').DataTable();
                            onTable.draw(false);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        },
                    });
                }
            });
        });
    </script>
@endsection
