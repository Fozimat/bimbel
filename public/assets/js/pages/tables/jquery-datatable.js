$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            { extend: 'pdf', className: 'btn bg-purple waves-effect' },
        ],
        "columnDefs": [
            { "width": "5%", "targets": 0 }
        ]
    });
});