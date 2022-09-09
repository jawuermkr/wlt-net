<?php

session_start();
ob_start();

// ********************
// ACTUALIZAR
//*********************

if (isset($_POST['btnA'])) {

    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $numU = $_POST['numU'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];

    $fuente = $_POST['fuente'];
    $valor = $_POST['valor'];
    $moneda = $_POST['moneda'];

    $estado = $_POST['estado'];
    $tipif = $_POST['tipif'];

    include("../conexion.php");

    $_UPDATE_SQL = "UPDATE tipifica Set
        fecha = '$fecha',
        nombre = '$nombre',
        correo = '$correo',
        numU = '$numU',
        pais = '$pais',
        ciudad = '$ciudad',

        fuente = '$fuente',
        valor = '$valor',
        moneda = '$moneda',

        estado = '$estado',
        tipif = '$tipif' WHERE id = '$id'";
}
mysqli_query($conexion, $_UPDATE_SQL);
include("../conexion.php");

header('Location: seguimiento.php');
?>