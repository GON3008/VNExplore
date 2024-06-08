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
                    {title: 'Slug', data: 'slug', name: 'slug'},
                    {title: 'Image', data: 'image', name: 'image'},
                    {title: 'Status', data: 'status', name: 'status'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']]
            });

            $('#createNewCategory').click(function () {
                $('#saveBtn').val("create-category");
                $('#category_id').val('');
                $('#categoryForm').trigger("reset");
                $('#modelHeading').html("Create New Category");
                $('#ajaxModel').modal('show');
            });

            $('#categoryForm').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                $('#saveBtn').html('Sending..');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.categories.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#categoryForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtn').html('Save changes');
                        $("#dataCategories").DataTable().ajax.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save changes');
                    }
                });
            });
        });
    </script>
@endsection
