<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewHotelPolicies">Add Hotel Policies</a>
    </div>
    <table class="table table-bordered data-table" id="hotelPoliciesData"></table>
    <div class="modal_form">
        @include('admin.hotel_manager.hotel_policies.modal_form')
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

            let hotelPoliciesTable;
            let hotelPoliciesLoaded = false;
            // Sự kiện khi chuyển đổi tab
            $('#hotelTabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
                const target = $(event.target).attr('data-bs-target');
                if (target === '#hotel-policies') {
                    if (!hotelPoliciesLoaded) {
                        // Khởi tạo DataTable nếu chưa load
                        hotelPoliciesTable = $('#hotelPoliciesData').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('admin.hotelPolicies.index') }}",
                            columns: [
                                {title: 'ID', name: 'id', data: 'id'},
                                {title: 'Payment Policy', name: 'hp_payment_policy', data: 'hp_payment_policy'},
                                {
                                    title: 'Free cancellation',
                                    name: 'hp_free_cancellation_days',
                                    data: 'hp_free_cancellation_days'
                                },
                                {title: 'Booking Fee', name: 'hp_booking_fee', data: 'hp_booking_fee'},
                                {title: 'Checkin Time', name: 'hp_checkin_time', data: 'hp_checkin_time'},
                                {title: 'Checkout Time', name: 'hp_checkout_time', data: 'hp_checkout_time'},
                                {title: 'Hotel Room', name: 'hotel_rooms.room_name', data: 'hotel_room.room_name'},
                                {title: 'Action', name: 'action', data: 'action', orderable: false, searchable: false}
                            ],
                            order: [[0, 'desc']],
                            responsive: true,
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            }
                        });
                        hotelPoliciesLoaded = true;
                    }
                } else {
                    // Nếu chuyển sang tab khác, xóa dữ liệu của "Hotel Policies"
                    if (hotelPoliciesTable) {
                        hotelPoliciesTable.destroy(); // Hủy DataTable
                        $('#hotelPoliciesData').empty(); // Xóa nội dung bảng
                        hotelPoliciesTable = null;
                        hotelPoliciesLoaded = false;
                    }
                }
            });
        });
    </script>
@endpush
