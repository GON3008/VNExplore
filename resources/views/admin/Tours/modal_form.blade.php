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
                <form id="tourForm" name="tourForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="tour_id" id="tour_id">
                    <input type="hidden" name="tour_code" id="tour_code">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                   value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Price tour</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="price" name="price"
                                   placeholder="Enter Price tour" value="" maxlength="100">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="vehicle" class="col-sm-2 control-label">Vehicle</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="vehicle" name="vehicle"
                                   placeholder="Enter Vehicle" value="" maxlength="100">
                            <span class="text-danger" id="vehicle_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="departure_date" class="">Departure Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="departure_date" name="departure_date"
                                   placeholder="Enter Departure Date" value="" maxlength="100">
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="return_date" class="">Arrival Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="return_date" name="return_date"
                                   placeholder="Enter Arrival Date" value="" maxlength="100">
                            <span class="text-danger" id="return_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_time" class="col-sm-2 control-label">Tour Time</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="tour_time" name="tour_time"
                                   placeholder="Enter Tour Time" value="" maxlength="100">
                            <span class="text-danger" id="tour_time_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="departure" class="col-sm-2 control-label">Tour Form</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="departure" name="departure"
                                   placeholder="Enter Tour Form" value="" maxlength="100">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_to" class="col-sm-2 control-label">Tour To</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="tour_to" name="tour_to"
                                   placeholder="Enter Tour To" value="" maxlength="100">
                            <span class="text-danger" id="tour_to_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="quantity" name="quantity"
                                   placeholder="Enter Quantity" value="" maxlength="100">
                            <span class="text-danger" id="quantity_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="image" name="image">
                            <img id="image_preview" style="width: 100px; height: 100px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="galleries" class="col-sm-2 control-label">Galleries</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="galleries" name="galleries[]" multiple>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea id="description" name="description" class="form-control"
                                      placeholder="Enter Description" maxlength="255"></textarea>
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


<script>
    var today = new Date().toISOString().split('T')[0];

    document.getElementById("departure_date").setAttribute("min", today);
    document.getElementById("return_date").setAttribute("min", today);
</script>
