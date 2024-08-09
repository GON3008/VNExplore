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
                <form id="locationForm" name="locationForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="location_id" id="location_id">
                    <div class="form-group">
                        <label for="country_name" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="country_name" name="country_name" placeholder="Enter Country Name" value=""
                                   maxlength="100">
                            {{--                            <span class="text-danger" id="name_error"></span>--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="city_name" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="city_name" name="city_name" placeholder="Enter City Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="district_name" class="col-sm-2 control-label">District</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="district_name" name="district_name" placeholder="Enter District Name" value=""
                                   maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ward_name" class="col-sm-2 control-label">Ward</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="ward_name" name="ward_name" placeholder="Enter Ward Name" value=""
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
