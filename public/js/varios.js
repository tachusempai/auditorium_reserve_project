$(function (){
    for(var i = 1; i<=230; i++){
    $('#_numPersonas')
     .append($("<option></option>")
                .attr("value",i)
                .text(i));
    }
});
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'L',
        locale: 'es',
        format:'DD/MM/YYYY'
    });
});
$(function () {
    $('#datetimepicker2').datetimepicker({
        format: 'LT',
        stepping: 30,
        enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
    });
});
$(function () {
    $('#datetimepicker3').datetimepicker({
        format: 'LT',
        stepping: 30,
        enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
    });
});
$(function () {
    $('#datetimepicker4').datetimepicker({
        format: 'LT',
        stepping: 30,
        enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
    });
});
$(function () {
    $('#datetimepicker5').datetimepicker({
        format: 'LT',
        stepping: 30,
        enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
    });
});
$(function () {
    $('#datetimepicker6').datetimepicker({
        format: 'LT',
        stepping: 30,
        enabledHours: [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
    });
});
$(function () {
    $('#datetimepicker7').datetimepicker({
        format: 'LT',
        stepping: 30,
        enabledHours: [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
    });
});
$('.tablePerson tbody').on('click','.btn', function() {
    $(this).closest('tr').remove();
});
$('.tableSchedule tbody').on('click','.btn', function() {
    $(this).closest('tr').remove();
});

$(document).ready( function () {
    $('#table_id').DataTable({
        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
    });
} );
