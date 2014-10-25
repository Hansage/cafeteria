<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Ventas Cafeteria</title>

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
                                <li class="active"><a href="ventas.php"><i class="fa fa-bell fa-lg"></i> Ventas</a></li>
                                <li><a href="compras.php"><i class="fa fa-briefcase fa-lg"></i> Compras</a></li>
                                <li><a href="bodega.php"><i class="fa fa-bank fa-lg"></i> Inventarios</a></li>
                                <li><a href="proveedores.php"><i class="fa fa-shopping-cart fa-lg"></i> Proveedores</a></li>
                            </ul>
                            <ul class="nav navbar-nav pull-right">
                                <li><a href="cerrar.php"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesion</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>  
            </div>
        </div>

    </div>

    <div class="row-fluid">
        <div class="col-xs-12">
            <h2 class="text-muted text-center">Ventas</h2>
        </div>

        <div class="col-xs-7">
            <br>
            <table class="table table-bordered table-condensed table-striped text-center">
                <tr>
                    <th class="text-center">ID Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Precio Unitario</th>
                    <th class="text-center">Valor</th>
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

        <div class="col-xs-5">
            <br>
            <br>
            <form role="form" action="" method="POST">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="">Nro Boleta</label>
                        <input type="text" class="form-control" name="n_reserva" value="">
                    </div>
                </div>
                <div class="col-xs-6">
                <div class="form-group">
                        <label for="">Fecha</label>
                        <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" >
                    </div>
                    </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="">Vendedor</label>
                        <input type="text" class="form-control" id="" name="rut" >
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="">Sede</label>
                        <input type="text" class="form-control" id="" name="nombres" >
                    </div>
                </div>


                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="">ID Producto</label>
                        <input type="text" class="form-control" id="" name="id_producto" >
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="text" class="form-control" id="" name="cantidad" >
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="">Desripcion</label>
                        <input type="text" class="form-control" id="" name="procedencia">
                    </div>
                    <div class="form-group">
                        <label for="">Precio Unitario</label>
                        <input type="text" class="form-control" id="" name="procedencia" >
                    </div>
                </div>
                <div class="col-xs-12">
                <button type="submit" name="submit" value="Confirmar" class="btn btn-primary"><i class="fa fa-check fa-lg"></i> Confirmar</button>
                <button type="submit" name="submit" value="Limpiar" class="btn btn-primary"><i class="fa fa-trash fa-lg"></i> Limpiar</button>
                <a href="informe_ventas.php"><i class="fa fa-file-archive-o fa-lg"></i> Informe de Ventas</a>
                </div>
            </form>
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
            $(function () {
                $.datepicker.setDefaults($.datepicker.regional["es"]);
                $("#datepicker").datepicker({
                    firstDay: 1
                });
            });
        </script>
</body>
</html>