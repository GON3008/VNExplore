<div class="tab-pane" id="hotel_category">
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewHotelCategory">Add Hotel Category</a>
    </div>
    <table class="table table-bordered data-table" id="hotelCategoryData"></table>
    <div class="modal_form">
        @include('admin.categories.hotels.modal_form')
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataTable('#hotelCategoryData', "{{ route('admin.hotelCategories.index') }}");

            function loadDataTable(tableId, ajaxUrl) {
                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: ajaxUrl,
                    columns: [
                        {title: 'ID', data: 'id', name: 'id'},
                        {title: 'Name', data: 'hotelCategory_name', name: 'name'},
                        {
                            title: 'Image',
                            data: 'hotelCategory_images',
                            name: 'images',
                        },
                        {
                            title: 'Rating',
                            data: 'hotelCategory_rating',
                            name: 'rating',
                            render: function(data) {
                                let stars = '';
                                for (let i = 1; i <= 5; i++) {
                                    if (i <= data) {
                                        stars += '<i class="fas fa-star" style="color: gold"></i>'; // full star icon
                                    } else {
                                        stars += '<i class="far fa-star" style="color: gold"></i>'; // empty star icon
                                    }
                                }
                                return stars;
                            }
                        },
                        {title: 'Category', data: 'category.name', name: 'category.name'},
                        {
                            title:'Location',
                            data:'location.hotel_country',
                            name:'location.hotel_country',
                            render: function (data,type,row){
                                return row.location.hotel_country+','+row.location.hotel_city+','+row.location.hotel_district;
                            }
                        },
                        {title: 'Status', data: 'hotelCategory_status', name: 'status'},
                        {title: 'Description', data: 'hotelCategory_description', name: 'description'},
                        {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']],
                    "autoWidth": false
                });
            }


            $('#createNewHotelCategory').click(function () {
                $('#saveBtn').val("create-hotelCategory");
                $('#hotelCategory_id').val('');
                $('#hotel_categoriesForm').trigger("reset");
                $('#modelHeadingHotel').html("Create New Hotel Category");
                $('#ajaxModelHotel').modal('show');
                $('#hotelCategory_isActiveField').hide();
                $('#isActiveField').hide();
            });

            $('#hotel_categoriesForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#hotelCategory_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.hotelCategories.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModelHotel').modal('hide');
                        var onTable = $('#hotelCategoryData').DataTable();
                        onTable.draw(false);
                    },

                    error: function (xhr) {
                        if(xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            if(errors.name) {
                                $('#name_error').text(errors.name[0]);
                            }
                            if(errors.image) {
                                $('#image_error').text(errors.image[0]);
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

            $('body').on('click', '.edit-hotel', function () {
                var hotelCategory_id = $(this).attr('id');
                $.get("{{ route('admin.hotelCategories.index') }}" + '/' + hotelCategory_id + '/edit', function (data) {
                    $('#modelHeadingHotel').html("Edit Hotel Categories");
                    $('#saveBtn').val("edit-hotelCategory");
                    $('#ajaxModelHotel').modal('show');
                    $('#hotelCategory_isActiveField').show();
                    $('#hotel_name').val(data.hotelCategory_name);
                    $('#hotelCategory_id').val(data.id);
                    $('#hotel_description').val(data.hotelCategory_description);
                    $('#isActive').val(data.hotelCategory_status);
                    $('#rating').val(data.hotelCategory_rating);
                    $('#listCategory_id').val(data.list_categories_id);
                    $('#hotelLocation_id').val(data.hotel_location_id);
                    $('#hotelService_id').val(data.hotel_service_id);
                    // $('#image_preview').html('');
                    // $.each(data.images, function(index, image) {
                    //     $('#image_preview').append('<img src="' + image.image_path + '" width="100px" height="100px"/>');
                    // });
                });
            });

            $('body').on('click', '.delete-hotel', function (){
                var hotelCategory_id = $(this).attr("id");
                var url = "{{ route('admin.hotelCategories.destroy', ':id') }}";
                url = url.replace(':id', hotelCategory_id);

                if (confirm("Are You sure want to delete!")) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        success: function (data) {
                            var onTable = $('#hotelCategoryData').DataTable();
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
