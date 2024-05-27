@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <h2>Categories</h2>
        <a href="javascript:void(0)" class="btn btn-success" id="createNewCategory">Create New Category</a>
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    @include('admin.categories.modal_form')

    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.categories.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'image', name: 'image', render: function(data, type, full, meta) {
                            return data ? '<img src="/images/' + data + '" height="50"/>' : '';
                        }},
                    {data: 'status', name: 'status', render: function(data, type, full, meta) {
                            return data ? 'Active' : 'Inactive';
                        }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createNewCategory').click(function () {
                $('#saveBtn').val("create-category");
                $('#category_id').val('');
                $('#categoryForm').trigger("reset");
                $('#modelHeading').html("Create New Category");
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.edit', function () {
                var category_id = $(this).attr('id');
                $.get("{{ route('admin.categories.index') }}" +'/' + category_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Category");
                    $('#saveBtn').val("edit-category");
                    $('#ajaxModel').modal('show');
                    $('#category_id').val(data.id);
                    $('#name').val(data.name);
                    $('#slug').val(data.slug);
                    $('#status').val(data.status);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');

                var formData = new FormData($('#categoryForm')[0]);

                $.ajax({
                    data: formData,
                    url: "{{ route('admin.categories.store') }}",
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#categoryForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        $('#saveBtn').html('Save Changes');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.delete', function () {
                var category_id = $(this).attr('id');
                if(confirm("Are you sure want to delete this category?")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.categories.store') }}"+'/'+category_id,
                        success: function (data) {
                            table.draw();
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
