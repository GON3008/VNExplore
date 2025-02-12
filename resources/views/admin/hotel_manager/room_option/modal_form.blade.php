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
                <form id="ro_form" name="ro_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
{{--                    @method('PUT')--}}
                    <input type="hidden" name="ro_id" id="ro_id">

                    <div class="form-group">
                        <label for="room_price" class="col-sm-2 control-label">Room Price</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ro_price" name="ro_price"
                                   placeholder="Enter Price"
                                   value="" maxlength="100"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_discount" class="col-sm-3 control-label">Room Discount</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ro_discount" name="ro_discount"
                                   placeholder="Enter Discount"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_discount" class="col-sm-3 control-label">Room Quantity</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ro_quantity" name="ro_quantity"
                                   placeholder="Enter Discount"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                   min="1" max="100">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_discount" class="col-sm-3 control-label">Room Guest</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ro_max_guests" name="ro_max_guests"
                                   placeholder="Enter Discount"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                   min="2" max="10">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_discount" class="col-sm-4 control-label">Room Extra Bed Price</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ro_extra_bed_price" name="ro_extra_bed_price"
                                   placeholder="Enter Discount"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                   min="2" max="10">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_discount" class="col-sm-3 control-label">Room Area</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ro_area" name="ro_area"
                                   placeholder="Enter Discount"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                   min="2" max="10">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="show_checkin_ro" style="display: none">
                        <label for="room_discount" class="col-sm-3 control-label">Checkin Room</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="ro_checkin_time"
                                   name="ro_checkin_time">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="show_checkout_ro" style="display: none">
                        <label for="room_discount" class="col-sm-3 control-label">Checkout Room</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="ro_checkout_time"
                                   name="ro_checkout_time">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ro_bed_type" class="col-sm-4 control-label">Bed Type</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="ro_bed_type" name="ro_bed_type" required>
                                <option value="">Select Bed Type</option>
                                @foreach(['1 King bed', '1 Queen bed', '2 Single bed'] as $bed_type)
                                    <option
                                        value="{{ $bed_type }}" {{ isset($room_option) && $room_option->availability_status == $bed_type ? 'selected' : '' }}>
                                        {{ ucfirst($bed_type) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ro_views" class="col-sm-4 control-label">Room View</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="ro_views" name="ro_views" required>
                                <option value="">Select Views</option>
                                @foreach(['Sea view', 'City view', 'Garden view'] as $ro_views)
                                    <option
                                        value="{{ $ro_views }}" {{ isset($room_option) && $room_option->availability_status == $ro_views ? 'selected' : '' }}>
                                        {{ ucfirst($ro_views) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ro_status" class="col-sm-4 control-label">Room Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="ro_status" name="ro_status" required>
                                <option value="">Select Status</option>
                                @foreach(['Available', 'Booked', 'Maintenance', 'Unavailable'] as $ro_status)
                                    <option
                                        value="{{ $ro_status }}" {{ isset($room_option) && $room_option->availability_status == $ro_status ? 'selected' : '' }}>
                                        {{ ucfirst($ro_status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ro_hotel_category_id" class="col-sm-5 control-label">Hotel Category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="ro_hotel_category_id" name="ro_hotel_category_id">
                                <option value="">Select Hotel Category</option>
                                @foreach($hotelCategory as $category)
                                    <option value="{{ $category->id }}">{{ $category->hotelCategory_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ro_hotel_room_id" class="col-sm-5 control-label">Hotel Room</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="ro_hotel_room_id" name="ro_hotel_room_id">
                                <option>Select Hotel Room</option>
                                @foreach($hotelRoom as $room)
                                    <option value="{{$room->id}}">{{$room->room_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ro_created_by" class="col-sm-5 control-label">Created By User</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="ro_created_by" name="ro_created_by">
                                @foreach($created_by as $user)
                                    <option value="{{ $user->id }}" {{ Auth::id() == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="departure_date_error"></span>
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



