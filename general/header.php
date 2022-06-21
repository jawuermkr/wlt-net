<?php
session_start();
ob_start();

if($_SESSION['correcto'] <> 1){
  header("Location:../index.php");
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/estilos.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<header class="p-3 bg-dark bg-gradient text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><img class="m-auto" src="../img/logo-white.png" width="45px"></li>
            <li><a href="dashboard.php" class="nav-link px-2 text-white">Dashboard</a></li>
            <li><a href="registro.php" class="nav-link px-2 text-white">Registro</a></li>
            <li><a href="seguimiento.php" class="nav-link px-2 text-white">Seguimiento</a></li>
        </ul>

        <div class="text-end">
          <?php
          echo "<p class='text-white'>" . $_SESSION['nombre'] . " | " ;
          ?>
          <a href="../index.php">Salir</a></p>
        </div>
      </div>
    </div>
</header>