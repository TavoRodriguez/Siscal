<?php 
    include "../../bd/conexion.php";
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        $pass = hash('sha512', $p1); 
        $consulta = "UPDATE login set password='$pass' where email='$email' ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        header("Location: http://localhost/SISCAL/siscal/index.php");
        
    }else{
        echo "no coinciden";
    }
?>