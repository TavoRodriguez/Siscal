<?php
session_start();
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$state2 = (isset($_POST['state2'])) ? $_POST['state2'] : '';
$note = (isset($_POST['nota'])) ? $_POST['nota'] : '';
$id_state = (isset($_POST['id_state'])) ? $_POST['id_state'] : '';

$id_user = $_POST["id_user"];
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opcion) {
    case 1:
        $consulta = "DELETE FROM payments WHERE id='$id_state' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        $consulta = "SELECT FROM payments WHERE identification_user='$id_user'  ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}


header("Location: ../payments.php?userId=" . $id_user . "");
