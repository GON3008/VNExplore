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
                                {title: 'ID', name: 'hp_id', data: 'hp_id'},
                            ]
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
