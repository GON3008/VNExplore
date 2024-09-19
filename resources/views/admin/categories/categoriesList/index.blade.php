<div class="tab-pane show active" id="list_category">
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewCategory">Create New Category</a>
    </div>
    <table class="table table-bordered data-table" id="dataListCategories"></table>
    <div class="modal-form">
        @include('admin.categories.categoriesList.modal_form')
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataListCategories").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.listCategories.index') }}",
                columns: [
                    {title: 'ID', data: 'id', name: 'id'},
                    {title: 'Name', data: 'name', name: 'name'},
                    {title: 'Description', data: 'description', name: 'description'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']],
                "autoWidth": false,
            });

            $('#createNewCategory').click(function () {
                $('#saveBtn').val("create-category");
                $('#category_id').val('');  // Clear the id field
                $('#listCategoryForm').trigger("reset");
                $('#modelHeading_listCategory').html("Create New Category");
                $('#ajaxMode_listCategory').modal('show');
            });

            $('#listCategoryForm').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                // $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.listCategories.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxMode_listCategory').modal('hide');
                        var onTable = $('#dataListCategories').DataTable();
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

            $('body').on('click', '.edit-listCategory', function () {
                var category_id = $(this).attr('id');
                $.get("{{ route('admin.listCategories.index') }}" + '/' + category_id + '/edit', function (data) {
                    $('#modelHeading_listCategory').html("Edit Category");
                    $('#saveBtn').val("edit-category");
                    $('#ajaxMode_listCategory').modal('show');
                    $('#category_id').val(data.id);
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                });
            });

            $('body').on('click', '.delete-listCategory', function () {
                var category_id = $(this).attr("id");
                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.listCategories.destroy', '') }}/" + category_id,
                        success: function (data) {
                            var onTable = $('#dataListCategories').DataTable();
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
