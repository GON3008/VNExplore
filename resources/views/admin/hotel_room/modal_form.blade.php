
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
                <form id="flightForm" name="flightForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="flight_id" id="flight_id">
                    <input type="hidden" name="flight_code" id="flight_code">

                    <div class="form-group">
                        <label for="room_name" class="col-sm-3 control-label">Room Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Enter Name"
                                   value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_price" class="col-sm-2 control-label">Room Price</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="room_price" name="room_price" placeholder="Enter Price"
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
                        <label for="departure_date" class="col-sm-3 control-label">Start Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="departure_date" name="departure_date"
                                   placeholder="Enter Start Date">
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="return_date" class="col-sm-3 control-label">End Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="return_date" name="return_date"
                                   placeholder="Enter End Date">
                            <span class="text-danger" id="return_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="departure_time" class="col-sm-3 control-label">Start Time</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="departure_time" name="departure_time"
                                   placeholder="Enter End Date">
                            <span class="text-danger" id="departure_time_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="return_time" class="col-sm-3 control-label">End Time</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control border-1" id="return_time" name="return_time"
                                   placeholder="Enter End Time">
                            <span class="text-danger" id="return_time_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotel_category_id" class="col-sm-5 control-label">Hotel Category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hotel_category_id" name="hotel_category_id">
                                <option>Select Hotel Category</option>
                                @foreach($hotelCategory as $category)
                                    <option value="{{$category->id}}">{{$category->name}}}</option>
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
                                    <option value="{{$location->id}}">{{$location->hotel_country}}-{{$location->hotel_city}}</option>
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
                                            Service:  {{ $services->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger" id="return_time_error"></span>
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

<script type="text/javascript">
    var today = new Date().toISOString().split('T')[0];

    document.getElementById("departure_date").setAttribute("min", today);
    document.getElementById("return_date").setAttribute("min", today);
    $('#departure_time').timepicker({
        uiLibrary: 'bootstrap5'
    });
    $('#return_time').timepicker({
        uiLibrary: 'bootstrap5'
    });
</script>
