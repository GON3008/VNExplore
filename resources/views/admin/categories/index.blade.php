@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Categories</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewCategory">Create New Category</a>
        </div>
        <table class="table table-bordered data-table" id="dataCategories"></table>
    </div>

    @include('admin.categories.modal_form')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataCategories").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.categories.index') }}",
                columns: [
                    {title: 'ID', data: 'id', name: 'id'},
                    {title: 'Name', data: 'name', name: 'name'},
                    {title: 'Description', data: 'description', name: 'description'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']]
            });

            $('#createNewCategory').click(function () {
                $('#saveBtn').val("create-category");
                $('#category_id').val('');  // Clear the id field
                $('#categoryForm').trigger("reset");
                $('#modelHeading').html("Create New Category");
                $('#ajaxModel').modal('show');
            });

            $('#categoryForm').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                // $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.categories.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#dataCategories').DataTable();
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

            $('body').on('click', '.edit', function () {
                var category_id = $(this).attr('id');
                $.get("{{ route('admin.categories.index') }}" + '/' + category_id + '/edit', function (data) {
                    $('#modelHeading').html("Edit Category");
                    $('#saveBtn').val("edit-category");
                    $('#ajaxModel').modal('show');
                    $('#category_id').val(data.id);
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                });
            });

            $('body').on('click', '.delete', function () {
                var category_id = $(this).attr("id");
                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.categories.destroy', '') }}/" + category_id,
                        success: function (data) {
                            var onTable = $('#dataCategories').DataTable();
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
@endsection
