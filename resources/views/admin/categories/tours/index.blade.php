<div class="tab-pane show active" id="tour_category">
    <table class="table table-bordered data-table" id="tourCategoryData"></table>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            loadDataTable('#tourCategoryData', "{{ route('admin.tourCategories.index') }}");

            function loadDataTable(tableId, ajaxUrl) {
                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: ajaxUrl,
                    columns: [
                        {title: 'ID', data: 'id', name: 'id'},
                        {title: 'Name', data: 'name', name: 'name'},
                        {title: 'Description', data: 'description', name: 'description'},
                        {title: 'Status', data: 'status', name: 'status'},
                        {title: 'Action', data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    "order": [[0, 'desc']],
                    "autoWidth": false
                });
            }
        });
    </script>
@endpush
