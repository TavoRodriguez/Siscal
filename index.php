<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="img/logo.jpeg" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/estilos.css">

    <title> Login Form</title>

</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">
        <form id="formLogin" class="login-form text-center" action="" method="post">
            <h1 class="mb-5 font-weight-light text-uppercase">Login</h1>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Username" name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="password" id="password">
            </div>
            <div class="forgot-link form-group d-flex justify-content-between align-items-center">
                <!-- <a href="recover/mail_pass.php">Olvido la contraseña?</a> -->
            </div>
            <button type="submit" name="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/sweet_alert2/sweetalert2.all.min.js"></script>
    <!-- Conectar con el Codigo Js -->
    <script src="codigo.js"></script>
</body>

</html>