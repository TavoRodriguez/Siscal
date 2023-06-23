<?php 
if( isset($_GET['email'])  && isset($_GET['token']) ){
    $email=$_GET['email'];
    $token=$_GET['token'];
}else{
    header("Location: ../index.php");
}

?>



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

    <title>Restablecer</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">
        <form id="formRegister" class="login-form text-center" action="php/token.php" method="post">
            <h1 class="mb-5 font-weight-light text-uppercase">Restablecer Contraseña</h1>
            <div class="form-group">
                <input type="number" class="form-control rounded-pill form-control-lg" placeholder="Código" id="c" name="codigo">
                <input type="hidden" class="form-control rounded-pill form-control-lg" id="c" name="email" value="<?php echo $email;?>">
                <input type="hidden" class="form-control rounded-pill form-control-lg" id="c" name="token" value="<?php echo $token;?>">
            </div>
            <button type="submit" name="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Restablecer</button>
        </form>
       
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS, then Sweet_alert2 -->
    <script src="../assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/popper/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/sweet_alert2/sweetalert2.all.min.js"></script>


</body>

</html>