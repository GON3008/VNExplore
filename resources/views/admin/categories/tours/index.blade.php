<div class="tab-pane show active" id="tour_category">
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewTourCategory">Add Tour Category</a>
        <form action="" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <input type="file" name="file" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-2">Import Tour Categories</button>
        </form>
    </div>
    <table class="table table-bordered data-table" id="tourCategoryData"></table>

    <div class="modal-form">
        @include('admin.categories.tours.modal_form')
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataTable('#tourCategoryData', "{{ route('admin.tourCategories.index') }}");

            function loadDataTable(tableId, ajaxUrl) {
                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: ajaxUrl,
                    columns: [
                        {title: 'ID', data: 'id', name: 'id'},
                        {title: 'Name', data: 'name', name: 'name'},
                        {title: 'Description', data: 'description', name: 'description'},
                        {title: 'Status', data: 'status', name: 'status'},
                        {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']],
                    "autoWidth": false
                });
            }
            $('#createNewTourCategory').click(function () {
                $('#saveBtn').val("create-tourCategory");
                $('#tourCategory_id').val('');
                $('#tour_categoriesForm').trigger("reset");
                $('#modelHeadingTour').html("Create New Tour Category");
                $('#ajaxModelTour').modal('show');
                $('#isActiveField').hide();
            });

            $('#tour_categoriesForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#tourCategory_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.tourCategories.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModelTour').modal('hide');
                        var onTable = $('#tourCategoryData').DataTable();
                        onTable.draw(false);
                    },

                    error: function (xhr) {
                        if(xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            if(errors.name) {
                                $('#name_error').text(errors.name[0]);
                            }
                            // Handle other potential errors in a similar manner
                        }
                        $('#saveBtn').html('Save changes');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $('body').on('click', '.edit', function () {
                var tourCategory_id = $(this).attr('id');
                $.get("{{ route('admin.tourCategories.index') }}" + '/' + tourCategory_id + '/edit', function (data) {
                    $('#modelHeadingTour').html("Edit Tour Category");
                    $('#saveBtn').val("edit-tourCategory");
                    $('#ajaxModelTour').modal('show');
                    $('#isActiveField').show();
                    $('#tourCategory_id').val(data.id);
                    $('#is_active').val(data.status);
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                })
            });

            $('body').on('click', '.delete', function (){
                var tourCategory_id = $(this).attr("id");
                var url = "{{ route('admin.tourCategories.destroy', ':id') }}";
                url = url.replace(':id', tourCategory_id);

                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        success: function (data) {
                            var onTable = $('#tourCategoryData').DataTable();
                            onTable.draw(false);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    })
                }
            });
        });
    </script>
@endpush
