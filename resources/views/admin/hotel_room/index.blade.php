@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Hotel Rooms</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewRoom">Create New Room</a>
        </div>
        <table class="table table-bordered data-table" id="dataRooms"></table>
    </div>

    <div class="modal-form">
        @include('admin.hotel_room.modal_form')
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataRooms").DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                scrollX: true,
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                ajax: "{{ route('admin.rooms.index') }}",
                columns: [
                    {title: 'Room Number', data: 'room_number', name: 'room_number'},
                    {title: 'Room Name', data: 'room_name', name: 'room_name'},
                    {title: 'Price', data: 'room_price', name: 'room_price'},
                    {title: 'Discount', data: 'room_discount', name: 'room_discount'},
                    // {title: 'Image', data: 'room_image', name: 'room_image'},
                    {
                        title: 'Rating',
                        data: 'room_rating',
                        name: 'room_rating',
                        render: function (data) {
                            let stars = '';
                            for (let i = 1; i <= 5; i++) {
                                if (i <= data) {
                                    stars += '<i class="fas fa-star" style="color: gold"></i>'; // full star icon
                                } else {
                                    stars += '<i class="far fa-star" style="color: gold"></i>'; // empty star icon
                                }
                            }
                            return stars;
                        }
                    },
                    {title: 'Bed Type', data: 'bed_type', name: 'bed_type'},
                    {title: 'Guest', data: 'guests', name: 'guests'},
                    {title: 'Availability Status', data: 'availability_status', name: 'availability_status'},
                    {title: 'Cleaning Status', data: 'cleaning_status', name: 'cleaning_status'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createNewRoom').click(function () {
                $('#saveBtn').val("create-room");
                $('#room_id').val('');
                $('#roomForm').trigger("reset");
                $('#modelHeading').html("Create New Room");
                $('#ajaxModel').modal('show');
                $('#availability').hide();
                $('#cleaning').hide();
                $('#availability_status').val('Available');
                $('#cleaning_status').val('Cleaned');
            });

            $('#roomForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#room_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.rooms.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#dataRooms').DataTable();
                        onTable.draw(false);
                        $('#saveBtn').html('Save changes');
                    },

                    error: function (xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.name) {
                                $('#name_error').text(errors.name[0]);
                            }
                            // Add more error checks if necessary
                        }
                        $('#saveBtn').html('Save changes');
                    }
                });
            });

            $('body').on('click', '.edit', function () {
                var room_id = $(this).attr('id');
                $.get("{{route('admin.rooms.index')}}" + '/' + room_id + '/edit', function (data) {
                    $('#modelHeading').html("Edit Room");
                    $('#saveBtn').val('edit-room');
                    $('#ajaxModel').modal('show');
                    $('#room_number').val(data.room_number);
                    $('#room_id').val(data.id);
                    $('#room_name').val(data.room_name);
                    $('#room_price').val(data.room_price);
                    $('#room_discount').val(data.room_discount);
                    $('#room_rating').val(data.room_rating);
                    $('#room_description').val(data.room_description);
                    $('#availability_status').val(data.availability_status);
                    $('#cleaning_status').val(data.cleaning_status);
                    $('#guests').val(data.guests);
                    $('#bed_type').val(data.bed_type);
                    $('#hotelCategory_id').val(data.hotel_category_id);
                    $('#hotel_service_id').val(data.hotel_service_id);
                    $('#hotel_location_id').val(data.hotel_location_id);
                    $('#room_type_id').val(data.room_type_id);
                    $('#room_images').val(data.room_images);
                    $('#av_status').show();
                    $('#cl_status').show();
                })
            });

            $('body').on('click', '.delete', function () {
                var room_id = $(this).attr('id');
                var url = "{{route('admin.rooms.destroy', ':id')}}";
                url = url.replace(':id', room_id);

                if (confirm("Are you sure want do delete !")) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: '{{csrf_token()}}',
                            _method: 'DELETE',
                        },
                        success: function (data) {
                            var onTable = $('#dataRooms').DataTable();
                            onTable.draw(false);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        })
    </script>
@endsection
