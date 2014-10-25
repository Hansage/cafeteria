<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Bodega Hotel Rawaye</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    </head>
    <body>
        <?php
        session_start();
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
                                <li><a href="ventas.php"><i class="fa fa-bell fa-lg"></i> Ventas</a></li>
                                <li><a href="compras.php"><i class="fa fa-briefcase fa-lg"></i> Compras</a></li>
                                <li class="active"><a href="bodega.php"><i class="fa fa-bank fa-lg"></i> Inventarios</a></li>
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

        <div class="row-fluid">
            <div class="col-xs-7">
                <br>
                <br>
                <table class="table table-bordered table-condensed table-striped text-center">
                    <tr>
                        <th class="text-center">ID Producto</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Cantidad</th>
                    </tr>
                    <?php
                    $peticion = "SELECT * FROM bodega";
                    $resultado = mysql_query($peticion);
                    while ($fila = mysql_fetch_array($resultado)) {
                        echo
                        "<tr><td>" . $fila['id_producto'] . "</td>"
                        . "<td>" . $fila['descripcion'] . "</td>"
                        . "<td>" . $fila['tipo'] . "</td>"
                        . "<td>" . $fila['cantidad'] . "</td>"
                        . "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-xs-5">
                <br>
                <br>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#home" role="tab" data-toggle="tab">Producto</a></li>
                    <li><a href="#profile" role="tab" data-toggle="tab">Sacar Producto</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <form role="form" action="querys/agregar_producto.php" method="POST">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Producto</label>
                                    <input type="text" class="form-control" name="producto" placeholder="Producto">
                                </div>
                                <div class="form-group">
                                    <label for="">Tipo</label>
                                    <input type="text" class="form-control" name="tipo" placeholder="Tipo">
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Descripcion"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Cantidad</label>
                                    <input type="text" class="form-control" name="cantidad" placeholder="Cantidad">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="Buscar"><i class="fa fa-search fa-lg"></i> Buscar</button>
                            <button type="submit" class="btn btn-primary" name="Agregar"><i class="fa fa-star fa-lg"></i> Nuevo Producto</button>
                            <button type="submit" class="btn btn-danger" name="Modificar"><i class="fa fa-wrench fa-lg"></i> Modificar</button>
                            <button type="submit" class="btn btn-primary" name="Borrar"><i class="fa fa-trash fa-lg"></i> Borrar</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="profile">
                        <form role="form" action="querys/sacar_producto.php" method="POST">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="">Producto</label>
                                    <input type="text" class="form-control" name="descripcion" placeholder="Producto">
                                </div>
                                <div class="form-group">
                                    <label for="">Cantidad</label>
                                    <input type="text" class="form-control" name="cantidad" placeholder="cantidad">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="Sacar"><i class="fa fa-search fa-lg"></i> Sacar Producto</button>
                        </form>
                    </div>
                </div>
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
                $("#fecha_ingreso").datepicker({
                    firstDay: 1
                });
            });
        </script>
        <script>
            $(function() {
                $.datepicker.setDefaults($.datepicker.regional["es"]);
                $("#fecha_salida").datepicker({
                    firstDay: 1
                });
            });
        </script>
    </body>
</html>