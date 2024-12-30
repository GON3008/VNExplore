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
                <form id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                   value="" maxlength="100">
                            <span class="text-danger" id="name_error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                                   oninput="this.value = this.value.toLowerCase();">
                            <span class="text-danger" id="email_error"></span>
                        </div>
                    </div>

                    <div class="form-group" id="passwordShow" style="display: none">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Enter Password"
                                   value="" maxlength="100">
                            <span class="text-danger" id="password_error"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="role" class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="role" name="role" required>
                                <option value="">Select Role</option>
                                @foreach(['SuperAdmin','admin', 'client', 'lead'] as $role)
                                    <option
                                        value="{{ $role }}" {{ isset($user) && $user->role == $role ? 'selected' : '' }}>
                                        {{ ucfirst($role) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group" id="isActiveField" style="display: none">
                        <label for="is_active" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="avatar" class="col-sm-2 control-label">Avatar</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="avatar" name="avatar">
                            <span class="text-danger" id="avatar_error"></span>
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
