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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataVouchers").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.vouchers.index') }}",
                columns: [
                    {title: 'Id', data: 'id', name: 'id'},
                    {title: 'Name', data: 'name', name: 'name'},
                    {title: 'Image', data: 'image', name: 'image', orderable: false},
                    {title: 'Code', data: 'code', name: 'code'},
                    {title: 'Quantity', data: 'quantity', name: 'quantity'},
                    {title: 'Discount', data: 'discount_amount', name: 'discount_amount'},
                    {title: 'Start time', data: 'valid_from', name: 'valid_from'},
                    {title: 'End time', data: 'valid_until', name: 'valid_until'},
                    {title: 'Description', data: 'description', name: 'description'},
                    {title: 'Status', data: 'active', name: 'active'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']]
            });

            $('#createNewVouchers').click(function () {
                $('#saveBtn').val("create-vouchers");
                $('#voucher_id').val('');
                $('#voucherForm').trigger("reset");
                $('#modelHeading').html("Create New Vouchers");
                $('#ajaxModel').modal('show');
            });


            $('#loginForm').on('submit', function (e) {

                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: route('admin.vouchers.store'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#dataVouchers').DataTable();
                        onTable.draw(false);
                        $('#saveBtn').html('Save Changes');
                        $('#saveBtn').attr("disabled", false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                        $('#saveBtn').attr("disabled", false);

                        if (data.responseJSON.errors) {
                            var errors = data.responseJSON.errors;
                            $('#name_error').html(errors.name);
                        }
                    }
                });
            });

        });

    </script>
@endsection
