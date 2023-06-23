<?php
session_start();
sleep(1);
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
date_default_timezone_set('America/Costa_Rica');
$zonahoraria = date_default_timezone_get();

$identification = (isset($_POST['identification'])) ? $_POST['identification'] : '';
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$province = (isset($_POST['province'])) ? $_POST['province'] : '';
$address = (isset($_POST['address'])) ? $_POST['address'] : '';
$job = (isset($_POST['job'])) ? $_POST['job'] : '';
$work_address = (isset($_POST['work_address'])) ? $_POST['work_address'] : '';
$amount = (isset($_POST['amount'])) ? $_POST['amount'] : '';
$interest = (isset($_POST['interest'])) ? $_POST['interest'] : '';
$interest_payment = (isset($_POST['interest_payment'])) ? $_POST['interest_payment'] : '';
$term = (isset($_POST['term'])) ? $_POST['term'] : '';
$periodicity = (isset($_POST['periodicity'])) ? $_POST['periodicity'] : '';
$type_pay = (isset($_POST['type_pay'])) ? $_POST['type_pay'] : '';
$id_day = (isset($_POST['id_day'])) ? $_POST['id_day'] : '';
$date = (isset($_POST['date'])) ? $_POST['date'] : '';
$state = (isset($_POST['state'])) ? $_POST['state'] : '';
$note = (isset($_POST['note'])) ? $_POST['note'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

//$amountfor = number_format($amount, 0, ',', '.');
//$interest_paymentfor = number_format($interest_payment, 0, ',', '.');



switch ($opcion) {
    case 1:
        $consulta = "INSERT INTO users (identification, name, phone, province, address, job, work_address, amount, interest, interest_payment, term, periodicity, type_pay, id_day, date, state, note) VALUES ('$identification', '$name', '$phone', '$province', '$address', '$job', '$work_address', '$amount', '$interest', '$interest_payment', '$term', '$periodicity', '$type_pay', '$id_day', '$date', '$state', '$note'); ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if ($consulta == true) {
            if ($periodicity == "1.Semanal") {
                for ($i = 1; $i <= $term; $i++) {
                    $date = date("d-m-Y", strtotime($date . "+ 1 week"));
                    $consulta = "INSERT INTO payments (	identification_user, name, date, interest_payment, state, amount_payment, priority) VALUES ('$identification','$name','$date', '$interest_payment', 'Pendiente', '$amount', '$state'); ";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                }
            } elseif ($periodicity == "2.Bisemanal") {
                for ($i = 1; $i <= $term; $i++) {
                    $date = date("d-m-Y", strtotime($date . "+ 2 week"));
                    $consulta = "INSERT INTO payments (	identification_user, name, date, interest_payment, state, amount_payment, priority) VALUES ('$identification','$name','$date', '$interest_payment', 'Pendiente', '$amount', '$state'); ";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                }
            } elseif ($periodicity == "3.Quincena") {
                for ($i = 1; $i <= $term; $i++) {
                    $date = date("d-m-Y", strtotime($date . "+ 1 week"));
                    $consulta = "INSERT INTO payments (	identification_user, name, date, interest_payment, state, amount_payment, priority) VALUES ('$identification','$name','$date', '$interest_payment', 'Pendiente', '$amount', '$state'); ";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                }
            } elseif ($periodicity == "4.Quincenal") {
                $fec = date("d", strtotime($date)) . '<br>'; // sacamos el dia de la fecha de hoy

                $hoy = date("Y-m-d H:i:s", strtotime($date)) . '<br>'; //sacamos la fecha de hoy

                $hoy2 = date("Y-m", strtotime($date)); // sacamos el año y mes de hoy


                if ($fec <= 15) {

                    $aux = date('Y-m-d', strtotime("{$hoy2} + 1 month"));

                    $añadir = date('Y-m-d', strtotime("{$aux} +14 day"));

                    $last_day = date('Y-m-d', strtotime("{$añadir} - 1 month"));

                    $last_day_dmy = date('d-m-Y', strtotime($last_day));
                } else {

                    $aux = date('Y-m-d', strtotime("{$hoy2} + 1 month"));

                    $añadir = date('Y-m-d', strtotime("{$aux} +14 day"));

                    $last_day = date('Y-m-d', strtotime("{$añadir} - 1 month")); 

                    $last_day_dmy = date('d-m-Y', strtotime($last_day));
                }


                for ($i = 1; $i <= $term; $i++) {
                    $dayx = date('d', strtotime($last_day)); // sacamos el dia de $last_day
                    $hoy3 = date('Y-m', strtotime($last_day)); // sacamos el año y mes de $last_day

                    //si el dia del primer pago es menor a quince el primer pago lo programo al dia ultimo de ese mes si no se va hasta la otra quincena del siguiente
                    if ($dayx <= 15) {


                        $aux = date('Y-m-d', strtotime("{$hoy3} + 1 month"));

                        $last_day = date('Y-m-d', strtotime("{$aux} -1 day"));

                        $last_day_dmy = date('d-m-Y', strtotime($last_day));

                    } else {


                        $aux = date('Y-m-d', strtotime("{$hoy3} + 1 month"));

                        $last_day = date('Y-m-d', strtotime("{$aux} +14 day"));

                        $last_day_dmy = date('d-m-Y', strtotime($last_day));


                    }

                    $consulta = "INSERT INTO payments (	identification_user, name, date, interest_payment, state, amount_payment, priority) VALUES ('$identification','$name','$last_day_dmy', '$interest_payment', 'Pendiente', '$amount', '$state'); ";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                }
            } else {
                for ($i = 1; $i <= $term; $i++) {
                    $date = date("t-m-Y", strtotime($date . "+ 1 week"));
                    $consulta = "INSERT INTO payments (	identification_user, name, date, interest_payment, state, amount_payment, priority) VALUES ('$identification','$name','$date', '$interest_payment', 'Pendiente', '$amount', '$state'); ";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                }
            }
        }


        $consulta = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "UPDATE users SET identification='$identification', name='$name', phone= '$phone', province='$province', address='$address', job='$job', work_address='$work_address', amount='$amount', interest='$interest', interest_payment='$interest_payment', term='$term', periodicity='$periodicity', type_pay='$type_pay', id_day='$id_day', date='$date', state='$state', note='$note' WHERE user_id='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if ($consulta == true) {
            $consulta = "UPDATE payments SET identification_user='$identification', name='$name', interest_payment='$interest_payment', amount_payment= '$amount', priority= '$state' WHERE identification_user='$identification' ";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
        }


        $consulta = "SELECT * FROM users WHERE user_id='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:
        $consulta = "DELETE FROM users WHERE identification='$identification' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        $consulta = "SELECT * FROM users WHERE user_id='$user_id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $consulta = "DELETE FROM payments WHERE identification_user='$identification' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();


        break;
}





print json_encode($data, JSON_UNESCAPED_UNICODE); //envio el array final el formato json a AJAX
$conexion = null;
