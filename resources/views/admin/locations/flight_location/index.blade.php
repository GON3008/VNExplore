<div class="tab-pane" id="flight_location">
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewFlightLocation">Add Flight Location</a>
    </div>
    <table class="table table-bordered data-table" id="flightLocationData"></table>
    <div class="modal-form">
        @include('admin.locations.flight_location.modal_form')
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataTable('#flightLocationData', "{{ route('admin.flightLocations.index') }}");

            function loadDataTable(tableId, ajaxUrl) {
                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: ajaxUrl,
                    columns: [
                        {title: 'ID', data: 'id', name: 'id'},
                        {title: 'Flight Country', data: 'flight_country', name: 'flight_country'},
                        {title: 'Flight City', data: 'flight_city', name: 'flight_city'},
                        {title: 'Flight District', data: 'flight_district', name: 'flight_district'},
                        {title: 'Flight Ward', data: 'flight_ward', name: 'flight_ward'},
                        {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']],
                    "autoWidth": false
                });
            }

            $('#createNewFlightLocation').click(function () {
                $('#saveBtn').val("create-flightLocation");
                $('#flightLocation_id').val('');
                $('#flight_categoriesForm').trigger("reset");
                $('#modelHeadingFlight').html("Create New Flight Location");
                $('#ajaxModelFlight').modal('show');
                $('#isActiveField').hide();
            });

            $('#flight_locationForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#flightLocation_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.flightLocations.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModelFlight').modal('hide');
                        var onTable = $('#flightLocationData').DataTable();
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

            $('body').on('click', '.edit-flight', function (){
                var flightLocation_id = $(this).attr('id');
                $.get("{{ route('admin.flightLocations.index') }}" + '/' + flightLocation_id + '/edit', function (data) {
                    $('#modelHeadingFlight').html("Edit Flight Location");
                    $('#saveBtn').val("edit-flightLocation");
                    $('#ajaxModelFlight').modal('show');
                    $('#flightLocation_isActiveField').show();
                    $('#flightLocation_id').val(data.id);
                    $('#flight_country').val(data.flight_country);
                    $('#flight_city').val(data.flight_city);
                    $('#flight_district').val(data.flight_district);
                    $('#flight_ward').val(data.flight_ward);
                });
            });

            $('body').on('click', '.delete-flight', function (){
                var flightLocation_id = $(this).attr("id");
                var url = "{{ route('admin.flightLocations.destroy', ':id') }}";
                url = url.replace(':id', flightLocation_id);

                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        success: function (data) {
                            var onTable = $('#flightLocationData').DataTable();
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

