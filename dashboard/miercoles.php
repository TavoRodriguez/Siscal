<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Miércoles</h1>

    <?php
    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM users WHere id_day = '3' order by `periodicity` ASC";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo Cliente</button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr style="background-color: black; color: white">
                                <th hidden>#</th>
                                <th>Cedúla</th>
                                <th>Nombre</th>
                                <th class="acciones">Teléfono</th>
                                <th class="acciones">Provincia</th>
                                <th class="acciones">Dirección</th>
                                <th class="acciones">Trabajo</th>
                                <th class="acciones">Dirección del Trabajo</th>
                                <th>Monto</th>
                                <th>Interes</th>
                                <th>Pago de Interes</th>
                                <th hidden class="acciones">Plazo</th>
                                <th>Periodicidad</th>
                                <th class="acciones">Tipo de pago</th>
                                <th hidden class="acciones">Día de Pago</th>
                                <th class="acciones">Fecha de Registro</th>
                                <th class="acciones">Estado</th>
                                <th>Nota</th>
                                <th class="acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                                $amount = $dat['amount'];
                                $amountfor = number_format($amount, 0, ',', '.');

                                $interest_payment = $dat['interest_payment'];
                                $interest_paymentfor = number_format($interest_payment, 0, ',', '.');
                            ?>
                                <tr style="color: black">
                                    <td hidden><?php echo $dat['user_id'] ?></td>
                                    <td>
                                        <?php
                                        $id = $dat['identification'];
                                        $identificador = $dat['identification'];
                                        echo "<a href='payments.php?userId=" . $id . "'>$identificador</a>"
                                        ?>
                                    </td>
                                    <td><?php echo $dat['name'] ?></td>
                                    <td class="acciones"><?php echo $dat['phone'] ?></td>
                                    <td class="acciones"><?php echo $dat['province'] ?></td>
                                    <td class="acciones"><?php echo $dat['address'] ?></td>
                                    <td class="acciones"><?php echo $dat['job'] ?></td>
                                    <td class="acciones"><?php echo $dat['work_address'] ?></td>
                                    <td><?php echo $amountfor ?></td>
                                    <td><?php echo $dat['interest'] ?></td>
                                    <td style="background-color: #fc4b08; color: white"><?php echo $interest_paymentfor ?></td>
                                    <td hidden class="acciones"><?php echo $dat['term'] ?></td>
                                    <td><?php echo $dat['periodicity'] ?></td>
                                    <td class="acciones"><?php echo $dat['type_pay'] ?></td>
                                    <td hidden class="acciones"><?php echo $dat['id_day'] ?></td>
                                    <td class="acciones"><?php echo $dat['date'] ?></td>
                                    <td class="acciones"><?php echo $dat['state'] ?></td>
                                    <td style="width:20%"><textarea style="color: black" type="text" class="form-control" name="nota" id="nota"><?php echo $dat['note'] ?></textarea></td>
                                    <td class="acciones"></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <button id="boton" class="btn btn-link">Mostrar/Ocultar Datos</button>
        <?php require_once "vistas/parte_inferior.php" ?>
    </div>

    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formUsuarios">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="identification" class="col-form-label">Cedúla</label>
                                    <input type="text" class="form-control" id="identification">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="province" class="col-form-label">Provincia</label>
                                    <select class="form-control" aria-label="Default select example" id="province">
                                        <option selected> Seleccione una opcion</option>
                                        <option value="San Jose">San Jose</option>
                                        <option value="Alajuela">Alajuela</option>
                                        <option value="Cartago">Cartago</option>
                                        <option value="Heredia">Heredia</option>
                                        <option value="Guanacaste">Guanacaste</option>
                                        <option value="Puntarenas">Puntarenas</option>
                                        <option value="Limon">Limon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="job" class="col-form-label">Trabajo</label>
                                    <input type="text" class="form-control" id="job">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Dirección donde vive</label>
                                    <textarea type="text" class="form-control" id="address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="work_address" class="col-form-label">Dirección del trabajo</label>
                                    <textarea type="text" class="form-control" id="work_address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="amount" class="col-form-label">Monto</label>
                                    <input type="text" class="form-control" id="amount" step="0.0001">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="interest" class="col-form-label">Interes</label>
                                    <select class="form-control" aria-label="Default select example" id="interest" oninput="calcular()">
                                        <option selected> Seleccione una opcion</option>
                                        <option value="0.01">1%</option>
                                        <option value="0.02">2%</option>
                                        <option value="0.03">3%</option>
                                        <option value="0.04">4%</option>
                                        <option value="0.05">5%</option>
                                        <option value="0.06">6%</option>
                                        <option value="0.07">7%</option>
                                        <option value="0.08">8%</option>
                                        <option value="0.09">9%</option>
                                        <option value="0.10">10%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Pago del Interes</label>
                                    <input type="text" class="form-control" id="interest_payment" step="0.0001">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="periodicity" class="col-form-label">Periodicidad</label>
                                    <select class="form-control" aria-label="Default select example" id="periodicity">
                                        <option selected> Seleccione una opcion</option>
                                        <option value="1.Semanal">Semanal</option>
                                        <option value="2.Bisemanal">Bisemanal</option>
                                        <option value="3.Quincena">Quincena</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label hidden for="term" class="col-form-label">Plazo</label>
                                    <input hidden type="number" class="form-control" id="term" value="200">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type_pay" class="col-form-label">Tipo de Pago</label>
                                    <select class="form-control" aria-label="Default select example" id="type_pay">
                                        <option selected> Seleccione una opcion</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Deposito">Deposito</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="id_day" class="col-form-label">Día Del Pago</label>
                                    <select class="form-control" aria-label="Default select example" id="id_day">
                                        <option value="3">Miercoles</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date" class="col-form-label">Fecha</label>
                                    <input type="date" class="form-control" id="date" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="state" class="col-form-label">Estado</label>
                                    <select class="form-control" aria-label="Default select example" id="state">
                                        <option selected> Seleccione una opcion</option>
                                        <option value="Interes fijo">Interes fijo</option>
                                        <option value="Cuenta fija">Cuenta fija</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="note" class="col-form-label">Nota</label>
                                    <textarea type="text" class="form-control" id="note"></textarea>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!--FIN del cont principal-->