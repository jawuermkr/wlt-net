<?php

    $host = "localhost";
    $name = "root";
    $pass = "";
    $database = "";
    
    error_reporting(1);

    $conexion = new mysqli($host, $name, $pass, $database);

    if ($conexion->errno){
        echo "No se puede conectar a la base";
        exit();
    }
?>
