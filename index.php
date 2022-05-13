<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4 card mt-5 p-5 shadow">
            <img class="m-auto pb-5" src="img/logo.png" width="60%">
            <form>
                <label>Usuario</label>
                <input class="form-control" type="text" name="user">
                <label>Contraseña</label>
                <input class="form-control" type="password" name="pass">
                <!--- <input class="form-control btn btn-outline-primary" type="submit" name="btnLogin" value="Ingresar"> --->
                <button type="button" class="form-control btn btn-outline-primary"><a href="pages/dashboard.php">Ingresar</a></button>
            </form>
        </div>
        <div class="col-4">
        </div>
    </div>
</div>

</body>
</html>