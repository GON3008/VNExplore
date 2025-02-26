<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success create" id="create_rb" style="display: none"></a>
    </div>
    <table class="table table-bordered data-table" id="roomBookingData"></table>
    <div class="modal_form">
        @include('admin.hotel_manager.room_booking.modal_form')
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });

            let roomBookingTable;
            let roomBookingLoaded = false;
            $('.create').html('Add Room Booking');
            // Sự kiện khi chuyển đổi tab
            $('#hotelTabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
                const target = $(event.target).attr('data-bs-target');
                if (target === '#room-booking') {
                    if (!roomBookingLoaded) {
                        // Khởi tạo DataTable nếu chưa load
                        roomBookingTable = $('#roomBookingData').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('admin.roomBooking.index') }}",
                            columns: [
                                {title: 'ID', name: 'id', data: 'id'},
                                {title: 'Booking Date', name: 'date', data: 'date'},
                                {title: 'Room Status', name: 'status', data: 'status'},
                                {title: 'Room Option', name: 'room_option.id', data: 'room_option.id'},
                                {title: 'Room Number', name: 'room_detail.room_number', data: 'room_detail.room_number'},
                                {title: 'Email Booking', name: 'created_by.email', data: 'created_by.email'},
                                {title: 'Action', name: 'action', data: 'action', orderable: false, searchable: false}
                            ],
                            order: [[0, 'desc']],
                            responsive: true,
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            }
                        });
                        roomBookingLoaded = true;
                    }
                } else {
                    // Nếu chuyển sang tab khác, xóa dữ liệu của "Hotel Policies"
                    if (roomBookingTable) {
                        roomBookingTable.destroy(); // Hủy DataTable
                        $('#roomBookingData').empty(); // Xóa nội dung bảng
                        roomBookingTable = null;
                        roomBookingLoaded = false;
                    }
                }
            });

            $('#create_rb').click(function () {
                $('#saveBtn').val("create-rb");
                $('#rb_id').val('');
                $('#rb_form').trigger("reset");
                $('#show_is_status').hide();
                $('#modelHeading_rb').html("Create New Room Booking");
                $('#ajaxModel_rb').modal('show');
            });

            $('#rb_form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                form_data.append('id', $('#rb_id').val());
                $('#saveBtn').html('Sending...');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.roomBooking.store') }}",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_rb').modal('hide');
                        var onTable = $('#roomBookingData').DataTable();
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

            $('body').on('click', '.rb_edit', function () {
                var rb_id = $(this).attr('id');
                $.ajax({
                    url: "/admin/hotel-management/room-booking/" + rb_id + "/edit",
                    type: "GET",
                    success: function (data) {
                        $('#modelHeading_rb').html("Edit Room Booking");
                        $('#saveBtn').val("edit-rb");
                        $('#ajaxModel_rb').modal('show');
                        $('#rb_id').val(data.id);
                        $('#ro_id').val(data.room_option_id);
                        $('#rb_number').val(data.room_number);
                        $('#rb_status').val(data.status);
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.error);
                    },
                });
            });

            $('body').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                var rb_id = $('#rb_id').val(); // Lấy ID để xác định update hay create
                var url = rb_id ? "{{ route('admin.roomBooking.update', ':id') }}".replace(':id', rb_id) : "{{ route('admin.roomBooking.store') }}"
                $('#saveBtn').html('Saving...');

                $.ajax({
                    type: type,
                    url: url,
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_ra').modal('hide');
                        var onTable = $('#roomBookingData').DataTable();
                        onTable.ajax.reload(null, false); // Cập nhật lại DataTable
                        $('#saveBtn').html('Save changes');
                    },
                    error: function (xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.name) {
                                $('#name_error').text(errors.name[0]);
                            }
                        }
                        $('#saveBtn').html('Save changes');
                    }
                });
            });

            $('body').on('click', '.rb_delete', function () {
                var rb_id = $(this).attr('id');
                var url = "{{ route('admin.roomBooking.destroy', ':id') }}".replace(':id', rb_id);
                if (confirm('Are you sure want to delete !')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE',
                        },
                        success: function (data) {
                            var onTable = $('#roomBookingData').DataTable();
                            onTable.draw(false);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    </script>
@endpush
