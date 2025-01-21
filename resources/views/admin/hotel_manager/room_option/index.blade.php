<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewRoomOption">Add Room Option</a>
    </div>
    <table class="table table-bordered data-table" id="roomOptionData"></table>
    <div class="modal_form">
        @include('admin.hotel_manager.room_option.modal_form')
    </div>
</div>

@push('scripts')
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
                    ]
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
        });
    </script>
@endpush


