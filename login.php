<?php
  session_start();
    if (isset($_SESSION["usuario"])) {
      header("Location: novedades.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio Sesion Hotel Rawaye</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">

      <form class="form-signin well" role="form" style="text-align:center" action="validar.php" method="post">
        <h2 class="form-signin-heading">Inicio de Sesion</h2>
        <div class="form-group">
          <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-user fa-lg"></i></div>
          <input class="form-control" type="text" placeholder="Ingrese su Usuario" name="usuario">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-shield fa-lg"></i></div>
            <input class="form-control" type="text" placeholder="Ingrese su Clave" name="password">
          </div>
        </div>

        <button href="novedades.html" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>
      </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>