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
                $('#saveBtn').val("create-users");
                $('#user_id').val('');
                $('#userForm').trigger("reset");
                $('#modelHeading').html("Create New Flight Category");
                $('#ajaxModel').modal('show');
                $('#isActiveField').hide();
                $('#passwordShow').show();
            });
        });
    </script>
@endpush
