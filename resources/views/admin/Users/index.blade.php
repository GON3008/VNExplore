@extends('admin.layouts.master')

@section('content')

    <div class="container">
        <h2>Users</h2>
        <div class="py-3">
            <a href="javascript:void(0)" class="btn btn-success" id="createNewUser">Create New User</a>
        </div>
        <table class="table table-bordered data-table" id="dataUser"></table>
    </div>

    @include('admin.users.modal_form')

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#dataUser").DataTable({
                processing: true,
                serverSide: true,
                ScrollX: true,
                ajax: "{{ route('admin.users.index') }}",
                columns: [
                    {title: 'Id', data: 'id', name: 'id'},
                    {title: 'Name', data: 'name', name: 'name'},
                    {title: 'Avatar', data: 'avatar', name: 'avatar', orderable: false},
                    {title: 'Email', data: 'email', name: 'email'},
                    {title: 'Role', data: 'role', name: 'role'},
                    {title: 'Status', data: 'status', name: 'status'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']],
            });

            $('#createNewUser').click(function () {
                $('#saveBtn').val("create-users");
                $('#user_id').val('');
                $('#userForm').trigger("reset");
                $('#modelHeading').html("Create New User");
                $('#ajaxModel').modal('show');
                $('#isActiveField').hide();
                $('#passwordShow').show();
            });

            $('#userForm').on('submit', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('id', $('#user_id').val());
                $('#saveBtn').html('Sending...');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.users.store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#ajaxModel').modal('hide');
                        var onTable = $('#dataUser').DataTable();
                        onTable.draw(false);
                        $('#saveBtn').html('Save changes');
                    },

                    error: function (xhr) {
                        if(xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            if(errors.name) {
                                $('#name_error').text(errors.name[0]);
                            }
                            if(errors.email) {
                                $('#email_error').text(errors.email[0]);
                            }
                            if(errors.password){
                                $('#password_error').text(errors.password[0]);
                            }
                            if(errors.role) {
                                $('#role_error').text(errors.role[0]);
                            }
                            // Add more error checks if necessary
                        }
                        $('#saveBtn').html('Save changes');
                    }
                });
            });

            $('body').on('click', '.edit', function () {
                var user_id = $(this).attr('id');
                $.get("{{route('admin.users.index')}}" + '/' + user_id + '/edit', function (data) {
                    $('#modelHeading').html("Edit User");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#user_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#role').val(data.role);
                    $('#is_active').val(data.status);
                    $('#isActiveField').show();
                    $('#passwordShow').hide();
                });
            });

            $('body').on('click', '.delete', function (){
                var user_id = $(this).attr("id");
                var url = "{{ route('admin.users.destroy', ':id') }}";
                url = url.replace(':id', user_id);

                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        success: function (data) {
                            var onTable = $('#dataUser').DataTable();
                            onTable.draw(false);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    })
                }
            });

        });

    </script>

@endsection
