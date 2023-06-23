<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$username = (trim($_POST['username']));
$email = (trim($_POST['email']));
$password = (trim($_POST['password']));
$id_rol = (trim($_POST['id_rol']));
$pass = hash('sha512', $password); 


$consulta = "INSERT INTO login (username, email, password, id_rol) VALUES ('$username', '$email', '$pass', '$id_rol'); ";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 


