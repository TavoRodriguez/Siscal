<?php
header("Content-Type: aplication/xls");
header("Content-Disposition: attachment; filename = archivo.xls");
header('Cache-Control: max-age=0');
?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Datos Generales</h1>

    <?php
    include_once '../../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT  identification, name, phone, province, address, job, work_address, amount, interest, interest_payment, periodicity, type_pay, id_day, date, state, note FROM users";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);


    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr style="background-color: black; color: white">
                                <th>Cedúla</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Provincia</th>
                                <th>Dirección</th>
                                <th>Trabajo</th>
                                <th>Dirección del Trabajo</th>
                                <th>Monto</th>
                                <th>Interes</th>
                                <th>Pago de Interes</th>
                                <th>Periodicidad</th>
                                <th>Tipo de pago</th>
                                <th>Día de Pago</th>
                                <th>Fecha de Registro</th>
                                <th>Estado</th>
                                <th>Nota</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr style="color: black">
                                    
                                    <td>
                                        <?php
                                        $id = $dat['identification'];
                                        $identificador = $dat['identification'];
                                        echo "<a href='payments.php?userId=" . $id . "'>$identificador</a>"
                                        ?>
                                    </td>
                                    <td><?php echo $dat['name'] ?></td>
                                    <td><?php echo $dat['phone'] ?></td>
                                    <td><?php echo $dat['province'] ?></td>
                                    <td><?php echo $dat['address'] ?></td>
                                    <td><?php echo $dat['job'] ?></td>
                                    <td><?php echo $dat['work_address'] ?></td>
                                    <td><?php echo $dat['amount'] ?></td>
                                    <td><?php echo $dat['interest'] ?></td>
                                    <td style="background-color: #fc4b08; color: white"><?php echo $dat['interest_payment'] ?></td>
                                    <td><?php echo $dat['periodicity'] ?></td>
                                    <td><?php echo $dat['type_pay'] ?></td>
                                    <td><?php echo $dat['id_day'] ?></td>
                                    <td><?php echo $dat['date'] ?></td>
                                    <td><?php echo $dat['state'] ?></td>
                                    <td><textarea style="color: black" type="text" class="form-control" name="nota" id="nota"><?php echo $dat['note'] ?></textarea></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>


    </div>


</div>
<!--FIN del cont principal-->