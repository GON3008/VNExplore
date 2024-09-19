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
                        {title: 'Name', data: 'name', name: 'name'},
                        {title: 'Description', data: 'description', name: 'description'},
                        {
                            title: 'Image',
                            data: 'images',
                            name: 'images',
                        },
                        {
                            title: 'Rating',
                            data: 'rating',
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
                        {title: 'Status', data: 'status', name: 'status'},
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
                    $('#hotel_name').val(data.name);
                    $('#hotelCategory_id').val(data.id);
                    $('#HotelCategory_id').val(data.category_id);
                    $('#hotel_description').val(data.description);
                    $('#isActive').val(data.status);
                    $('#rating').val(data.rating);
                    // $('#image_preview').html('');
                    // $.each(data.images, function(index, image) {
                    //     $('#image_preview').append('<img src="' + image.image_path + '" width="100px" height="100px"/>');
                    // });
                });
            });

        });
    </script>
@endpush
