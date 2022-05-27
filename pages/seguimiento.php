<?php

    include("../general/header.php");

?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="card p-3 mt-3 shadow">    
                <h2>CONSULTA GENERAL</h2><hr>
                <form action="seguimiento.php" method="post">
                    <div class="row">
                        <div class="col-4">    
                            <label><small>Fecha inicial</small></label>
                            <input class="form-control" type="date" name="f_ini" value="<?php echo date("Y-m-d") ?>">
                        </div>
                        <div class="col-4">    
                            <label><small>Fecha final</small></label>
                            <input class="form-control" type="date" name="f_fin" value="<?php echo date("Y-m-d") ?>">
                        </div>
                        <div class="col-2">    
                            <label><small></small></label>
                            <input class="form-control btn btn-outline-success" type="submit" name="btnCon" value="Consultar">
                        </div>
                        <div class="col-2">    
                            <label><small></small></label>
                            <input class="form-control btn btn-outline-success" type="submit" name="btnExcel" value="Descargar">
                        </div>
                    </div>

                </form>
                <?php
                // Consulta local
                if(isset($_POST['btnCon'])){
                    
                    $f_ini = $_POST['f_ini'];
                    $f_fin = $_POST['f_fin'];

                include("../conexion.php");
                
                $sql = "SELECT * FROM tipifica WHERE fecha BETWEEN '$f_ini' AND '$f_fin'";
                $resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());
                $clientes = array();
                while( $rows = mysqli_fetch_assoc($resultado) ) {
                $clientes[] = $rows;
                }
                include("../desconexion.php");
                
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                    <th>Editar</th>
                    <th>ID Asesor</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contacto</th>
                    <th>País</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($clientes as $cliente) { ?>
                    <tr>
                    <td>
                    <button class="btn btn-primary" onclick="btnUpdate('<?php echo $cliente['id']; ?>', '<?php echo $cliente['fecha']; ?>', '<?php echo $cliente['nombre']; ?>', '<?php echo $cliente['estado']; ?>')" data-toggle="modal" data-target="#modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg></button>
                    </td>
                    <td><?php echo $cliente ['identiAse']; ?></td>
                    <td><?php echo $cliente ['fecha']; ?></td>
                    <td><?php echo $cliente ['nombre']; ?></td>
                    <td><?php echo $cliente ['correo']; ?></td>
                    <td><?php echo $cliente ['numU']; ?></td>
                    <td><?php echo $cliente ['pais']; ?></td>
                    <td><?php echo $cliente ['ciudad']; ?></td>
                    <td><?php echo $cliente ['estado']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
                
                <!-- Modal  Actualizar -->
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="actualizar.php" method="post">

                                    <input class="form-control" type="hidden" name="id" id="id">
                                    <label>Fecha de contacto</label>
                                    <input class="form-control" type="date" name="fecha" id="fecha">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="nombre" id="nombre">
                                    <label>Estado</label>
                                    <select class="form-control" type="text" name="estado" id="estado">
                                    <option value="">-- Seleccione --</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Solicitud Demo">Solicitud  Demo</option>
                                    <option value="Demo Activo">Demo Activo</option>

                                    <option value="Gestión en Proceso">Gestión en Proceso</option>
                                    <option value="Sin Respuesta en Proceso">Sin Respuesta en Proceso</option>

                                    <option value="Desistio">Desistio</option>
                                    <option value="No contacto">No contacto</option>
                                    <option value="No whatsapp">No whatsapp</option>
                                    
                                    <option value="Solicitud de pago">Solicitud de pago</option>
                                    </select>
                                    <input class="form-control btn-outline-success" type="submit" name="btnA" value="Actualizar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <?php } 
                // Descarga excel
                if(isset($_POST['btnExcel'])){
                    
                    $f_ini = $_POST['f_ini'];
                    $f_fin = $_POST['f_fin'];

                include("../conexion.php");
                
                $sql = "SELECT * FROM tipifica WHERE fecha BETWEEN '$f_ini' AND '$f_fin'";
                $resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());
                $clientes = array();
                while( $rows = mysqli_fetch_assoc($resultado) ) {
                $clientes[] = $rows;
                }
                include("../desconexion.php");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=reporte.xls");
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                    <th>ID Asesor</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contacto</th>
                    <th>País</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($clientes as $cliente) { ?>
                    <tr>
                    <td><?php echo $cliente ['identiAse']; ?></td>
                    <td><?php echo $cliente ['fecha']; ?></td>
                    <td><?php echo $cliente ['nombre']; ?></td>
                    <td><?php echo $cliente ['correo']; ?></td>
                    <td><?php echo $cliente ['numU']; ?></td>
                    <td><?php echo $cliente ['pais']; ?></td>
                    <td><?php echo $cliente ['ciudad']; ?></td>
                    <td><?php echo $cliente ['estado']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-3 mt-3 shadow">
                <h2>Estadísticas</h2>
                <h3>Día</h3>
                <h3>Mes</h3>
            </div>
        </div>
    </div>
</div>

<script>
    function btnUpdate(id, dos, tres, cuatro) {
        document.getElementById('id').value = id;
        document.getElementById('fecha').value = dos;
        document.getElementById('nombre').value = tres;
        document.getElementById('estado').value = cuatro;
    }

</script>
<?php
    include("../general/footer.php");
?>