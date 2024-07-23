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
                    ajax: "{{ route('admin.users.index') }}",
                    columns: [
                        {title:'Id',data: 'id', name: 'id'},
                        {title:'Name',data: 'name', name: 'name'},
                        {title:'Email',data: 'email', name: 'email'},
                        {title:'Role',data: 'role', name: 'role'},
                        {title:'Is Active',data: 'is_active', name: 'is_active'},
                        {title:'Action',data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']],
                });

                $('#createNewUser').click(function () {
                    $('#saveBtn').val("create-user");
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

                   $.ajax({
                       type: "POST",
                       data: formData,
                       url: "{{ route('admin.users.store') }}",
                       processData: false,
                       contentType: false,
                       success: function (data) {
                           $('#ajaxModel').modal('hide');
                           var onTable = $('#dataUser').DataTable();
                           onTable.draw();
                       },
                       error: function (xhr) {
                           if (xhr.responseJSON && xhr.responseJSON.errors) {
                               let errors = xhr.responseJson.errors
                               if (errors.email) {
                                   $('#email-error').html(errors.email[0]);
                               }
                           }
                           $('#saveBtn').html('Save Changes');
                       },
                       error: function (data) {
                           console.log('Error',data);
                       }
                   });
                });

                $('body').on('click', '.edit', function (){
                    var user_id = $(this).attr('id');
                    $.get("{{route('admin.users.index')}}" + '/' + user_id + '/edit', function (data){
                        $('#modelHeading').html("Edit User");
                        $('#saveBtn').val("edit-user");
                        $('#ajaxModel').modal('show');
                        $('#user_id').val(data.id);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#role').val(data.role);
                        $('#is_active').val(data.is_active);
                        $('#isActiveField').show();
                        $('#passwordShow').hide();
                    });
                });
            });
        </script>

    @endsection
