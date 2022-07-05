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
        estado = '$estado',
        tipif = '$tipif' WHERE id = '$id'";
}
mysqli_query($conexion, $_UPDATE_SQL);
include("../conexion.php");

echo $id . "<br/>";
echo $fecha . "<br/>";
echo $nombre . "<br/>";
echo $correo . "<br/>";
echo $numU . "<br/>";
echo $pais . "<br/>";
echo $ciudad . "<br/>";
echo $estado . "<br/>";
echo $tipif . "<br/>";


header('Location: seguimiento.php');
?>