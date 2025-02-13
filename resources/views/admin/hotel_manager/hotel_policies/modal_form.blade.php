<div class="modal fade" id="ajaxModel_hp" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading_hp"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="hp_form" name="hp_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="hp_id" id="hp_id">
                    <div class="form-group">
                        <label for="hp_cancellation_fee" class="col-sm-3 control-label">Cancellation Fee</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="hp_cancellation_fee" name="hp_cancellation_fee"
                                   placeholder="Enter Cancellation Fee"
                                   value="" maxlength="100"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_booking_fee" class="col-sm-3 control-label">Booking Fee</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="hp_booking_fee" name="hp_booking_fee"
                                   placeholder="Enter Booking Fee"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_free_cancellation_days" class="col-sm-4 control-label">Free Cancellation
                            Days</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   name="hp_free_cancellation_days" id="hp_free_cancellation_days"
                                   placeholder="Enter free cancellation days">
                            <span class="text-danger" id="free_cancellation_day"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_early_checkin_fee" class="col-sm-3 control-label">Early Checkin</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="hp_early_checkin_fee"
                                   name="hp_early_checkin_fee"
                                   placeholder="Enter early checkin fee"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id=""></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_late_checkout_fee" class="col-sm-4 control-label">Late Checkout</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="hp_late_checkout_fee"
                                   name="hp_late_checkout_fee"
                                   placeholder="Enter late checkout fee"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id=""></span>
                        </div>
                    </div>

                    <div class="form-group" id="show_checkin_ro" style="display: none">
                        <label for="hp_checkin_time" class="col-sm-3 control-label">Checkin Room</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="hp_checkin_time"
                                   name="hp_checkin_time">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="show_checkout_ro" style="display: none">
                        <label for="hp_checkout_time" class="col-sm-3 control-label">Checkout Room</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="hp_checkout_time"
                                   name="hp_checkout_time">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="show_is_featured">
                        <label for="hp_is_free_cancellation" class="col-sm-4 control-label">Free Cancellation</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hp_is_free_cancellation" name="hp_is_free_cancellation">
                                <option value="0">No free cancellation</option>
                                <option value="1">Free cancellation</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_allows_pets" class="col-sm-3 control-label">Allows Pets</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hp_allows_pets" name="hp_allows_pets">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_allows_smoking" class="col-sm-3 control-label">Allows Smoking</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hp_allows_smoking" name="hp_allows_smoking">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_is_child_friendly" class="col-sm-3 control-label">Child Friendly</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hp_is_child_friendly" name="hp_is_child_friendly">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_hotel_room_id" class="col-sm-5 control-label">Hotel Room</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hp_hotel_room_id" name="hp_hotel_room_id">
                                <option>Select Hotel Room</option>
                                @foreach($hotelRoom as $room)
                                    <option value="{{$room->id}}">{{$room->room_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_payment_policy" class="col-sm-4 control-label">Payment Policy</label>
                        <div class="col-sm-12">
                            <textarea id="editor" class="form-control editor ckeditor"
                                      name="hp_payment_policy"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hp_policy_notes" class="col-sm-4 control-label">Policy Notes</label>
                        <div class="col-sm-12">
                            <textarea id="editor" class="form-control editor ckeditor"
                                      name="hp_policy_notes"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10 pt-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--<script>--}}
{{--    document.getElementById("hp_free_cancellation_days").addEventListener("input", function () {--}}
{{--        this.value = this.value.replace(/[^0-9]/g, '');--}}
{{--        if (this.value !== "") {--}}
{{--            let num = parseInt(this.value, 10);--}}
{{--            if (num < 1) this.value = 1;--}}
{{--            if (num > 10) this.value = 10;--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}



