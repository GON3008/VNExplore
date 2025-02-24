<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success create" id="create_ra"></a>
    </div>
    <table class="table table-bordered data-table" id="roomAvailabilityData"></table>
    <div class="modal_form">
        @include('admin.hotel_manager.room_availability.modal_form')
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

            let roomAvailabilityTable;
            let roomAvailabilityLoaded = false;
            $('.create').html('Add Room Availability');
            // Sự kiện khi chuyển đổi tab
            $('#hotelTabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
                const target = $(event.target).attr('data-bs-target');
                if (target === '#room-availability') {
                    if (!roomAvailabilityLoaded) {
                        // Khởi tạo DataTable nếu chưa load
                        roomAvailabilityTable = $('#roomAvailabilityData').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('admin.roomAvailability.index') }}",
                            columns: [
                                {title: 'ID', name: 'id', data: 'id'},
                                {title: 'Available Room', name: 'available_rooms', data: 'available_rooms'},
                                {title: 'Booked Room', name: 'booked_rooms', data: 'booked_rooms'},
                                {title: 'Maintenance Room', name: 'maintenance_rooms', data: 'maintenance_rooms'},
                                {title: 'Unavailable Room', name: 'unavailable_rooms', data: 'unavailable_rooms'},
                                {title: 'Date', name: 'date', data: 'date'},
                                {title: 'Room Option', name: 'room_option.id', data: 'room_option.id'},
                                {title: 'Action', name: 'action', data: 'action', orderable: false, searchable: false}
                            ],
                            order: [[0, 'desc']],
                            responsive: true,
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            }
                        });
                        roomAvailabilityLoaded = true;
                    }
                } else {
                    // Nếu chuyển sang tab khác, xóa dữ liệu của "Hotel Policies"
                    if (roomAvailabilityTable) {
                        roomAvailabilityTable.destroy(); // Hủy DataTable
                        $('#roomAvailabilityData').empty(); // Xóa nội dung bảng
                        roomAvailabilityTable = null;
                        roomAvailabilityLoaded = false;
                    }
                }
            });

            $('#create_ra').click(function () {
                $('#saveBtn').val("create-ra");
                $('#ra_id').val('');
                $('#ra_form').trigger("reset");
                $('#modelHeading_ra').html("Create New Room Availability");
                $('#ajaxModel_ra').modal('show');
            });

            $(document).ready(function () {
                $('#room_option_id').change(function () {
                    let roomOptionId = $(this).val();
                    if (roomOptionId) {
                        $.ajax({
                            url: '/admin/hotel-management/room-option/' + roomOptionId,
                            type: 'GET',
                            success: function (data) {
                                console.log(data); // Kiểm tra JSON trả về
                                $('#available_rooms, #booked_rooms').each(function (){
                                    $(this).val(data.ro_quantity); // Gán giá trị vào ô input
                                })
                            },
                            error: function (xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    } else {
                        $('#available_rooms').val(''); // Nếu không chọn gì, reset lại input
                    }
                });
            });


        $('#ra_form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                form_data.append('id', $('#ra_id').val());
                $('#saveBtn').html('Sending...');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.roomAvailability.store') }}",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_ra').modal('hide');
                        var onTable = $('#roomAvailabilityData').DataTable();
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

            $('body').on('click', '.ra_edit', function (){
                var ra_id = $(this).attr('id');
                $.ajax({
                    url: "/admin/hotel-management/room-availability/" + ra_id + "/edit",
                    type: "GET",
                    success: function (data) {
                        $('#modelHeading_ra').html("Edit Room Availability");
                        $('#saveBtn').val("edit-hp");
                        $('#ajaxModel_ra').modal('show');
                        $('#ra_id').val(data.id);
                        $('#available_rooms').val(data.available_rooms);
                        $('#booked_rooms').val(data.booked_rooms);
                        $('#maintenance_rooms').val(data.maintenance_rooms);
                        $('#unavailable_rooms').val(data.unavailable_rooms);
                        $('#date').val(data.date);
                        $('#room_option_id').val(data.room_option_id);
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.error);
                    },
                });
            });

            {{--$('body').on('submit', function (e) {--}}
            {{--    e.preventDefault();--}}
            {{--    var form_data = new FormData(this);--}}
            {{--    var ra_id = $('#hp_id').val(); // Lấy ID để xác định update hay create--}}
            {{--    var url = ra_id ? "{{ route('admin.roomAvailability.update', ':id') }}".replace(':id', ra_id) : "{{ route('admin.roomAvailability.store') }}"ra--}}
            {{--    $('#saveBtn').html('Saving...');--}}

            {{--    $.ajax({--}}
            {{--        type: type,--}}
            {{--        url: url,--}}
            {{--        data: form_data,--}}
            {{--        processData: false,--}}
            {{--        contentType: false,--}}
            {{--        success: function (data) {--}}
            {{--            $('#ajaxModel_ra').modal('hide');--}}
            {{--            var onTable = $('#roomAvailabilityData').DataTable();--}}
            {{--            onTable.ajax.reload(null, false); // Cập nhật lại DataTable--}}
            {{--            $('#saveBtn').html('Save changes');--}}
            {{--        },--}}
            {{--        error: function (xhr) {--}}
            {{--            if (xhr.responseJSON && xhr.responseJSON.errors) {--}}
            {{--                let errors = xhr.responseJSON.errors;--}}
            {{--                if (errors.name) {--}}
            {{--                    $('#name_error').text(errors.name[0]);--}}
            {{--                }--}}
            {{--            }--}}
            {{--            $('#saveBtn').html('Save changes');--}}
            {{--        }--}}
            {{--    });--}}
            {{--});--}}

            {{--$('body').on('click', '.hp_delete', function (){--}}
            {{--    var hp_id = $(this).attr('id');--}}
            {{--    var url = "{{ route('admin.roomAvailability.destroy', ':id') }}".replace(':id', hp_id);--}}
            {{--    if (confirm('Are you sure want to delete !')) {--}}
            {{--        $.ajax({--}}
            {{--            type: 'DELETE',--}}
            {{--            url: url,--}}
            {{--            data: {--}}
            {{--                _token: '{{ csrf_token() }}',--}}
            {{--                _method: 'DELETE',--}}
            {{--            },--}}
            {{--            success: function (data) {--}}
            {{--                var onTable = $('#roomAvailabilityData').DataTable();--}}
            {{--                onTable.draw(false);--}}
            {{--            },--}}
            {{--            error: function (data) {--}}
            {{--                console.log('Error:', data);--}}
            {{--            }--}}
            {{--        });--}}
            {{--    }--}}
            {{--});--}}
        });
    </script>
@endpush
