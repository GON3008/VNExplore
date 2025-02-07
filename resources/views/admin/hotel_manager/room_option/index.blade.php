<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success" id="create_ro">Add Room Option</a>
    </div>
    <table class="table table-bordered data-table display nowrap" id="roomOptionData"></table>
    <div class="modal_form">
        @include('admin.hotel_manager.room_option.modal_form')
    </div>
</div>
<link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" rel="stylesheet">
<link href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
<link href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">
@push('scripts')
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.dataTables.js"></script>
    <script src=""></script>
    <script type="text/javascript">
        $(document).ready(function () {
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
                        {title: 'ID', name: 'ro_id', data: 'ro_id'},
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
                        {title: 'Room name', name: 'ro_room_id.room_name', data: 'ro_room_id.room_name'},
                        {title: 'Created by', name: 'ro_user_id.name', data: 'ro_user_id.name'},
                        {title: 'Action', name: 'action', data: 'action', orderable: false, searchable: false},
                    ],
                    order: [[0, 'asc']],
                    responsive: true,
                    rowReorder:{
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
                $('#saveBtn').val("create-room");
                $('#room_id').val('');
                $('#ro_form').trigger("reset");
                $('#modelHeading').html("Create New Room Option");
                $('#ajaxModel').modal('show');
            })

            $('#ro_form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new Form_data(this);
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
        });
    </script>
@endpush


