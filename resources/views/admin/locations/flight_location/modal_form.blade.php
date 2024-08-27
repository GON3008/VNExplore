<div class="modal fade" id="ajaxModelFlight" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadingFlight"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="flight_locationForm" name="flight_locationForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="flightLocation_id" id="flightLocation_id">
                    <div class="form-group">
                        <label for="flight_country" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="flight_country" name="flight_country" placeholder="Enter Country Name" value=""
                                   maxlength="100">
                            {{--                            <span class="text-danger" id="name_error"></span>--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="flight_city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="flight_city" name="flight_city" placeholder="Enter City Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="flight_district" class="col-sm-2 control-label">District</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="flight_district" name="flight_district" placeholder="Enter District Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="flight_ward" class="col-sm-2 control-label">Ward</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="flight_ward" name="flight_ward" placeholder="Enter Ward Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="symbol" class="col-sm-2 control-label">Symbol</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="symbol" name="symbol" placeholder="Enter Symbol Name" value=""
                                   maxlength="100">
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
