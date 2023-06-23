
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Registrar Nuevo Usuario</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">
        <form id="formRegister" class="login-form text-center" action="insert.php" method="post">
            <h1 class="mb-5 font-weight-light text-uppercase">Registrarme</h1>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Usuario" name="username" id="username"  >
            </div>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Email" name="email" id="email" >
            </div>
            <div class="form-group">
                <select class="form-control rounded-pill form-control-lg"  name="id_rol" id="id_rol" >
                    <option selected> Seleccione una opcion</option>
                    <option value="1">Administrador</option>
                    <!--<option value="2">Usuario</option>-->
                </select>
                   
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Contraseña" name="password" id="password" >
            </div>
            
            <button type="submit" name="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Registrarse</button>
        </form>
       
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS, then Sweet_alert2 -->
    <script src="../assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/popper/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/sweet_alert2/sweetalert2.all.min.js"></script>

    <!-- Conectar con el Codigo Js -->
    <script src="codigo_register.js"></script>
    
</body>

</html>