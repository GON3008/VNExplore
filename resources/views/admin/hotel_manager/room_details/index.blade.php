<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success create_rd" id="create_rd"></a>
    </div>
    <table class="table table-bordered data-table" id="roomDetailsData"></table>
    <div class="modal_form">
        @include('admin.hotel_manager.room_details.modal_form')
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

            let roomDetailsTable;
            let roomDetailsLoaded = false;
            $('.create_rd').html('Add Room Detail');
            // Sự kiện khi chuyển đổi tab
            $('#hotelTabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
                const target = $(event.target).attr('data-bs-target');
                if (target === '#room-details') {
                    if (!roomDetailsLoaded) {
                        // Khởi tạo DataTable nếu chưa load
                        roomDetailsTable = $('#roomDetailsData').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('admin.roomDetails.index') }}",
                            columns: [
                                {title: 'ID', name: 'id', data: 'id'},
                                {title: 'Room Number', name: 'room_number', data: 'room_number'},
                                {title: 'Status', name: 'status', data: 'status'},
                                {title: 'Room Option', name: 'room_option.id', data: 'room_option.id'},
                                {title: 'Action', name: 'action', data: 'action', orderable: false, searchable: false}
                            ],
                            order: [[0, 'desc']],
                            responsive: true,
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            }
                        });
                        roomDetailsLoaded = true;
                    }
                } else {
                    // Nếu chuyển sang tab khác, xóa dữ liệu của "Hotel Policies"
                    if (roomDetailsTable) {
                        roomDetailsTable.destroy(); // Hủy DataTable
                        $('#roomDetailsData').empty(); // Xóa nội dung bảng
                        roomDetailsTable = null;
                        roomDetailsLoaded = false;
                    }
                }
            });

            $('#create_rd').click(function () {
                $('#saveBtn').val("create-rd");
                $('#rd_id').val('');
                $('#rd_form').trigger("reset");
                $('#show_is_status').hide();
                $('#modelHeading_rd').html("Create New Room Detail");
                $('#ajaxModel_rd').modal('show');
            });

            $('#rd_form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                form_data.append('id', $('#rd_id').val());
                $('#saveBtn').html('Sending...');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.roomDetails.store') }}",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_rd').modal('hide');
                        var onTable = $('#roomDetailsData').DataTable();
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

            $('body').on('click', '.rd_edit', function () {
                var rd_id = $(this).attr('id');
                $.ajax({
                    url: "/admin/hotel-management/room-details/" + rd_id + "/edit",
                    type: "GET",
                    success: function (data) {
                        $('#modelHeading_rd').html("Edit Room Detail");
                        $('#saveBtn').val("edit-rd");
                        $('#ajaxModel_rd').modal('show');
                        $('#rd_id').val(data.id);
                        $('#rd_option').val(data.room_option_id);
                        $('#rd_status').val(data.status);
                        $('#rd_number').val(data.room_number);
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.error);
                    },
                });
            });

            $('body').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                var rd_id = $('#rd_id').val(); // Lấy ID để xác định update hay create
                var url = rd_id ? "{{ route('admin.roomDetails.update', ':id') }}".replace(':id', rd_id) : "{{ route('admin.roomDetails.store') }}"
                $('#saveBtn').html('Saving...');

                $.ajax({
                    type: type,
                    url: url,
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_ra').modal('hide');
                        var onTable = $('#roomDetailsData').DataTable();
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

            $('body').on('click', '.rd_delete', function () {
                var rd_id = $(this).attr('id');
                var url = "{{ route('admin.roomDetails.destroy', ':id') }}".replace(':id', rd_id);
                if (confirm('Are you sure want to delete !')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE',
                        },
                        success: function (data) {
                            var onTable = $('#roomDetailsData').DataTable();
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

