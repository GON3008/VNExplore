<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="roomForm" name="roomForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="room_id" id="room_id">
                    <div class="form-group">
                        <label for="room_number" class="col-sm-3 control-label">Room Number</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="room_number" name="room_number"
                                   placeholder="Enter Room Number"
                                   value="" maxlength="5">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_name" class="col-sm-3 control-label">Room Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="room_name" name="room_name"
                                   placeholder="Enter Name"
                                   value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_price" class="col-sm-2 control-label">Room Price</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="room_price" name="room_price"
                                   placeholder="Enter Price"
                                   value="" maxlength="100"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_discount" class="col-sm-3 control-label">Room Discount</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="room_discount" name="room_discount"
                                   placeholder="Enter Discount"
                                   oninput="this.value = this.value.toLowerCase();">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_rating" class="col-sm-3 control-label">Room Rating</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="room_rating" name="room_rating">
                                <option value="0">Select Room Rating</option>
                                <option value="1">⭐</option>
                                <option value="2">⭐⭐</option>
                                <option value="3">⭐⭐⭐</option>
                                <option value="4">⭐⭐⭐⭐</option>
                                <option value="5">⭐⭐⭐⭐⭐</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bed_type" class="col-sm-4 control-label">Bed Type</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="bed_type" name="bed_type" required>
                                <option value="">Select Bed Type</option>
                                @foreach(['King', 'Queen', 'Twin'] as $bed_type)
                                    <option
                                        value="{{ $bed_type }}" {{ isset($hotelRooms) && $hotelRooms->availability_status == $bed_type ? 'selected' : '' }}>
                                        {{ ucfirst($bed_type) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="guests" class="col-sm-4 control-label">Guests</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="guests" name="guests" required>
                                <option value="">Select Guests</option>
                                @foreach(['1','2','3','4','5','6','7','8','9','10'] as $guests)
                                    <option
                                        value="{{ $guests }}" {{ isset($hotelRooms) && $hotelRooms->availability_status == $guests ? 'selected' : '' }}>
                                        {{ ucfirst($guests) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="availability" style="{{isset($hotelRooms) ? 'block':'none'}}">
                        <label for="availability_status" class="col-sm-4 control-label">Availability Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="availability_status" name="availability_status" required>
                                <option value="">Select Availability</option>
                                @foreach(['Available', 'Booked', 'Maintenance'] as $availability)
                                    <option
                                        value="{{ $availability }}" {{ (isset($hotelRooms) && $hotelRooms->availability_status == $availability) ||
                                        (isset($hotelRooms) && $availability == 'Available') ? 'selected' : '' }}>
                                        {{ ucfirst($availability) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="cleaning" style="{{isset($hotelRooms) ? 'block':'none'}}">
                        <label for="cleaning_status" class="col-sm-4 control-label">Cleaning Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="cleaning_status" name="cleaning_status" required>
                                <option value="">Select CLS</option>
                                @foreach(['Cleaned', 'Not Cleaned', 'In Progress'] as $clear)
                                    <option
                                        value="{{ $clear }}" {{ (isset($hotelRooms) && $hotelRooms->cleaning_status == $clear) ||
                                        (isset($hotelRooms) && $clear == 'cleaned')? 'selected' : '' }}>
                                        {{ ucfirst($clear) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotel_category_id" class="col-sm-5 control-label">Hotel Category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hotelCategory_id" name="hotel_category_id">
                                <option>Select Hotel Category</option>
                                @foreach($hotelCategory as $category)
                                    <option value="{{$category->id}}">{{$category->hotelCategory_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotel_location_id" class="col-sm-5 control-label">Hotel Location</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hotel_location_id" name="hotel_location_id">
                                <option>Select Location</option>
                                @foreach($hotelLocation as $location)
                                    <option value="{{$location->id}}">{{$location->hotel_country}}
                                        -{{$location->hotel_city}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotel_service_id" class="col-sm-3 control-label">Hotel Service</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hotel_service_id" name="hotel_service_id">
                                <option value="0">Select Service</option>
                                @foreach($hotelService as $services)
                                    @if($services->status==1)
                                        <option value="{{ $services->id }}">
                                            Service: {{ $services->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger" id="return_time_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_type_id" class="col-sm-3 control-label">Room Type</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="room_type_id" name="room_type_id">
                                <option value="0">Select Room Type</option>
                                @foreach($roomType as $type)
                                    <option value="{{$type->id}}">{{$type->room_type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_images" class="col-sm-3 control-label">Room Image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control border-1" id="room_images" name="room_images[]">
                            <span class="text-danger"></span>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10 pt-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{--<script type="text/javascript">--}}
{{--    var today = new Date().toISOString().split('T')[0];--}}

{{--    document.getElementById("departure_date").setAttribute("min", today);--}}
{{--    document.getElementById("return_date").setAttribute("min", today);--}}
{{--    $('#departure_time').timepicker({--}}
{{--        uiLibrary: 'bootstrap5'--}}
{{--    });--}}
{{--    $('#return_time').timepicker({--}}
{{--        uiLibrary: 'bootstrap5'--}}
{{--    });--}}
{{--</script>--}}
