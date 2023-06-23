<?php
session_start();
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$state2 = (isset($_POST['state2'])) ? $_POST['state2'] : '';
$note = (isset($_POST['nota'])) ? $_POST['nota'] : '';
$id = (isset($_POST['id_state'])) ? $_POST['id_state'] : ''; 

$interes_pay  = (isset($_POST['prueba'])) ? $_POST['prueba'] : ''; 
$monto  = (isset($_POST['prueba2'])) ? $_POST['prueba2'] : ''; 
$prioridad  = (isset($_POST['prueba3'])) ? $_POST['prueba3'] : ''; 

 $resta= $monto - $interes_pay; 

$id_user = $_POST["id_user"];


if ($state2 == "Pago" && $prioridad == "Cuenta") {
    
        $consulta = "UPDATE payments SET amount_payment='$resta' WHERE identification_user ='$id_user' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $consulta = "UPDATE users SET amount='$resta' WHERE identification ='$id_user' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    
}

$consulta = "UPDATE payments SET state='$state2', note='$note' WHERE id='$id' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

header("Location: ../payments.php?userId=" . $id_user . "");
