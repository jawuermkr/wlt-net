<?php

    include("../general/header.php");

?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="card p-3 mt-3 shadow">
            <h2>TIPIFICACIÓN GENERAL</h2><hr>
            <form action="registro.php" method="post">
                <div class="row">
                    <h3>Datos de asesor/a</h3>
                    <div class="col-6">
                    <small>Nombres y apellidos</small>
                    <input class="form-control" type="text" name="nombreAse" readonly required value="<?php echo $_SESSION['nombre']; ?>">
                    </div>
                    <div class="col-3">
                    <small>Fecha registro</small>
                    <input class="form-control" type="text" name="fecha" readonly required value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="col-3">
                    <small>Marca</small>
                    <input class="form-control" type="text" name="marca" readonly required value="<?php echo $_SESSION['marca']; ?>">
                    </div>
                    <h3>Datos de cliente</h3>
                    <div class="col-6">
                    <small>Nombres y apellidos</small>
                    <input class="form-control" type="text" name="nombre" required>
                    </div>
                    <div class="col-6">
                    <small>Correo</small>
                    <input class="form-control" type="email" name="correo">
                    </div>
                    <div class="col-3">
                    <small>Núnero de contacto 1</small>
                    <input class="form-control" type="text" name="numU" required>
                    </div>
                    <div class="col-3">
                    <small>País</small>
                    <input class="form-control" type="text" name="pais" required>
                    </div>
                    <div class="col-3">
                    <small>Ciudad/Estado</small>
                    <input class="form-control" type="text" name="ciudad" required>
                    </div>
                    <div class="col-3">
                    <small>Estado NET</small>
                    <select class="form-control" type="text" name="estado" required>
                        <option value="">-- Seleccione --</option>
                        <option value="Activo">Activo</option>
                        <option value="Demo">Demo</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Desistio">Desistio</option>
                        <option value="No conecta">No conecta</option>
                        <option value="No contesta">No contesta</option>
                        <option value="Solicitud de pago">Solicitud de pago</option>
                    </select>
                    </div>
                    <h3>Datos de referidos</h3>
                    <div class="col-6">
                    <small>Nombre de referido</small>
                    <input class="form-control" type="text" name="refUno">
                    </div>
                    <div class="col-6">
                    <small>Núnero de contacto</small>
                    <input class="form-control" type="text" name="numRefU">
                    </div>
                    <div class="col-6">
                    <small>Nombre de referido</small>
                    <input class="form-control" type="text" name="refDos">
                    </div>
                    <div class="col-6">
                    <small>Núnero de contacto</small>
                    <input class="form-control" type="text" name="numRefD">
                    </div>
                    <div class="col-12">
                    <input class="form-control btn btn-outline-success" type="submit" name="btnTipifica" value="Registrar">
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['btnTipifica'])) {

                $identiAse = $_SESSION['id'];
                $fecha = date("Y-m-d");
                $marca = $_POST['marca'];
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $numU = $_POST['numU'];
                $pais = $_POST['pais'];
                $ciudad = $_POST['ciudad'];
                $estado = $_POST['estado'];
                $refUno = $_POST['refUno'];
                $numRefU = $_POST['numRefU'];
                $refDos = $_POST['refDos'];
                $numRefD = $_POST['numRefD'];

                include("../conexion.php");
                $conexion->query("INSERT INTO tipifica (identiAse, fecha, marca, nombre, correo, numU, pais, ciudad, estado, refUno, numRefU, refDos, numRefD) VALUES ('$identiAse','$fecha','$marca','$nombre','$correo','$numU','$pais','$ciudad','$estado','$refUno','$numRefU','$refDos','$numRefD')");
                include("../desconexion.php");
            }
            ?>

            </div>
        </div>
        <div class="col-3">
            <div class="card p-3 mt-3 shadow">
                <h2>¡Recuerda!</h2>
                <p>Antes de dar costos, hablar de los beneficios, del ahorro comparado con las diferentes marcas con las que se contrata regularmente.</p>
                <p>Conexción desde cualquier parte del mundo y desde cualquier dispositivo.</p>
                <p><a href="http://worldlinetv.com/app.apk">Descarga app para Android</a>
                <b>worldlinetv.com/app.apk</b></p>
            </div>
        </div>
    </div>
</div>





<?php
    include("../general/footer.php");
?>