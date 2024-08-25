<div class="tab-pane" id="tour_location">
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewTourLocation">Add Tour Location</a>
    </div>
    <table class="table table-bordered data-table" id="tourLocationData"></table>
    <div class="modal-form">
        @include('admin.locations.tour_location.modal_form')
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataTable('#tourLocationData', "{{ route('admin.tourLocations.index') }}");

            function loadDataTable(tableId, ajaxUrl) {
                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: ajaxUrl,
                    columns: [
                        {title: 'ID', data: 'id', name: 'id'},
                        {title: 'Tour City', data: 'tour_city', name: 'tour_city'},
                        {title: 'Tour Country', data: 'tour_country', name: 'tour_country'},
                        {title: 'Tour District', data: 'tour_district', name: 'tour_district'},
                        {title: 'Tour Ward', data: 'tour_ward', name: 'tour_ward'},
                        {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']],
                    "autoWidth": false
                });
            }

            $('#createNewTourLocation').click(function () {
                $('#saveBtn').val("create-tourLocation");
                $('#tourLocation_id').val('');
                $('#tour_categoriesForm').trigger("reset");
                $('#modelHeadingTour').html("Create New Tour Location");
                $('#ajaxModelTour').modal('show');
                $('#isActiveField').hide();
            });

            $('#tour_categoriesForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#tourLocation_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.tourLocations.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModelTour').modal('hide');
                        var onTable = $('#tourLocationData').DataTable();
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

            $('body').on('click', '.edit-tour', function (){
                var tourLocation_id = $(this).attr('id');
                $.get("{{ route('admin.tourLocations.index') }}" + '/' + tourLocation_id + '/edit', function (data) {
                    $('#modelHeadingTour').html("Edit Tour Location");
                    $('#saveBtn').val("edit-tourLocation");
                    $('#ajaxModelTour').modal('show');
                    $('#tourLocation_isActiveField').show();
                    $('#tourLocation_id').val(data.id);
                    $('#tourLocation_isActive').val(data.status);
                    $('#tourLocation_name').val(data.name);
                    $('#tourLocation_description').val(data.description);
                });
            });

            $('body').on('click', '.delete-tour', function (){
                var tourLocation_id = $(this).attr("id");
                var url = "{{ route('admin.tourLocations.destroy', ':id') }}";
                url = url.replace(':id', tourLocation_id);

                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        success: function (data) {
                            var onTable = $('#tourLocationData').DataTable();
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
