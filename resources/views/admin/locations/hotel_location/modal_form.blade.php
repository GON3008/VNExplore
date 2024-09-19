<div class="modal fade" id="ajaxModelHotel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadingHotel"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="hotel_locationForm" name="hotel_locationForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="hotelLocation_id" id="hotelLocation_id">
                    <div class="form-group">
                        <label for="hotel_country" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="hotel_country" name="hotel_country" placeholder="Enter Country Name" value=""
                                   maxlength="100">
                            {{--                            <span class="text-danger" id="name_error"></span>--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotel_city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="hotel_city" name="hotel_city" placeholder="Enter City Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotel_district" class="col-sm-2 control-label">District</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="hotel_district" name="hotel_district" placeholder="Enter District Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotel_ward" class="col-sm-2 control-label">Ward</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="hotel_ward" name="hotel_ward" placeholder="Enter Ward Name" value=""
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
