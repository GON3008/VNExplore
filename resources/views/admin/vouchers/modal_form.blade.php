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
                            <input type="text" class="form-control" id="quantity" name="quantity"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                   placeholder="Enter Name" value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="discount_amount" class="col-sm-2 control-label">Discount</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="discount_amount" name="discount_amount"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                   placeholder="Enter Name" value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="valid_from" class="col-sm-2 control-label">Start Time</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="valid_from" name="valid_from"
                                   value="">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="valid_until" class="col-sm-2 control-label">End Time</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="valid_until" name="valid_until">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="isActiveField" style="display: none">
                        <label for="is_active" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="image" name="image">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <label for="description" class="col-sm-2 control-label">Description</label>--}}
                    {{--                        <div class="col-sm-12">--}}
                    {{--                            <textarea id="description" name="description" class="form-control" placeholder="Enter Description" maxlength="255"></textarea>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="col-sm-offset-2 col-sm-10 pt-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#valid_until').on('change', function () {
            checkVoucherStatus();
        });

        function checkVoucherStatus() {
            var validUntil = new Date($('#valid_until').val());
            var now = new Date();
            if (validUntil < now) {
                $('#is_active').val('0');
            }
        }
    });
</script>
