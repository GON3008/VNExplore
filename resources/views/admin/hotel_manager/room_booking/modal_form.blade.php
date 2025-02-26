<div class="modal fade" id="ajaxModel_rb" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading_rb"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="rb_form" name="rb_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="rb_id" id="rb_id">

                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date"
                                   name="date">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="show_is_status">
                        <label for="rb_status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="rb_status" name="rb_status">
                                <option value="0">Booked</option>
                                <option value="1">Check-in</option>
                                <option value="2">Check-out</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_option_id" class="col-sm-5 control-label">Room Option</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="room_option_id" name="room_option_id">
                                @php
                                    $hasData = false;
                                @endphp
                                <option>Select Room Option Id</option>
                                @foreach($roomOptionForBook as $option)
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
                        <label for="room_option_id" class="col-sm-5 control-label">Room Detail</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="room_detail_id" name="room_detail_id">
                                @php
                                    $hasData = false;
                                @endphp
                                <option>Select Room Detail</option>
                                @foreach($roomDetails as $detail)
                                    <option value="{{$detail->id}}">ID: {{$detail->room_number}}</option>
                                    @php
                                        $hasData = true;
                                    @endphp
                                @endforeach
                                @if (!$hasData)
                                    <option disabled>No room options available</option>
                                @endif
                            </select>
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ro_created_by" class="col-sm-5 control-label">Created By Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="ro_created_by" name="user_id"
                                   value="{{ Auth::user()->email }}" readonly>
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




