<?php 
    include "../../bd/conexion.php";
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
    $email =$_POST['email'];
    $bytes = random_bytes(5);
    $token =bin2hex($bytes);

    include "mail_reset.php";
    if($sent){
        $consulta = "INSERT INTO passwords (email, token, code) VALUES ('$email','$token','$code');" ;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        echo '<p>Verifica tu email para restablecer tu cuenta</p>';
    }
   

?>