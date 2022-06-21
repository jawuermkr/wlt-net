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
                    <input class="form-control" type="text" name="fecha" required value="<?php echo date("Y-m-d"); ?>">
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
                    <div class="col-4">
                    <small>Núnero de contacto 1</small>
                    <input class="form-control" type="text" name="numU" required>
                    </div>
                    <div class="col-4">
                    <small>País</small>
                    <input class="form-control" type="text" name="pais" required>
                    </div>
                    <div class="col-4">
                    <small>Ciudad/Estado</small>
                    <input class="form-control" type="text" name="ciudad" required>
                    </div>

                    <div class="col-6">
                    <small>Estado NET</small>
                    <select class="form-control" id="estado" type="text" name="estado" required onchange="tipifica()">
                        <option value="">-- Seleccione --</option>
                        <option value="Activo">Activo</option>
                        <option value="Desistió">Desistió</option>
                        <option value="No contacto">No contacto</option>
                        <option value="Sin respuesta">Sin respuesta</option>
                        <option value="Gestión en proceso">Gestión en proceso</option>
                    </select>
                    </div>


                    <div id="activo" class="col-6" style="display:none">
                    <small>Activo</small>
                    <select class="form-control" type="text" name="tipif">
                        <option value="">-- Seleccione --</option>
                        <option value="Paquete Mensual">Paquete Mensual</option>
                        <option value="Paquete 3 meses">Paquete 3 meses</option>
                        <option value="Paquete 6 meses">Paquete 6 meses</option>
                        <option value="Paquete 12 meses">Paquete 12 meses</option>
                    </select>
                    </div>
                    <div id="desistio" class="col-6" style="display:none">
                    <small>Desistió</small>
                    <select class="form-control" type="text" name="tipif">
                        <option value="">-- Seleccione --</option>
                        <option value="Paquete Mensual">Paquete Mensual</option>
                        <option value="Precio / Competencia">Precio / Competencia</option>
                        <option value="Inconformidad con la plataforma">Inconformidad con la plataforma</option>
                        <option value="Medio de pago">Medio de pago</option>
                        <option value="Servicio Activo">Servicio Activo</option>
                    </select>
                    </div>
                    <div id="noContacto" class="col-6" style="display:none">
                    <small>No contacto</small>
                    <select class="form-control" type="text" name="tipif">
                        <option value="">-- Seleccione --</option>
                        <option value="Visto /Leído">Visto /Leído</option>
                        <option value="Sin WhatsApp">Sin WhatsApp</option>
                        <option value="Bloqueo">Bloqueo</option>
                    </select>
                    </div>
                    <div id="sinRespuesta" class="col-6" style="display:none">
                    <small>Sin respuesta</small>
                    <select class="form-control" type="text" name="tipif">
                        <option value="">-- Seleccione --</option>
                        <option value="Uso demo / Sin respuesta">Uso demo / Sin respuesta</option>
                        <option value="Servicio Gratis">Servicio Gratis</option>
                        <option value="No tiene tiempo">No tiene tiempo</option>
                        <option value="Sin intención de compra">Sin intención de compra</option>
                        <option value="Problemas descargar la APP">Problemas descargar la APP</option>
                    </select>
                    </div>
                    <div id="gestionProceso" class="col-6" style="display:none">
                    <small>Gestión en proceso</small>
                    <select class="form-control" type="text" name="tipif">
                        <option value="">-- Seleccione --</option>
                        <option value="Demo activo">Demo activo</option>
                        <option value="Solicitud de demo">Solicitud de demo</option>
                        <option value="Solicitud de pago">Solicitud de pago</option>
                        <option value="Posible venta">Posible venta</option>
                        <option value="Cliente en gestión">Cliente en gestión</option>
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
                $fecha = $_POST['fecha'];
                $marca = $_POST['marca'];
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $numU = $_POST['numU'];
                $pais = $_POST['pais'];
                $ciudad = $_POST['ciudad'];
                $estado = $_POST['estado'];
                $tipif = $_POST['tipif'];
                $refUno = $_POST['refUno'];
                $numRefU = $_POST['numRefU'];
                $refDos = $_POST['refDos'];
                $numRefD = $_POST['numRefD'];

                include("../conexion.php");
                $conexion->query("INSERT INTO tipifica (identiAse, fecha, marca, nombre, correo, numU, pais, ciudad, estado, tipif, refUno, numRefU, refDos, numRefD) VALUES ('$identiAse','$fecha','$marca','$nombre','$correo','$numU','$pais','$ciudad','$estado','$tipif','$refUno','$numRefU','$refDos','$numRefD')");
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

<script>
    function tipifica() {
        estado = document.getElementById('estado').value

        if(estado == 'Activo'){
            document.getElementById('activo').style.display = "block";
            document.getElementById('desistio').style.display = "none";
            document.getElementById('noContacto').style.display = "none";
            document.getElementById('sinRespuesta').style.display = "none";
            document.getElementById('gestionProceso').style.display = "none";
        }else if(estado == 'Desistió') {
            document.getElementById('activo').style.display = "none";
            document.getElementById('desistio').style.display = "block";
            document.getElementById('noContacto').style.display = "none";
            document.getElementById('sinRespuesta').style.display = "none";
            document.getElementById('gestionProceso').style.display = "none";
        }else if(estado == 'No contacto') {
            document.getElementById('activo').style.display = "none";
            document.getElementById('desistio').style.display = "none";
            document.getElementById('noContacto').style.display = "block";
            document.getElementById('sinRespuesta').style.display = "none";
            document.getElementById('gestionProceso').style.display = "none";
        }else if(estado == 'Sin respuesta') {
            document.getElementById('activo').style.display = "none";
            document.getElementById('desistio').style.display = "none";
            document.getElementById('noContacto').style.display = "none";
            document.getElementById('sinRespuesta').style.display = "block";
            document.getElementById('gestionProceso').style.display = "none";
        }else if(estado == 'Gestión en proceso') {
            document.getElementById('activo').style.display = "none";
            document.getElementById('desistio').style.display = "none";
            document.getElementById('noContacto').style.display = "none";
            document.getElementById('sinRespuesta').style.display = "none";
            document.getElementById('gestionProceso').style.display = "block";
        }
    }
</script>

<?php
    include("../general/footer.php");
?>
