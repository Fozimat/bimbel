$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        "columnDefs": [
            { "width": "5%", "targets": 0 }
        ]
    });

    $('.tugas-nowrap').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        columnDefs: [{
            targets: [6],
            render: function (data, type, row) {
                return type === 'display' && data.length > 10 ?
                    data.substr(0, 10) + '…' :
                    data;
            }
        }]
    });

    $('.materi-nowrap').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        columnDefs: [{
            targets: [5],
            render: function (data, type, row) {
                return type === 'display' && data.length > 10 ?
                    data.substr(0, 10) + '…' :
                    data;
            }
        }]
    });
});