<?php 
    include "../../bd/conexion.php";
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $email =$_POST['email'];
    $token =$_POST['token'];
    $code =$_POST['codigo'];

    $consulta = "SELECT * from passwords where  email='$email' and token='$token' and code=$code";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $correcto=false;
    
    if ($resultado->rowCount() > 0) {
        
        $correcto=true;

    } else {
        $correcto=false;
    }
   
   



?>



<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../../css/estilos.css">

    <title>Cambiar Contraseña</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">
    <?php if($correcto){ ?>
        <form id="formRegister" class="login-form text-center" action="change_password.php" method="post">
            <h1 class="mb-5 font-weight-light text-uppercase">Recuperar Contraseña</h1>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Nueva Contraseña" name="p1" id="c" >
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Confirmar Contraseña" name="p2" id="c" >
                <input type="hidden" class="form-control" id="c" name="email" value="<?php echo $email?>">
            </div>
            <button type="submit" name="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Cambiar Contraseña</button>
        </form>
    <?php }else{ ?>
        <div class="alert alert-danger" >Código incorrecto o vencido</div>
    <?php } ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS, then Sweet_alert2 -->
    <script src="../../assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/sweet_alert2/sweetalert2.all.min.js"></script>


</body>

</html>


