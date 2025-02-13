<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success" id="create_hp">Add Hotel Policies</a>
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
                                {
                                    title: 'Free cancellation day',
                                    name: 'hp_free_cancellation_days',
                                    data: 'hp_free_cancellation_days'
                                },
                                {title: 'Booking fee', name: 'hp_booking_fee', data: 'hp_booking_fee'},
                                {
                                    title: 'Free cancellation',
                                    name: 'hp_is_free_cancellation',
                                    data: 'hp_is_free_cancellation'
                                },
                                {title: 'Checkin Time', name: 'hp_checkin_time', data: 'hp_checkin_time'},
                                {title: 'Checkout Time', name: 'hp_checkout_time', data: 'hp_checkout_time'},
                                {title: 'Hotel Room', name: 'hotel_room.room_name', data: 'hotel_room.room_name'},
                                {title: 'Payment Policy', name: 'hp_payment_policy', data: 'hp_payment_policy'},
                                {title: 'Note', name: 'hp_policy_notes', data: 'hp_policy_notes'},
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

            $('#create_hp').click(function () {
                $('#saveBtn').val("create-hp");
                $('#hp_id').val('');
                $('#hp_form').trigger("reset");
                $('#modelHeading_hp').html("Create New Hotel Policy");
                $('#ajaxModel_hp').modal('show');
            });

            $('#hp_form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                form_data.append('id', $('#hp_id').val());
                $('#saveBtn').html('Sending...');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.hotelPolicies.store') }}",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_hp').modal('hide');
                        var onTable = $('#hotelPoliciesData').DataTable();
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

            $('body').on('click', '.hp_edit', function (){
                var hp_id = $(this).attr('id');
                $.ajax({
                    url: "/admin/hotel-management/hotel-policies/" + hp_id + "/edit",
                    type: "GET",
                    success: function (data) {
                        $('#modelHeading_hp').html("Edit Hotel Policy");
                        $('#saveBtn').val("edit-hp");
                        $('#ajaxModel_hp').modal('show');
                        $('#hp_id').val(data.id);
                        $('#hp_payment_policy').val(data.hp_payment_policy);
                        $('#hp_free_cancellation_days').val(data.hp_free_cancellation_days);
                        $('#hp_booking_fee').val(data.hp_booking_fee);
                        $('#hp_is_free_cancellation').val(data.hp_is_free_cancellation);
                        $('#hp_checkin_time').val(data.hp_checkin_time);
                        $('#hp_checkout_time').val(data.hp_checkout_time);
                        $('#hp_policy_notes').val(data.hp_policy_notes);
                        $('#hp_late_checkout_fee').val(data.hp_late_checkout_fee);
                        $('#hp_early_checkin_fee').val(data.hp_early_checkin_fee);
                        $('#hp_allows_pets').val(data.hp_allows_pets);
                        $('#hp_allows_smoking').val(data.hp_allows_smoking);
                        $('#hp_is_child_friendly').val(data.hp_is_child_friendly);
                        $('#hp_hotel_room_id').val(data.hp_hotel_room_id);
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.error);
                    },
                });
            });

            $('body').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                var hp_id = $('#hp_id').val(); // Lấy ID để xác định update hay create
                var url = hp_id ? "{{ route('admin.hotelPolicies.update', ':id') }}".replace(':id', hp_id) : "{{ route('admin.hotelPolicies.store') }}";
                var type = hp_id ? "PUT" : "POST"; // Nếu có ID thì update, không thì create

                $('#saveBtn').html('Saving...');

                $.ajax({
                    type: type,
                    url: url,
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_hp').modal('hide');
                        var onTable = $('#hotelPoliciesData').DataTable();
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

            $('body').on('click', '.hp_delete', function (){
                var hp_id = $(this).attr('id');
                var url = "{{ route('admin.hotelPolicies.destroy', ':id') }}".replace(':id', hp_id);
                if (confirm('Are you sure want to delete !')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE',
                        },
                        success: function (data) {
                            var onTable = $('#hotelPoliciesData').DataTable();
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
