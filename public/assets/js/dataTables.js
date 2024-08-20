$(document).ready(function () {
    loadDataTable('#tourCategoryData', tourCategoryUrl);

    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        if (target === '#flight_category') {
            loadDataTable('#flightCategoryData', flightCategoryUrl);
        }
    });

    function loadDataTable(tableId, ajaxUrl) {
        var table = $(tableId).DataTable({
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

        table.columns.adjust().draw();
    }
});
