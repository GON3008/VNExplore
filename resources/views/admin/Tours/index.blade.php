@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Tours</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewTour">Create New Tour</a>
        </div>
        <table class="table table-bordered data-table" id="dataTour"></table>
    </div>

    @include('admin.tours.modal_form')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataTour").DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ route('admin.tours.index') }}",
                columns: [
                    {title:'Id',data: 'id', name: 'id'},
                    {title:'Name',data: 'name', name: 'name'},
                    {title:'Slug',data: 'slug', name: 'slug'},
                    {title:'Image',data: 'image', name: 'image', orderable: false},
                    {title: 'Tour Code',data: 'tour_code', name: 'tour_code'},
                    {title:'Price',data: 'price', name: 'price'},
                    {title:'Vehicle',data: 'vehicle', name: 'vehicle'},
                    {title:'Departure Date',data: 'departure_date', name: 'departure_date'},
                    {title:'Arrival Date',data: 'return_date', name: 'return_date'},
                    {title:'Tour Time',data: 'tour_time', name: 'tour_time'},
                    {title: 'Tour From',data: 'departure', name: 'departure'},
                    {title: 'Tour To',data: 'tour_to', name: 'tour_to'},
                    {title:'Quantity',data: 'quantity', name: 'quantity'},
                    {title:'Category',data: 'category.name', name: 'category.name'},
                    {title:'Action',data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']]
            });

            $('#createNewTour').click(function () {
                $('#saveBtn').val("create-tour");
                $('#tour_id').val('');  // Clear the id field
                $('#tourForm').trigger("reset");
                $('#modelHeading').html("Create New Tour");
                $('#ajaxModel').modal('show');
            });


            $('#tourForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.tours.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#dataTour').DataTable();
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
                var tour_id = $(this).attr('id');
                $.get("{{ route('admin.tours.index') }}" + '/' + tour_id + '/edit', function (data) {
                    $('#modelHeading').html("Edit Tour");
                    $('#saveBtn').val("edit-tour");
                    $('#ajaxModel').modal('show');
                    $('#tour_id').val(data.id);
                    $('#name').val(data.name);
                    $('#slug').val(data.slug);
                    $('#tour_code').val(data.tour_code);
                    $('#price').val(data.price);
                    $('#vehicle').val(data.vehicle);
                    $('#departure_date').val(data.departure_date);
                    $('#return_date').val(data.return_date);
                    $('#tour_time').val(data.tour_time);
                    $('#departure').val(data.departure);
                    $('#tour_to').val(data.tour_to);
                    $('#quantity').val(data.quantity);
                    $('#description').val(data.description);
                    $('#category_id').val(data.category_id);
                    $('#image_preview').attr('src', data.image);

                })
            });

            $('body').on('click', '.delete', function (){
                var tour_id = $(this).attr("id");
                var url = "{{ route('admin.tours.destroy', ':id') }}";
                url = url.replace(':id', tour_id);

                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        success: function (data) {
                            var onTable = $('#dataTour').DataTable();
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
@endsection
