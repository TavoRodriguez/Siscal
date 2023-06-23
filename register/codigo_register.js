$('#formRegister').submit(function(e) {
    e.preventDefault();
    var username = $.trim($("#username").val());
    var email = $.trim($("#email").val());
    var password = $.trim($("#password").val());
    var id_rol = $.trim($("#id_rol").val());
    if (username.length == "" || email.length == "" || password.length == "" || id_rol.length == "") {
        Swal.fire({
            type: 'warning',
            title: 'Datos incompletos',
        });
        return false;
    } else {
        $.ajax({
            url: "insert.php",
            type: "POST",
            datatype: "json",
            data: { username: username, email: email, password: password, id_rol: id_rol },
            success: function(data) {
                //console.log(data);
                if (data == "null") {
                    Swal.fire({
                        type: 'error',
                        title: 'Datos Incorrectos',
                    });
                } else {
                    Swal.fire({
                        type: 'success',
                        title: '¡Agregado Correctamente!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Validar'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "../index.php";
                        }
                    })
                }
            }
        });
    }
});