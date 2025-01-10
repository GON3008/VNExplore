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
                <form id="hotel_categoriesForm" name="hotel_categoriesForm" class="form-horizontal"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="hotelCategory_id" id="hotelCategory_id">
                    <div class="form-group">
                        <label for="hotel_name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="hotel_name" name="name" placeholder="Enter Name"
                                   value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="hotelCategory_isActiveField" style="display: none">
                        <label for="isActive" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="isActive" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rating" class="col-sm-2 control-label">Rating</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="rating" name="rating">
                                <option value="1">⭐</option>
                                <option value="2">⭐⭐</option>
                                <option value="3">⭐⭐⭐</option>
                                <option value="4">⭐⭐⭐⭐</option>
                                <option value="5">⭐⭐⭐⭐⭐</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="listCategory_id" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="listCategory_id" name="category_id">
                                <option value="0">Select Category</option>
                                @foreach($listCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotelLocation_id" class="col-sm-2 control-label">Location</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hotelLocation_id" name="location_id">
                                <option value="0">Select Location</option>
                                @foreach($hotelLocations as $location)
                                    <option value="{{ $location->id }}">{{ $location->hotel_city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hotelService_id" class="col-sm-2 control-label">Service</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="hotelService_id" name="service_id">
                                <option value="0">Select Service</option>
                                @foreach($hotelServices as $services)
                                    @if($services->status==1)
                                    <option value="{{ $services->id }}">
                                      Service:  {{ $services->id }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="hotel_description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea id="hotel_description" name="description" class="form-control"
                                      placeholder="Enter Description"
                                      maxlength="255"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="images" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="hotelCategory_images" name="hotelCategory_images[]" placeholder="Enter Name"
                                   value="" maxlength="100" multiple>
                            <span class="text-danger" id="image_error"></span>
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
