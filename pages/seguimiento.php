<?php

    include("../general/header.php");

?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="card p-3 mt-3 shadow">    
                <h2>Consulta general</h2>
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
                        <div class="col-4">    
                            <label><small></small></label>
                            <input class="form-control btn btn-outline-success" type="submit" name="btnCon" value="Consultar">
                        </div>
                    </div>

                </form>
                <?php
                // Consultar tabla clientes
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





<?php
    include("../general/footer.php");
?>