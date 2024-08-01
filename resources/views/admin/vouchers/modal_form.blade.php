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
                <form id="voucherForm" name="voucherForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="voucher_id" id="voucher_id">
                    <input type="hidden" name="voucher_code" id="voucher_code">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                   value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity"
                                   value="" maxlength="100">
                            <span class="text-danger" id="quantity_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="discount_amount" class="col-sm-2 control-label">Discount</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="discount_amount" name="discount_amount"
                                   placeholder="Enter Discount"
                                   value="" maxlength="100">
                            <span class="text-danger" id="discount_error"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="valid_from" class="col-sm-2 control-label">Start Date</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="valid_from" name="valid_from"
                                   placeholder="Enter Start Date"
                                   value="" maxlength="100">
                            <span class="text-danger" id="valid_from_error"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="valid_until" class="col-sm-2 control-label">End Date</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="valid_until" name="valid_until"
                                   placeholder="Enter End Date"
                                   value="" maxlength="100">
                            <span class="text-danger" id="valid_until_error"></span>
                        </div>
                    </div>

{{--                    <div class="form-group" id="editor">--}}
{{--                        <label for="description" class="col-sm-2 control-label">Description</label>--}}
{{--                        <div class="col-sm-12">--}}

{{--                    </div>--}}


                    <div class="form-group" id="isActiveField" style="display: none">
                        <label for="is_active" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveBtn" value="create">Save changes
                </button>
            </div>
        </div>
    </div>
</div>
