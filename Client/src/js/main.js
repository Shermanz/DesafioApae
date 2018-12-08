

$('#first-datatable-output table').datatable({
    pageSize: 5,
    sort: [true, true, false],
    filters: [true, false, 'select'],
    filterText: 'Type to filter... ',
    pagingDivSelector: "#paging-first-datatable"
});