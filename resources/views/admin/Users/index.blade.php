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
                    scrollX: true,
                    ajax: "{{ route('admin.users.index') }}",
                    columns: [
                        {title:'Id',data: 'id', name: 'id'},
                        {title:'Name',data: 'name', name: 'name'},
                        {title:'Email',data: 'email', name: 'email'},
                        {title:'Action',data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']],
                })
            });
        </script>

    @endsection
