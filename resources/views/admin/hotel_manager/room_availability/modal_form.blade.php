<div class="modal fade" id="ajaxModel_ra" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading_ra"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="ra_form" name="ra_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ra_id" id="ra_id">

                    <div class="form-group">
                        <label for="room_option_id" class="col-sm-5 control-label">Room Option</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="room_option_id" name="room_option_id">
                                @php
                                    $hasData = false;
                                @endphp
                                <option>Select Room Option Id</option>
                                @foreach($roomOptionsForAvail as $option)
                                    @if ($option->ro_deleted == 1)
                                        <option value="{{$option->id}}">ID: {{$option->id}}</option>
                                        @php
                                            $hasData = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @if (!$hasData)
                                    <option disabled>No room options available</option>
                                @endif
                            </select>
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="available_rooms" class="col-sm-3 control-label">Availability</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="available_rooms" name="available_rooms"
                                   placeholder="Enter" readonly
                                   value="" maxlength="100"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="booked_rooms" class="col-sm-3 control-label">Booked</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="booked_rooms" name="booked_rooms"
                                   placeholder="Enter"
                                   value="" maxlength="100"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="maintenance_rooms" class="col-sm-3 control-label">Maintenance</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="maintenance_rooms" name="maintenance_rooms"
                                   placeholder="Enter"
                                   value="" maxlength="100"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unavailable_rooms" class="col-sm-3 control-label">Unavailable</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="unavailable_rooms" name="unavailable_rooms"
                                   placeholder="Enter"
                                   value="" maxlength="100"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date"
                                   name="date">
                            <span class="text-danger" id="room_discount_error"></span>
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




