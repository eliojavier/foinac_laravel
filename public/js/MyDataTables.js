$(document).ready(function() {
    $('#prestamos').DataTable( {
        "ordering": true,
        "order": [[ 1, "asc" ]],
        "language": {
            "lengthMenu": " ",
            "search": "Buscar:",
            "zeroRecords": "No encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Ningún registro disponible",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "paginate": {
                "first":      "Primera",
                "last":       "Última",
                "next":       "Próxima",
                "previous":   "Anterior"
            }
        },
        "bFilter" : true,
        "bInfo" : true
    });
});

$(document).ready(function() {
    $('#acciones').DataTable( {
        "language": {
            "lengthMenu": " ",
            "search": "Buscar:",
            "zeroRecords": "No encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Ningún registro disponible",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "paginate": {
                "first":      "Primera",
                "last":       "Última",
                "next":       "Próxima",
                "previous":   "Anterior"
            }
        },
        "bFilter" : true,
        "bInfo" : true
    });
});

$(document).ready(function() {
    $('#pagos').DataTable( {
        "language": {
            "lengthMenu": " ",
            "search": "Buscar:",
            "zeroRecords": "No encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Ningún registro disponible",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "paginate": {
                "first":      "Primera",
                "last":       "Última",
                "next":       "Próxima",
                "previous":   "Anterior"
            }
        },
        "bFilter" : true,
        "bInfo" : true
    });
});

$(document).ready(function() {
    $('#intereses').DataTable( {
        "language": {
            "lengthMenu": " ",
            "search": "Buscar:",
            "zeroRecords": "No encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Ningún registro disponible",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "paginate": {
                "first":      "Primera",
                "last":       "Última",
                "next":       "Próxima",
                "previous":   "Anterior"
            }
        },
        "bFilter" : true,
        "bInfo" : true
    });
});
