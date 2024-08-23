<div class="tab-pane" id="flight_category">
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewFlightCategory">Add Flight Category</a>
    </div>
    <table class="table table-bordered data-table" id="flightCategoryData"></table>
    <div class="modal-form">
        @include('admin.categories.flights.modal_form')
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataTable('#flightCategoryData', "{{ route('admin.flightCategories.index') }}");

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

            $('#createNewFlightCategory').click(function () {
                $('#saveBtn').val("create-flightCategory");
                $('#flightCategory_id').val('');
                $('#flight_categoriesForm').trigger("reset");
                $('#modelHeadingFlight').html("Create New Flight Category");
                $('#ajaxModelFlight').modal('show');
                $('#isActiveField').hide();
            });

            $('#flight_categoriesForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#flightCategory_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.flightCategories.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModelFlight').modal('hide');
                        var onTable = $('#flightCategoryData').DataTable();
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
        });
    </script>
@endpush
