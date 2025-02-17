<div>
    <div class="py-2">
        <a href="javascript:void(0)" class="btn btn-success" id="create_cp">Add Cancel Policies</a>
    </div>
    <table class="table table-bordered data-table" id="cancellationPoliciesData"></table>
    <div class="modal_form">
        @include('admin.hotel_manager.cancellation_policies.modal_form')
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

            let cancellationPoliciesTable;
            let cancellationPoliciesLoaded = false;
            // Sự kiện khi chuyển đổi tab
            $('#hotelTabs button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
                const target = $(event.target).attr('data-bs-target');
                if (target === '#cancellation-policies') {
                    if (!cancellationPoliciesLoaded) {
                        // Khởi tạo DataTable nếu chưa load
                        cancellationPoliciesTable = $('#cancellationPoliciesData').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('admin.cancellationPolicies.index') }}",
                            columns: [
                                {title: 'ID', name: 'id', data: 'id'},
                                {
                                    title: 'Currency',
                                    name: 'currency',
                                    data: 'currency'
                                },
                                {title: 'Time Zone', name: 'time_zone', data: 'time_zone'},
                                {
                                    title: 'Free cancellation',
                                    name: 'free_cancellation_until',
                                    data: 'free_cancellation_until'
                                },
                                {title: 'Apply Before', name: 'apply_before', data: 'apply_before'},
                                {title: 'Apply After', name: 'apply_after', data: 'apply_after'},
                                {
                                    title: 'Modification Policy',
                                    name: 'modification_policy',
                                    data: 'modification_policy'
                                },
                                {title: 'Room Option', name: 'room_option_id.id', data: 'room_option_id.id'},
                                {title: 'Action', name: 'action', data: 'action', orderable: false, searchable: false}
                            ],
                            order: [[0, 'desc']],
                            responsive: true,
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            }
                        });
                        cancellationPoliciesLoaded = true;
                    }
                } else {
                    // Nếu chuyển sang tab khác, xóa dữ liệu của "Hotel Policies"
                    if (cancellationPoliciesTable) {
                        cancellationPoliciesTable.destroy(); // Hủy DataTable
                        $('#cancellationPoliciesData').empty(); // Xóa nội dung bảng
                        cancellationPoliciesTable = null;
                        cancellationPoliciesLoaded = false;
                    }
                }
            });

            $('#create_cp').click(function () {
                $('#saveBtn').val("create-cp");
                $('#cp_id').val('');
                $('#cp_form').trigger("reset");
                $('#modelHeading_cp').html("Create New Cancellation Policy");
                $('#ajaxModel_cp').modal('show');
            });

            $('#cp_form').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                form_data.append('id', $('#cp_id').val());
                $('#saveBtn').html('Sending...');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.cancellationPolicies.store') }}",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_cp').modal('hide');
                        var onTable = $('#cancellationPoliciesData').DataTable();
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

            $('body').on('click', '.cp_edit', function () {
                var cp_id = $(this).attr('id');
                $.ajax({
                    url: "/admin/hotel-management/cancellation-policies/" + cp_id + "/edit",
                    type: "GET",
                    success: function (data) {
                        $('#modelHeading_cp').html("Edit Hotel Policy");
                        $('#saveBtn').val("edit-cp");
                        $('#ajaxModel_cp').modal('show');
                        $('#cp_id').val(data.id);
                        $('#currency').val(data.currency);
                        $('#time_zone').val(data.time_zone);
                        $('#free_cancellation_until').val(data.free_cancellation_until);
                        $('#apply_before').val(data.apply_before);
                        $('#apply_after').val(data.apply_after);
                        $('#modification_policy').val(data.modification_policy);
                        $('#amount').val(data.amount);
                        $('#room_option_id').val(data.room_option_id);
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.error);
                    },
                });
            });

            $('body').on('submit', function (e) {
                e.preventDefault();
                var form_data = new FormData(this);
                var cp_id = $('#cp_id').val(); // Lấy ID để xác định update hay create
                var url = cp_id ? "{{ route('admin.cancellationPolicies.update', ':id') }}".replace(':id', cp_id) : "{{ route('admin.cancellationPolicies.store') }}";
                var type = cp_id ? "PUT" : "POST"; // Nếu có ID thì update, không thì create

                $('#saveBtn').html('Saving...');

                $.ajax({
                    type: type,
                    url: url,
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel_cp').modal('hide');
                        var onTable = $('#cancellationPoliciesData').DataTable();
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

            $('body').on('click', '.hp_delete', function () {
                var cp_id = $(this).attr('id');
                var url = "{{ route('admin.cancellationPolicies.destroy', ':id') }}".replace(':id', cp_id);
                if (confirm('Are you sure want to delete !')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE',
                        },
                        success: function (data) {
                            var onTable = $('#cancellationPoliciesData').DataTable();
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
