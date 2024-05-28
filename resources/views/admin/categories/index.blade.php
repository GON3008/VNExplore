@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Categories</h2>
        <a href="javascript:void(0)" class="btn btn-success" id="createNewCategory">Create New Category</a>
        <table class="table table-bordered data-table" id="dataCategories">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>

    @include('admin.categories.modal_form')
@endsection

@section('scripts')
        <script>
            $(function () {
                $('#dataCategories').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('categories') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'slug', name: 'slug'},
                        {data: 'image', name: 'image'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    "order": [[ 0, "desc" ]]
                });
            });
        </script>
@endsection
