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
    $estado = $_POST['estado'];

    include("../conexion.php");

    $_UPDATE_SQL = "UPDATE tipifica Set
        fecha = '$fecha',
        nombre = '$nombre',
        estado = '$estado' WHERE id = '$id'";
}
mysqli_query($conexion, $_UPDATE_SQL);
include("../conexion.php");

header('Location: seguimiento.php');
?>