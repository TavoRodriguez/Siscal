$(document).ready(function () {
    tablaPagos = $("#tablaPagos").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-danger btnEliminar'>Eliminar</button></div></div>"
        }],

        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        lengthMenu: [[-1], ["Todos"]],
        ordering: false // false to disable sorting (or any other option),




    });

    var fila; //capturar la fila para editar o borrar el registro

    $(document).on("click", ".btnEliminar", function () {
        fila = $(this);
        id_state = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 1 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + id_state + "?");
        if (respuesta) {
            $.ajax({
                url: "crud/crud_payments2.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, id_state: id_state },
                success: function () {
                    tablaPagos.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });



});