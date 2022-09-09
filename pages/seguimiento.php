<?php

    include("../general/header.php");

    $fecha_dia = date('Y-m-d');
    $fecha_i_mes = date('Y-m-01');
    $fecha_f_mes = date('Y-m-t');
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
                    <th>Reaccion del cliente</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contacto</th>
                    <th>País</th>
                    <th>Ciudad</th>
                    <th>Fuente</th>
                    <th>Valor</th>
                    <th>Moneda</th>
                    <th>Estado</th>
                    <th>Tipificación</th>
                    <th>Observaciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($clientes as $cliente) { ?>
                    <tr>
                    <td>
                    <button class="btn btn-primary" onclick="btnUpdate(
                        '<?php echo $cliente['id']; ?>', 
                        '<?php echo $cliente['fecha']; ?>', 
                        '<?php echo $cliente['nombre']; ?>',
                        '<?php echo $cliente ['correo']; ?>',
                        '<?php echo $cliente ['numU']; ?>',
                        '<?php echo $cliente ['pais']; ?>',
                        '<?php echo $cliente ['ciudad']; ?>', 
                        '<?php echo $cliente['estado']; ?>',
                        '<?php echo $cliente['valor']; ?>',
                        '<?php echo $cliente['fuente']; ?>',
                        '<?php echo $cliente['moneda']; ?>')" 
                        data-toggle="modal" data-target="#modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg></button>
                    </td>
                    <td><?php echo $cliente ['identiAse']; ?></td>
                    <td><?php echo $cliente ['fecha']; ?></td>
                    <td><?php echo $cliente ['fecha_reaccion']; ?></td>
                    <td><?php echo $cliente ['nombre']; ?></td>
                    <td><?php echo $cliente ['correo']; ?></td>
                    <td><?php echo $cliente ['numU']; ?></td>
                    <td><?php echo $cliente ['pais']; ?></td>
                    <td><?php echo $cliente ['ciudad']; ?></td>
                    <td><?php echo $cliente ['fuente']; ?></td>
                    <td><?php echo $cliente ['valor']; ?></td>
                    <td><?php echo $cliente ['moneda']; ?></td>
                    <td><?php echo $cliente ['estado']; ?></td>
                    <td><?php echo $cliente ['tipif']; ?></td>
                    <td><?php echo $cliente ['obs']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
                
                <!-- Modal  Actualizar -->
                <div class="modal fade bd-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="actualizar.php" method="post">
                                <div class="row">
                                    <input class="form-control" type="hidden" name="id" id="id">
                                    <div class="col-4">
                                    <label>Fecha de contacto</label>
                                    <input class="form-control" type="date" name="fecha" id="fecha">
                                    </div>
                                    <div class="col-8">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="nombre" id="nombre">
                                    </div>
                                    <div class="col-3">
                                    <label>Correo</label>
                                    <input class="form-control" type="text" name="correo" id="correo">
                                    </div>
                                    <div class="col-3">
                                    <label>Número</label>
                                    <input class="form-control" type="text" name="numU" id="numU">
                                    </div>
                                    <div class="col-3">
                                    <label>País</label>
                                    <input class="form-control" type="text" name="pais" id="pais">
                                    </div>
                                    <div class="col-3">
                                    <label>Ciudad</label>
                                    <input class="form-control" type="text" name="ciudad" id="ciudad">
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

                                    <div class="col-4">
                                    <small>Fuente</small>
                                    <select class="form-control" type="text" name="fuente" id="fuente" required>
                                        <option value="">Seleccione fuente</option>    
                                        <option value="Pauta Paga">Pauta Paga</option>
                                        <option value="Pauta Orgánica">Pauta Orgánica</option>
                                        <option value="Referido">Referido</option>
                                        <option value="Base">Base</option>
                                    </select>
                                    </div>
                                    <div class="col-4">
                                    <small>Valor de venta</small>
                                    <input class="form-control" type="text" name="valor" id="valor">
                                    </div>
                                    <div class="col-4">
                                    <small>Moneda</small>
                                    <select class="form-control" type="text" name="moneda" id="moneda">
                                        <option value="">Seleccione moneda</option>    
                                        <option value="Dolar USD">Dolar USD</option>
                                        <option value="Euro EUR">Euro EUR</option>
                                        <option value="Peso colombiano COP">Peso colombiano COP</option>
                                    </select>
                                    </div>
                                    
                                    <input class="form-control btn-outline-success" type="submit" name="btnA" value="Actualizar">
                                </div>
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
                    <th>Reaccion del cliente</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contacto</th>
                    <th>País</th>
                    <th>Ciudad</th>
                    <th>Fuente</th>
                    <th>Valor</th>
                    <th>Moneda</th>
                    <th>Estado</th>
                    <th>Tipificación</th>
                    <th>Observaciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($clientes as $cliente) { ?>
                    <tr>
                    <td><?php echo $cliente ['identiAse']; ?></td>
                    <td><?php echo $cliente ['fecha']; ?></td>
                    <td><?php echo $cliente ['fecha_reaccion']; ?></td>
                    <td><?php echo $cliente ['nombre']; ?></td>
                    <td><?php echo $cliente ['correo']; ?></td>
                    <td><?php echo $cliente ['numU']; ?></td>
                    <td><?php echo $cliente ['pais']; ?></td>
                    <td><?php echo $cliente ['ciudad']; ?></td>
                    <td><?php echo $cliente ['fuente']; ?></td>
                    <td><?php echo $cliente ['valor']; ?></td>
                    <td><?php echo $cliente ['moneda']; ?></td>
                    <td><?php echo $cliente ['estado']; ?></td>
                    <td><?php echo $cliente ['tipif']; ?></td>
                    <td><?php echo $cliente ['obs']; ?></td>
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
                <div>
                <canvas id="dia"></canvas>
                </div>
                <h3>Mes</h3>
                <div>
                <canvas id="mes"></canvas>
                </div>
                <?php  
                // Gráficas
                include("../conexion.php");
                $sql = "SELECT COUNT(*) id FROM tipifica WHERE fecha = '$fecha_dia'";
                $resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());
                $clientes = array();
                while( $rows = mysqli_fetch_assoc($resultado) ) {
                    $dia = $rows['id'];
                }
                $sql = "SELECT COUNT(*) id FROM tipifica WHERE fecha BETWEEN '$fecha_i_mes' AND '$fecha_f_mes'";
                $resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());
                $clientes = array();
                while( $rows = mysqli_fetch_assoc($resultado) ) {
                    $mes = $rows['id'];
                }
                include("../desconexion.php");
            ?>
            </div>
        </div>
    </div>
