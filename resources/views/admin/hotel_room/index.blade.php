@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Hotel Rooms</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewRoom">Create New Room</a>
        </div>
        <table class="table table-bordered data-table" id="dataRooms"></table>
    </div>

    <div class="modal-form">
        @include('admin.hotel_room.modal_form')
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function (){
            $.ajaxSetup({
                header:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataRooms").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.rooms.index') }}",
                columns: [
                    {title: 'Id', data: 'id', name: 'id'},
                    {title: 'Name', data: 'room_name', name: 'room_name'},
                    {title: 'Price', data: 'room_price', name: 'room_price'},
                    {title: 'Discount', data: 'room_discount', name: 'room_discount'},
                    // {title: 'Image', data: 'room_image', name: 'room_image'},
                    {
                        title: 'Rating',
                        data: 'room_rating',
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
                    {title: 'Available', data: 'refund_available', name: 'refund_available'},
                    {title: 'Deadline', data: 'refund_deadline', name: 'refund_deadline'},
                    {title: 'Guest', data: 'guests', name: 'guests'},
                    {title: 'Bed Type', data: 'bed_type', name: 'bed_type'},
                    {title: 'Status', data: 'room_status', name: 'room_status'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
        })
    </script>
@endsection
