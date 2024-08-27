<div class="modal fade" id="ajaxModelTour" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadingTour"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="tour_locationForm" name="tour_locationForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tourLocation_id" id="tourLocation_id">
                    <div class="form-group">
                        <label for="tour_country" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="tour_country" name="tour_country" placeholder="Enter Country Name" value=""
                                   maxlength="100">
                            {{--                            <span class="text-danger" id="name_error"></span>--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_city" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="tour_city" name="tour_city" placeholder="Enter City Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_district" class="col-sm-2 control-label">District</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="tour_district" name="tour_district" placeholder="Enter District Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_ward" class="col-sm-2 control-label">Ward</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="tour_ward" name="tour_ward" placeholder="Enter Ward Name" value=""
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
