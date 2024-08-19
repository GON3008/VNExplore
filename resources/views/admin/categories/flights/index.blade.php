<div class="container">
    <h2 id="categories_title"></h2>
    <div class="py-3">
        <a href="javascript:void(0)" class="btn btn-success" id="createNewCategory">Create New Flight Category</a>
    </div>
    <table class="table table-bordered data-table" id="dataFlightCategories"></table>
</div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#dataFlightCategories").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.flightCategories.index') }}",
                columns: [
                    {title: 'ID', data: 'id', name: 'id'},
                    {title: 'Name', data: 'name', name: 'name'},
                    {title: 'Description', data: 'description', name: 'description'},
                    {title: 'Status', data: 'status', name: 'status'},
                    {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "order": [[0, 'desc']]
            });

        });

    </script>
@endsection
