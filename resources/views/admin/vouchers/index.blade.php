@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Vouchers</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewVouchers">Create New Voucher</a>
        </div>
        <table class="table table-bordered data-table" id="dataVouchers"></table>
    </div>

    @include('admin.vouchers.modal_form')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            // CSRF Token setup
            function setupAjaxHeaders() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }

            $(document).ready(function () {
                $('#valid_until').on('change', function () {
                    checkVoucherStatus();
                });

                $('input[name="voucher_option"]').on('change', function () {
                    toggleVoucherCodeInput();
                });

                function toggleVoucherCodeInput() {
                    if ($('#random_code').is(':checked')) {
                        $('#voucherCodeGroup').hide();
                        generateRandomVoucherCode();
                    } else {
                        $('#voucherCodeGroup').show();
                        $('#voucher_code_input').val(''); // Clear input
                    }
                }

                function generateRandomVoucherCode() {
                    const randomCode = 'VC-' + Math.random().toString(36).substring(2, 8).toUpperCase();
                    $('#voucher_code').val(randomCode);
                }

                function checkVoucherStatus() {
                    var validUntil = new Date($('#valid_until').val());
                    var now = new Date();
                    if (validUntil < now) {
                        $('#is_active').val('0');
                    }
                }

                // Initialize state
                toggleVoucherCodeInput();
            });


            // Initialize DataTable
            function initializeDataTable() {
                $("#dataVouchers").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.vouchers.index') }}",
                    columns: [
                        {title: 'Id', data: 'id', name: 'id'},
                        {title: 'Name', data: 'name', name: 'name'},
                        {title: 'Code', data: 'voucher_code', name: 'voucher_code'},
                        {title: 'Quantity', data: 'quantity', name: 'quantity'},
                        {title: 'Discount', data: 'discount_amount', name: 'discount_amount'},
                        {title: 'Start time', data: 'valid_from', name: 'valid_from'},
                        {title: 'End time', data: 'valid_until', name: 'valid_until'},
                        {title: 'Description', data: 'description', name: 'description'},
                        {title: 'Status', data: 'status', name: 'status'},
                        {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    order: [[0, 'desc']]
                });
            }

            // Handle create voucher modal
            function setupCreateVoucher() {
                $('#createNewVouchers').click(function () {
                    $('#saveBtn').val("create-vouchers");
                    $('#voucher_id').val('');
                    $('#voucherForm').trigger("reset");
                    $('#modelHeading').html("Create New Vouchers");
                    $('#isActiveCode').hide();
                    $('#ajaxModel').modal('show');
                });
            }

            // Handle form submission
            function handleFormSubmission() {
                $('#voucherForm').on('submit', function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    formData.append('id', $('#voucher_id').val());
                    $('#saveBtn').html('Sending...');

                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.vouchers.store') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function () {
                            $('#ajaxModel').modal('hide');
                            $('#dataVouchers').DataTable().draw(false);
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
            }

            // Handle edit voucher
            function setupEditVoucher() {
                $('body').on('click', '.edit', function () {
                    var voucher_id = $(this).attr('id');
                    $.get("{{ route('admin.vouchers.index') }}" + '/' + voucher_id + '/edit', function (data) {
                        $('#modelHeading').html("Edit Vouchers");
                        $('#saveBtn').val("edit-vouchers");
                        $('#ajaxModel').modal('show');
                        $('#isActiveField').show();
                        $('#voucher_id').val(data.id);
                        $('#voucher_code').val(data.voucher_code);
                        $('#is_active').val(data.status);
                        $('#name').val(data.name);
                        $('#code').val(data.voucher_code);
                        $('#quantity').val(data.quantity);
                        $('#discount_amount').val(data.discount_amount);
                        $('#valid_from').val(data.valid_from);
                        $('#valid_until').val(data.valid_until);
                        $('#description').val(data.description);
                        $('#isActiveCode').show();
                    });
                });
            }

            // Handle delete voucher
            function setupDeleteVoucher() {
                $('body').on('click', '.delete', function () {
                    var voucher_id = $(this).attr("id");
                    var url = "{{ route('admin.vouchers.destroy', ':id') }}".replace(':id', voucher_id);

                    if (confirm("Are You sure want to delete !")) {
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE"
                            },
                            success: function () {
                                $('#dataVouchers').DataTable().draw(false);
                            }
                        });
                    }
                });
            }

            // Initialize all functions
            function init() {
                setupAjaxHeaders();
                initializeDataTable();
                setupCreateVoucher();
                handleFormSubmission();
                setupEditVoucher();
                setupDeleteVoucher();
            }

            // Run initialization
            init();
        });
    </script>
@endsection

