<div class="modal fade" id="ajaxModel_rd" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading_rd"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="rd_form" name="rd_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="rd_id" id="rb_id">

                    <div class="form-group">
                        <label for="rd_number" class="col-sm-3 control-label">Room Number</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="rd_number"
                                   name="room_number" placeholder="Enter Room Number" value="" maxlength="5">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="show_is_status">
                        <label for="rd_status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="rd_status" name="status">
                                @foreach(['Available','Booked','Maintenance','Unavailable'] as $rd_status)
                                    <option
                                        value="{{ $rd_status }}" {{ isset($room_details) && $room_details->availability_status == $rd_status ? 'selected' : '' }}>
                                        {{ ucfirst($rd_status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rb_option" class="col-sm-5 control-label">Room Option</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="rd_option" name="room_option_id">
                                @php
                                    $hasData = false;
                                @endphp
                                <option>Select Room Option Id</option>
                                @foreach($roomOption as $option)
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

                    <div class="col-sm-offset-2 col-sm-10 pt-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




