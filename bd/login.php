<?php
session_start();
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = hash('sha512', $password);

$consulta = "SELECT login.id_rol AS idRol, roles.description AS rol FROM login JOIN roles ON login.id_rol = roles.id_rol WHERE username='$usuario' AND password ='$pass'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();


if ($resultado->rowCount() >= 1) {
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
    $_SESSION["s_idRol"] = $data[0]["idRol"];
    $_SESSION["s_rol_descripcion"] = $data[0]["rol"];
} else {
    $_SESSION["s_usuario"] = null;
    $data = null;
}

print json_encode($data); //envio el array final el formato json a AJAX
$conexion = null;
