<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Novedades Hotel Rawaye</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

    </head>
    <body>
        <?php
        session_start();
        ?>

        <?php
        $var1 = "";
        $var2 = "";
        $var3 = "";
        $var4 = "";

        if (isset($_POST["submit"])) {
            $btn = $_POST["submit"];
        }
        ?>


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
                                <li class="active"><a href="novedades.php"><i class="fa fa-bell fa-lg"></i> Novedades</a></li>
                                <li><a href="reservas.php"><i class="fa fa-briefcase fa-lg"></i> Reservas</a></li>
                                <li><a href="pasajeros.php"><i class="fa fa-taxi fa-lg"></i> Pasajeros</a></li>
                                <li><a href="habitaciones.php"><i class="fa fa-bank fa-lg"></i> Habitaciones</a></li>
                                <li><a href="bodega.php"><i class="fa fa-shopping-cart fa-lg"></i> Bodega</a></li>
                                <li><a href="#"><i class="fa fa-pie-chart fa-lg"></i> Reportes</a></li>
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
            <div class="col-xs-10">
                <h2 class="text-muted text-center">Últimas Novedades</h2>
            </div>
            <div class="col-xs-2">
                <br>
                <a class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#modal">Menu Novedades</a>
                <div class="modal fade" id="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Menu Novedades</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row-fluid">
                                    <div class="col-xs-12">
                                        <br>
                                        <form role="form" action="querys/agregar_novedad.php" method="POST" name="form">
                                            <div class="form-group">
                                                <label for="">Ingrese Fecha</label>
                                                <input type="date" class="form-control" id="datepicker" placeholder="Ingrese Fecha" name="fecha_novedad">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Encargado</label>
                                                <select class="form-control" name="encargado">
                                                    <option>Seleccione su Encargado</option>
                                                    <?php
                                                    $sql = "SELECT * FROM login";
                                                    $rec = mysql_query($sql);
                                                    while ($row = mysql_fetch_array($rec)) {
                                                        echo "<option>";
                                                        echo $row['usuario'];
                                                        echo "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Añadir Novedad</label>
                                                <textarea class="form-control" rows="3" name="novedad"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary" value="Agregar"><i class="fa fa-comment-o fa-lg"></i> Añadir Novedad</button>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-magic fa-lg"></i> Limpiar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row-fluid">

            <div class="col-xs-12">
                <br>
                <table class="table table-bordered table-condensed table-striped text-center">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Encargado</th>
                    </tr>
                    <?php
                    $peticion = "SELECT * FROM novedades";
                    $resultado = mysql_query($peticion);
                    while ($fila = mysql_fetch_array($resultado)) {
                        echo
                        "<tr>"
                        . "<td>" . $fila['id'] . "</td>"
                        . "<td>" . $fila['fecha'] . "</td>"
                        . "<td>" . $fila['descripcion'] . "</td>"
                        . "<td>" . $fila['encargado'] . "</td>"
                        . "</tr>";
                    }
                    ?>
                </table>
            </div>
            
            <div class="col-xs-2">
                <form role="form" action="querys/realizar_novedad.php" method="POST" name="form">
                    <div class="form-group">
                        <label for="">Novedades</label>
                        <select class="form-control" name="id_novedad">
                            <option>Seleccione su Encargado</option>
                            <?php
                            $sql = "SELECT * FROM novedades";
                            $rec = mysql_query($sql);
                            while ($row = mysql_fetch_array($rec)) {
                                echo "<option>";
                                echo $row['id'];
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-comment-o fa-lg"></i>Realizar Novedad</button>
                </form>
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
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        <script src="jquery.ui.datepicker-es.js"></script>
        <script>
            $(function() {
                $.datepicker.setDefaults($.datepicker.regional["es"]);
                $("#datepicker").datepicker({
                    firstDay: 1
                });
            });
        </script>
    </body>
</html>