$(document).ready(function () {
    tablaPersonas = $("#tablaPersonas").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
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

    $("#btnNuevo").click(function () {
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Añadir Nuevo Cliente");
        $("#modalCRUD").modal("show");
        user_id = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        identification = fila.find('td:eq(1)').text();
        name = fila.find('td:eq(2)').text();
        phone = fila.find('td:eq(3)').text();
        province = fila.find('td:eq(4)').text();
        address = fila.find('td:eq(5)').text();
        job = fila.find('td:eq(6)').text();
        work_address = fila.find('td:eq(7)').text();
        amount = fila.find('td:eq(8)').text();
        interest = fila.find('td:eq(9)').text();
        interest_payment = fila.find('td:eq(10)').text();
        term = fila.find('td:eq(11)').text();
        periodicity = fila.find('td:eq(12)').text();
        type_pay = fila.find('td:eq(13)').text();
        id_day = fila.find('td:eq(14)').text();
        date = fila.find('td:eq(15)').text();
        state = fila.find('td:eq(16)').text();
        note = fila.find('td:eq(17)').text();
        $("#identification").val(identification);
        $("#name").val(name);
        $("#phone").val(phone);
        $("#province").val(province);
        $("#address").val(address);
        $("#job").val(job);
        $("#work_address").val(work_address);
        $("#amount").val(amount);
        $("#interest").val(interest);
        $("#interest_payment").val(interest_payment);
        $("#term").val(term);
        $("#periodicity").val(periodicity);
        $("#type_pay").val(type_pay);
        $("#id_day").val(id_day);
        $("#date").val(date);
        $("#state").val(state);
        $("#note").val(note);


        opcion = 2; //editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Persona");
        $("#modalCRUD").modal("show");

    });

    //botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        identification = parseInt($(this).closest("tr").find('td:eq(1)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + identification + "?");
        if (respuesta) {
            $.ajax({
                url: "crud/crud.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, identification: identification },
                success: function () {
                    tablaPersonas.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formUsuarios").submit(function (e) {
        e.preventDefault();
        identification = $.trim($('#identification').val());
        name = $.trim($('#name').val());
        phone = $.trim($('#phone').val());
        province = $.trim($('#province').val());
        address = $.trim($('#address').val());
        job = $.trim($('#job').val());
        work_address = $.trim($('#work_address').val());
        amount = $.trim($('#amount').val());
        interest = $.trim($('#interest').val());
        interest_payment = $.trim($('#interest_payment').val());
        term = $.trim($('#term').val());
        periodicity = $.trim($('#periodicity').val());
        type_pay = $.trim($('#type_pay').val());
        id_day = $.trim($('#id_day').val());
        date = $.trim($('#date').val());
        state = $.trim($('#state').val());
        note = $.trim($('#note').val());

        $.ajax({
            url: "crud/crud.php",
            type: "POST",
            dataType: "json",
            data: { user_id: user_id, identification: identification, name: name, phone: phone, province: province, address: address, job: job, work_address: work_address, amount: amount, interest: interest, interest_payment: interest_payment, term: term, periodicity: periodicity, type_pay: type_pay, id_day: id_day, date: date, state: state, note: note, opcion: opcion },
            success: function (data) {
                console.log(data);
                user_id = data[0].user_id;
                identification = data[0].identification;
                name = data[0].name;
                phone = data[0].phone;
                province = data[0].province;
                address = data[0].address;
                job = data[0].job;
                work_address = data[0].work_address;
                amount = data[0].amount;
                interest = data[0].interest;
                interest_payment = data[0].interest_payment;
                term = data[0].term;
                periodicity = data[0].periodicity;
                type_pay = data[0].type_pay;
                id_day = data[0].id_day;
                date = data[0].date;
                state = data[0].state;
                note = data[0].note;

                if (opcion == 1) { tablaPersonas.row.add([user_id, identification, name, phone, province, address, job, work_address, amount, interest, interest_payment, term, periodicity, type_pay, id_day, date, state, note]).draw(); } else { tablaPersonas.row(fila).data([user_id, identification, name, phone, province, address, job, work_address, amount, interest, interest_payment, term, periodicity, type_pay, id_day, date, state, note]).draw(); }
            }
        });
        $("#modalCRUD").modal("hide");

    });

});