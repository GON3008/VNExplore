<div class="tab-pane" id="hotel_location">
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewHotelLocation">Add Hotel Location</a>
    </div>
    <table class="table table-bordered data-table" id="hotelLocationData"></table>
    <div class="modal-form">
        @include('admin.locations.hotel_location.modal_form')
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataTable('#hotelLocationData', "{{ route('admin.hotelLocations.index') }}");

            function loadDataTable(tableId, ajaxUrl) {
                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: ajaxUrl,
                    columns: [
                        {title: 'ID', data: 'id', name: 'id'},
                        {title: 'Hotel Country', data: 'hotel_country', name: 'hotel_country'},
                        {title: 'Hotel City', data: 'hotel_city', name: 'hotel_city'},
                        {title: 'Hotel District', data: 'hotel_district', name: 'hotel_district'},
                        {title: 'Hotel Ward', data: 'hotel_ward', name: 'hotel_ward'},
                        {title: 'Image', data: 'hotelLocation_img', name: 'hotelLocation_img'},
                        {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']],
                    "autoWidth": false
                });
            }

            $('#createNewHotelLocation').click(function () {
                $('#saveBtn').val("create-hotelLocation");
                $('#hotelLocation_id').val('');
                $('#hotel_locationForm').trigger("reset");
                $('#modelHeadingHotel').html("Create New Hotel Location");
                $('#ajaxModelHotel').modal('show');
                $('#isActiveField').hide();
            });

            $('#hotel_locationForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#hotelLocation_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.hotelLocations.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModelHotel').modal('hide');
                        var onTable = $('#hotelLocationData').DataTable();
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

            $('body').on('click', '.edit-hotel', function (){
                var hotelLocation_id = $(this).attr('id');
                $.get("{{ route('admin.hotelLocations.index') }}" + '/' + hotelLocation_id + '/edit', function (data) {
                    $('#modelHeadingHotel').html("Edit Hotel Location");
                    $('#saveBtn').val("edit-hotelLocation");
                    $('#ajaxModelHotel').modal('show');
                    $('#hotelLocation_isActiveField').show();
                    $('#hotelLocation_id').val(data.id);
                    $('#hotel_country').val(data.hotel_country);
                    $('#hotel_city').val(data.hotel_city);
                    $('#hotel_district').val(data.hotel_district);
                    $('#hotel_ward').val(data.hotel_ward);
                    $('#hotelLocation_img').val(data.hotelLocation_img);
                });
            });

            $('body').on('click', '.delete-hotel', function (){
                var hotelLocation_id = $(this).attr("id");
                var url = "{{ route('admin.hotelLocations.destroy', ':id') }}";
                url = url.replace(':id', hotelLocation_id);

                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        success: function (data) {
                            var onTable = $('#hotelLocationData').DataTable();
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