</div>

<script>
    function btnUpdate(id, dos, tres, cuatro, cinco, seis, siete, ocho, nueve, diez, once) {
        document.getElementById('id').value = id;
        document.getElementById('fecha').value = dos;
        document.getElementById('nombre').value = tres;
        document.getElementById('correo').value = cuatro;
        document.getElementById('numU').value = cinco;
        document.getElementById('pais').value = seis;
        document.getElementById('ciudad').value = siete;
        document.getElementById('fuente').value = ocho;
        document.getElementById('valor').value = nueve;
        document.getElementById('moneda').value = diez;
    }
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
        activo: ["1 Pantalla Mensual","2 Pantalla Mensual","3 Pantalla Mensual","4 Pantalla Mensual","5 Pantalla Mensual","1 Pantalla Trimestral","2 Pantalla Trimestral","3 Pantalla Trimestral","4 Pantalla Trimestral","5 Pantalla Trimestral","1 Pantalla Semestral","2 Pantalla Semestral","3 Pantalla Semestral","4 Pantalla Semestral","5 Pantalla Semestral","1 Pantalla Anual","2 Pantalla Anual","3 Pantalla Anual","4 Pantalla Anual","5 Pantalla Anual"],
        desistió: ["Precio / Competencia","Inconformidad con la plataforma","Servicio Activo","Desconfianza","No le interesa"],
        no_contacto: ["Visto /Leído","Sin WhatsApp","Bloqueo"],
        sin_respuesta: ["Uso demo / Sin respuesta","No tiene tiempo","Sin intención de compra"],
        gestión_en_proceso: ["Cliente en gestion","Volver a llamar","Demo activo","Solicitud de demo","Solicitud de pago","Problemas descargar la APP","Posible venta"]
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