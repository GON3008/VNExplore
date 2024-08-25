<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
                        <label for="name" class="col-sm-3 control-label">Flight Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                   value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price"
                                   value="" maxlength="100"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price_discount" class="col-sm-3 control-label">Price Discount</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="price_discount" name="price_discount"
                                   placeholder="Enter Discount"
                                   oninput="this.value = this.value.toLowerCase();">
                            <span class="text-danger" id="price_discount_error"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="flight_number" class="col-sm-3 control-label">Flight Number</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="flight_number" name="flight_number"
                                   placeholder="Enter Flight Number">
                            <span class="text-danger" id="flight_number_error"></span>
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

{{--                    <div class="form-group">--}}
{{--                        <label for="location_departure_id" class="col-sm-3 control-label">Location Departure</label>--}}
{{--                        <div class="col-sm-12">--}}
{{--                            <select class="form-control" id="location_departure_id" name="location_departure_id">--}}
{{--                                <option>Select Location Departure</option>--}}
{{--                                @foreach($locations as $location)--}}
{{--                                    <option value="{{$location->id}}">{{$location->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <span class="text-danger" id="departure_date_error"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="location_arrival_id" class="col-sm-3 control-label">Location Arrival</label>--}}
{{--                        <div class="col-sm-12">--}}
{{--                            <select class="form-control" id="location_arrival_id" name="location_arrival_id">--}}
{{--                                <option>Select Location Arrival--}}
{{--                                @foreach($locations as $location)--}}
{{--                                    <option value="{{$location->id}}">{{$location->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <span class="text-danger" id="departure_date_error"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="category_id" class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="category_id" name="category_id">
                                <option>Select Category</option>
                                @foreach($flightCategories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
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
