<?php
    include("../general/header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="card p-3 mt-3 shadow">
            <h2>TIPIFICACIÓN GENERAL</h2><hr>
            <form action="dashboard.php" method="post">
                <div class="row">
                    <h3>Datos de cliente</h3>
                    <div class="col-6">
                    <small>Nombres y apellidos</small>
                    <input class="form-control" type="text" name="nombre" required>
                    </div>
                    <div class="col-3">
                    <small>Núnero de contacto 1</small>
                    <input class="form-control" type="text" name="numU" required>
                    </div>
                    <div class="col-3">
                    <small>Núnero de contacto 2</small>
                    <input class="form-control" type="text" name="numD">
                    </div>
                    <div class="col-6">
                    <small>Correo</small>
                    <input class="form-control" type="email" name="correo">
                    </div>
                    <div class="col-3">
                    <small>País</small>
                    <input class="form-control" type="text" name="pais" required>
                    </div>
                    <div class="col-3">
                    <small>Ciudad/Estado</small>
                    <input class="form-control" type="text" name="ciudad" required>
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

                # $user = $_SESSION['user'];
                $nombre = $_POST['nombre'];
                $numU = $_POST['numU'];
                $numD = $_POST['numD'];
                $correo = $_POST['correo'];
                $pais = $_POST['pais'];
                $ciudad = $_POST['ciudad'];
                $refUno = $_POST['refUno'];
                $numRefU = $_POST['numRefU'];
                $refDos = $_POST['refDos'];
                $numRefD = $_POST['numRefD'];

                include("../conexion.php");
                $conexion->query("INSERT INTO tipifica (nombre, numU, numD, correo, pais, ciudad, refUno, numRefU, refDos, numRefD) VALUES ('$nombre','$numU','$numD','$correo','$pais','$ciudad','$refUno','$numRefU','$refDos','$numRefD')");
                include("../desconexion.php");
            
            }
            ?>

            </div>
        </div>
        <div class="col-3">
            <div class="card p-3 mt-3 shadow">
                <h2>¡Recuerda!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </div>
        </div>
    </div>
</div>





<?php
    include("../general/footer.php");
?>