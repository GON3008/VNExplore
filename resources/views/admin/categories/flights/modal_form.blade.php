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
                <form id="flight_categoriesForm" name="flight_categoriesForm" class="form-horizontal"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="flightCategory_id" id="flightCategory_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="flightCategory_name" name="name" placeholder="Enter Name"
                                   value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="flightCategory_isActiveField" style="display: none">
                        <label for="flightCategory_isActive" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="flightCategory_isActive" name="is_active">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="HotelCategory_id" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="HotelCategory_id" name="category_id">
                                <option value="0">Select Category</option>
                                @foreach($listCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="flightCategory_description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea id="flightCategory_description" name="description" class="form-control"
                                      placeholder="Enter Description"
                                      maxlength="255"></textarea>
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


