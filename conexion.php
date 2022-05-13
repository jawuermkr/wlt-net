<?php

    $host = "localhost";
    $name = "root";
    $pass = "Asiste.2021";
    $database = "wlt";
    
    error_reporting(1);

    $conexion = new mysqli($host, $name, $pass, $database);

    if ($conexion->errno){
        echo "No se puede conectar a la base";
        exit();
    }
?>
