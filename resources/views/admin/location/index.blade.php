@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Locations</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewLocation">Create New Location</a>
        </div>
        <table class="table table-bordered data-table" id="dataLocations"></table>
    </div>

    @include('admin.location.modal_form')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataLocations").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.locations.index') }}",
                columns: [
                    {title: 'Id', data: 'id', name: 'id'},
                    {title: 'Country', data: 'name', name: 'name'},
                    {title: 'City', data: 'cities', name: 'cities'},
                    {title: 'Districts', data: 'districts', name: 'districts'},
                    {title: 'Wards', data: 'wards', name: 'wards'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']]
            });

            $('#createNewLocation').click(function () {
                $('#saveBtn').val("create-location");
                $('#location_id').val('');
                $('#locationForm').trigger("reset");
                $('#modelHeading').html("Create New Location");
                $('#ajaxModel').modal('show');
            });


            $('#loginForm').on('submit', function (e) {

                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: route('admin.locations.store'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#dataLocations').DataTable();
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
