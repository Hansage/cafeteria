<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Reservas Hotel Rawaye</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="row-fluid">
            <div class="col-xs-12">
                <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand active" href="#"><i class="fa fa-cubes fa-lg"></i> Hotel Rawaye</a>
                        </div>

                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="novedades.php"><i class="fa fa-bell fa-lg"></i> Novedades</a></li>
                                <li><a href="reservas.php"><i class="fa fa-briefcase fa-lg"></i> Reservas</a></li>
                                <li class="active"><a href="pasajeros.php"><i class="fa fa-taxi fa-lg"></i> Pasajeros</a></li>
                                <li><a href="habitaciones.php"><i class="fa fa-bank fa-lg"></i> Habitaciones</a></li>
                                <li><a href="bodega.php"><i class="fa fa-shopping-cart fa-lg"></i> Bodega</a></li>
                            </ul>
                            <ul class="nav navbar-nav pull-right">
                                <li><a href="cerrar.php"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesion</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>  
            </div>
        </div>

        <div class="row-fluid">
            <div class="col-xs-12">
                <h2 class="text-muted text-center">Listado de Pasajeros</h2>
            </div>
            

        <div class="row-fluid">
            <div class="col-xs-12">
                <br>
                <table class="table table-bordered table-condensed table-striped text-center">
                    <tr>
                        <th class="text-center">Rut</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Nacionalidad</th>
                        <th class="text-center">Procedencia</th>
                    </tr>
                    <?php
                    $peticion = "SELECT * FROM pasajeros";
                    $resultado = mysql_query($peticion);
                    while ($fila = mysql_fetch_array($resultado)) {
                        echo
                        "<tr><td>" . $fila['rut'] . "</td>"
                        . "<td>" . $fila['nombres'] . "</td>"
                        . "<td>" . $fila['apellidos'] . "</td> ."
                        . "<td>" . $fila['nacionalidad'] . "</td>"
                        . "<td>" . $fila['procedencia'] . "</td> ."
                        . "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="row-fluid">
            <div class="col-xs-12">
                <div class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
                    <div class="container">
                        <div class="navbar-text pull-left">
                            <p>@Hotel Rawaye</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>