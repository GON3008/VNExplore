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
                    {title: 'Image', data: 'room_image', name: 'room_image'},
                    {title: 'Ratting', data: 'room_ratting', name: 'room_ratting'},
                    {title: 'Available', data: 'refund_available', name: 'refund_available'},
                    {title: 'Deadline', data: 'refund_deadline', name: 'refund_deadline'},
                    {title: 'Guest', data: 'guest', name: 'guest'},
                    {title: 'Bed Type', data: 'bed_type', name: 'bed_type'},
                ]
            })
        })
    </script>
@endsection
