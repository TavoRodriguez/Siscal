<?php require_once "vistas/parte_superior.php";
$id = $_GET["userId"]; ?>
<!--INICIO del cont principal-->
<div class="container">
    <h2>Usuario </h2>


    <?php

    $fechaActual = strtotime(date("d-m-Y", time()));


    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM payments WHERE identification_user = '$id' ORDER BY STR_TO_DATE(date, '%d-%m-%Y') asc ";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);




    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPagos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr style="background-color: black; color: white">
                                <th hidden>Número de pago</th>
                                <th>Cliente</th>
                                <th>Fecha del Pago</th>
                                <th>Cuota</th>
                                <th>Estado</th>
                                <th hidden>Monto</th>
                                <th hidden>Prioridad</th>
                                <th>Nota</th>
                                <th>Acciones</th>
                                <th>Datos</th>
                            </tr>
                        </thead>
                        <tbody style="color: black">
                            <?php
                            foreach ($data as $dat) {
                                $id_state = $dat['id'];
                                $name = $dat['name'];
                                $fecha = $dat['date'];
                                $fechacomparacion = strtotime($fecha);
                                $interes = $dat['interest_payment'];
                                $interesfor = number_format($interes, 0, ',', '.');
                                $monto = $dat['amount_payment'];
                                $prioridad = $dat['priority'];
                                $nota = $dat['note'];

                                $state = $dat['state'];
                                if ($dat['state'] == 'Pago' || $fechacomparacion <=  $fechaActual) {
                                    echo " <tr>
                                    <td hidden>" . $id_state . "
                                    </td>
                                        <td> " . $name . "</td>
                                        <td>" . $fecha . "</td>
                                        <td>" . $interesfor . "</td>
                                        <td>"; ?>
                                    <form id="formPago" action="crud/crud_payments.php" method="POST">
                                        <?php
                                        echo "<input type='hidden' name = 'id_user' value = " . $id . ">
                                              <input type='hidden' name = 'id_state' value = " . $id_state . ">
                                              <input type='hidden' name = 'prueba' value = " . $interes . ">
                                              <input type='hidden' name = 'prueba2' value = " . $monto . ">
                                              <input type='hidden' name = 'prueba3' value = " . $prioridad . ">"  ?>


                                        <?php
                                        if ($state == "") {
                                            echo "<select class='form-control' aria-label='Default select example' name='state2' id='state2'>";
                                            if ($dat['state'] == "") {
                                                echo "<option value='Pendiente'>Pendiente</option>";
                                                echo "<option value='Pago'>Pago</option>";
                                            } else if ($dat['state'] == "Pago") {

                                                echo "<option value='Pago'>Pago</option>";
                                                echo "<option value='Pendiente'>Pendiente</option>";
                                            } else {

                                                echo "<option value='Pendiente'>Pendiente</option>";
                                                echo "<option value='Pago'>Pago</option>";
                                            }

                                            "</select>";
                                        } else if ($dat['state'] == "Pago") {

                                            echo "<select class='form-control btn-success' aria-label='Default select example' name='state2' id='state2'>";
                                            if ($dat['state'] == "") {
                                                echo "<option value='Pendiente'>Pendiente</option>";
                                                echo "<option value='Pago'>Pago</option>";
                                            } else if ($dat['state'] == "Pago") {

                                                echo "<option value='Pago'>Pago</option>";
                                                echo "<option value='Pendiente'>Pendiente</option>";
                                            } else {

                                                echo "<option value='Pendiente'>Pendiente</option>";
                                                echo "<option value='Pago'>Pago</option>";
                                            }

                                            "</select>";
                                        } else {

                                            echo "<select class='form-control btn-danger' aria-label='Default select example' name='state2' id='state2'>";
                                            if ($dat['state'] == "") {
                                                echo "<option value='Pendiente'>Pendiente</option>";
                                                echo "<option value='Pago'>Pago</option>";
                                            } else if ($dat['state'] == "Pago") {

                                                echo "<option value='Pago'>Pago</option>";
                                                echo "<option value='Pendiente'>Pendiente</option>";
                                            } else {

                                                echo "<option value='Pendiente'>Pendiente</option>";
                                                echo "<option value='Pago'>Pago</option>";
                                            }

                                            "</select>";
                                        }

                                        ?>
                                        <td hidden><?php echo $monto ?> </td>
                                        <td hidden><?php echo $prioridad ?> </td>
                                        
                                        <td><textarea style="color: black" type="text" class="form-control" name="nota" id="nota"><?php echo $nota ?></textarea></td>
                                        </td>
                                        <td><button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button></td>

                                    </form>
                                    
                                    
                                    <td class="datos"></td>
                                    </tr>
                                <?php
                                }
                                ?>


                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
         
        <!--FIN del cont principal-->

        <?php require_once "vistas/parte_inferior.php" ?>
    </div>

</div>