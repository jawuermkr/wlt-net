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
                        <small>Estado</small>
                        <select class="form-control" name="estado" id="estado" onchange="cargarPueblos();">
                            <option value="">Seleccione estado</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <small>Tipíficación</small>
                        <select class="form-control" name="tipif" id="tipif">
                            <option value="">Seleccione tipificación</option>
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
function cargarProvincias() {
    var array = ["Activo","Desistió","No_contacto","Sin_respuesta","Gestión_en_proceso"];
    array.sort();
    addOptions("estado", array);
}

//Función para agregar opciones a un <select>.
function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (provincia in array) {
        var opcion = document.createElement("option");
        opcion.text = array[provincia];
        // Añadimos un value a los option para hacer mas facil escoger los pueblos
        opcion.value = array[provincia].toLowerCase()
        selector.add(opcion);
    }
}

function cargarPueblos() {
    // Objeto de provincias con pueblos
    var listaPueblos = {
      activo: ["Paquete Mensual","Paquete 3 meses","Paquete 6 meses","Paquete 12 meses"],
      desistió: ["Paquete Mensual","Precio / Competencia","Inconformidad con la plataforma","Medio de pago","Servicio Activo"],
      no_contacto: ["Visto /Leído","Sin WhatsApp","Bloqueo"],
      sin_respuesta: ["Uso demo / Sin respuesta","Servicio Gratis","No tiene tiempo","Sin intención de compra","Problemas descargar la APP"],
      gestión_en_proceso: ["Demo activo","Solicitud de demo","Solicitud de pago","Posible venta","Cliente en gestión"]
    }
    
    var provincias = document.getElementById('estado')
    var pueblos = document.getElementById('tipif')
    var provinciaSeleccionada = provincias.value
    
    // Se limpian los pueblos
    pueblos.innerHTML = '<option value="">Tipificación...</option>'
    
    if(provinciaSeleccionada !== ''){
      // Se seleccionan los pueblos y se ordenan
      provinciaSeleccionada = listaPueblos[provinciaSeleccionada]
      provinciaSeleccionada.sort()
    
      // Insertamos los pueblos
      provinciaSeleccionada.forEach(function(pueblo){
        let opcion = document.createElement('option')
        opcion.value = pueblo
        opcion.text = pueblo
        pueblos.add(opcion)
      });
    }
    
  }
  
// Iniciar la carga de provincias solo para comprobar que funciona
cargarProvincias();
</script>

<?php
    include("../general/footer.php");
?>
