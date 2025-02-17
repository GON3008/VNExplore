<div class="modal fade" id="ajaxModel_cp" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading_cp"></h4>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                    <i class="uil-multiply"></i>
                </span>
            </div>
            <div class="modal-body">
                <form id="cp_form" name="cp_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="cp_id" id="cp_id">

                    <div class="form-group">
                        <label for="currency" class="col-sm-2 control-label">Currency</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="currency" name="currency"
                                   placeholder="Enter Currency" value="" maxlength="100">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="time_zone" class="col-sm-2 control-label">Time Zone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="time_zone" name="time_zone"
                                   placeholder="Enter Time Zone" value="">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label">Amount</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="amount" name="amount"
                                   placeholder="Enter Amount" value=""
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="free_cancellation_until" class="col-sm-3 control-label">Free Cancellation</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="free_cancellation_until"
                                   name="free_cancellation_until">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="apply_before" class="col-sm-3 control-label">Apply Before</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="apply_before"
                                   name="apply_before">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="apply_after" class="col-sm-3 control-label">Apply After</label>
                        <div class="col-sm-12">
                            <input type="datetime-local" class="form-control" id="apply_after"
                                   name="apply_after">
                            <span class="text-danger" id="room_discount_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_option_id" class="col-sm-5 control-label">Room Option</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="room_option_id" name="room_option_id">
                                @foreach($room_option_id as $ro_id)
                                    @if ($ro_id->ro_deleted == 1 && $ro_id->ro_cancellation_type == 'free_cancellation')
                                        <option value="{{ $ro_id->id }}">ID: {{ $ro_id->id }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger" id="departure_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="modification_policy" class="col-sm-4 control-label">Modification Policy</label>
                        <div class="col-sm-12">
                            <textarea id="editor" class="form-control editor ckeditor"
                                      name="modification_policy"></textarea>
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



