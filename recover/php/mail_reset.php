<?php
// Varios destinatarios
$to  =$email . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$title = 'Restablecer contraseña';
$code= rand(1000,9999);


// mensaje
$message = '
<html>
<head>
  <title>Restablecer</title>
</head>
<body>
    <h1>Restablecer Contraseña</h1>
    <div style="text-align:center; background-color:#ccc">
        <p>Restablecer contraseña</p>
        <h3>'.$code.'</h3>
        <p> <a 
            href="http://localhost/SISCAL/siscal/recover/code.php?email='.$email.'&token='.$token.'"> 
            Para restablecer da click aqui </a> </p>
        <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
    </div>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/
// Enviarlo
$sent =false;
if(mail($to, $title, $message, $headers)){
    $sent=true;
}

?>