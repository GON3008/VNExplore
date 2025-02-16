<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success" id="create_ro">Add Room Option</a>
    </div>
    <table class="table table-bordered data-table display nowrap" id="roomOptionData"></table>
    <div class="modal_form">
        @include('admin.hotel_manager.room_option.modal_form')
    </div>
</div>
@push('scripts')
    <script src=""></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let roomOptionTable; // Biến lưu DataTable
            let roomOptionLoaded = false; // Đánh dấu trạng thái khởi tạo DataTable

            // Hàm khởi tạo DataTable
            const initRoomOptionTable = () => {
                return $('#roomOptionData').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true, // Đảm bảo DataTable cũ bị hủy trước khi khởi tạo lại
                    ajax: "{{route('admin.roomOptions.index')}}",
                    columns: [
                        {title: 'ID', name: 'id', data: 'id'},
                        {
                            title: 'Price',
                            name: 'ro_price',
                            data: 'ro_price',
                            render: function (data) {
                                return parseFloat(data).toString()
                            },
                        },
                        {
                            title: 'Discount',
                            name: 'ro_discount',
                            data: 'ro_discount',
                            render: function (data) {
                                return parseFloat(data).toString()
                            },
                        },
                        {title: 'Quantity', name: 'ro_quantity', data: 'ro_quantity'},
                        {title: 'Guests', name: 'ro_max_guests', data: 'ro_max_guests'},
                        {title: 'Checkin', name: 'ro_checkin_time', data: 'ro_checkin_time'},
                        {title: 'Checkout', name: 'ro_checkout_time', data: 'ro_checkout_time'},
                        {title: 'View', name: 'ro_views', data: 'ro_views'},
                        {title: 'Room name', name: 'hotel_room.room_name', data: 'hotel_room.room_name'},
                        {title: 'Created by', name: 'created_by_user.name', data: 'created_by_user.name'},
                        {title: 'Action', name: 'action', data: 'action', orderable: false, searchable: false},
                    ],
                    order: [[0, 'asc']],
                    responsive: true,
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    }
                });
            };

            // Xử lý khi chuyển tab
            $('#hotelTabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
                const target = $(event.target).attr('data-bs-target');

                if (target === '#room-option') {
                    // Nếu tab "Room Option" được kích hoạt
                    if (!roomOptionLoaded) {
                        roomOptionTable = initRoomOptionTable(); // Khởi tạo DataTable
                        roomOptionLoaded = true;
                    } else {
                        // Reload lại DataTable khi quay lại tab
                        roomOptionTable.ajax.reload(null, false); // Không reset trạng thái phân trang
                    }
                } else {
                    // Hủy DataTable khi rời tab "Room Option"
                    if (roomOptionTable) {
                        roomOptionTable.destroy(); // Hủy DataTable
                        $('#roomOptionData').empty(); // Xóa nội dung bảng
                        roomOptionTable = null;
                        roomOptionLoaded = false;
                    }
                }
            });

            // Tự động load nếu tab "Room Option" đang hoạt động khi trang tải
            if ($('#room-option-tab').hasClass('active')) {
                roomOptionTable = initRoomOptionTable();
                roomOptionLoaded = true;
            }

            $('#create_ro').click(function () {
                $('#saveBtn').val("create-ro");
                $('#room_id').val('');
                $('#ro_form').trigger("reset");
                $('#modelHeading').html("Create New Room Option");
                $('#ajaxModel').modal('show');
                $('#show_checkin_ro').hide();
                $('#show_checkout_ro').hide()
            })

            $('#ro_form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                form_data.append('id', $('#ro_id').val());
                $('#saveBtn').html('Sending...');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.roomOptions.store') }}",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#roomOptionData').DataTable();
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

            $('body').on('click', '.ro_edit', function () {
                var ro_id = $(this).attr('id');
                $.ajax({
                    url: "/admin/hotel-management/room-options/" + ro_id + "/edit",
                    type: "GET",
                    success: function (data) {
                        $('#modelHeading').html('Edit Room Option');
                        $('#saveBtn').val('edit-ro');
                        $('#ajaxModel').modal('show');
                        $('#show_checkin_ro').show();
                        $('#show_checkout_ro').show();
                        $('#ro_id').val(data.id);
                        $('#ro_price').val(data.ro_price);
                        $('#ro_discount').val(data.ro_discount);
                        $('#ro_quantity').val(data.ro_quantity);
                        $('#ro_max_guests').val(data.ro_max_guests);
                        $('#ro_extra_bed_price').val(data.ro_extra_bed_price);
                        $('#ro_area').val(data.ro_area);
                        $('#ro_checkin_time').val(data.ro_checkin_time);
                        $('#ro_checkout_time').val(data.ro_checkout_time);
                        $('#ro_bed_type').val(data.ro_bed_type);
                        $('#ro_views').val(data.ro_views);
                        $('#ro_status').val(data.ro_status);
                        $('#ro_cancellation_type').val(data.ro_cancellation_type);
                        $('#ro_is_refundable').val(data.ro_is_refundable);
                        $('#ro_is_featured').val(data.ro_is_featured);
                        $('#ro_hotel_category_id').val(data.ro_hotel_category_id);
                        $('#ro_hotel_room_id').val(data.ro_hotel_room_id);
                        $('#ro_created_by').val(data.ro_created_by);
                    },
                    error: function (xhr) {
                        alert("Error: " + xhr.responseJSON.error);
                    }
                });
            });

            $('body').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                var ro_id = $('#ro_id').val(); // Lấy ID để xác định update hay create
                var url = ro_id ? "{{ route('admin.roomOptions.update', ':id') }}".replace(':id', ro_id) : "{{ route('admin.roomOptions.store') }}";
                var type = ro_id ? "PUT" : "POST"; // Nếu có ID thì update, không thì create

                $('#saveBtn').html('Saving...');

                $.ajax({
                    type: type,
                    url: url,
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#roomOptionData').DataTable();
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

            $('body').on('click', '.ro_delete', function () {
                var ro_id = $(this).attr('id');
                var url = "{{ route('admin.roomOptions.destroy', ':id') }}".replace(':id', ro_id);
                if (confirm('Are you sure want to delete !')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE',
                        },
                        success: function (data) {
                            var onTable = $('#roomOptionData').DataTable();
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


