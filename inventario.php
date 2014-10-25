<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Inventario Cafeteria</title>

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
            $var5 = "";

            if (isset($_POST["submit"])) {
                $btn = $_POST["submit"];
                $bus = $_POST["n_habitacion"];


                if ($btn == "Buscar") {
                    $sql_buscar = "SELECT * FROM habitaciones WHERE n_habitacion='$bus'";
                    $con_buscar = mysql_query($sql_buscar,$con);
                    while ($resul = mysql_fetch_array($con_buscar)) {
                        $var1=$resul[0];
                        $var2=$resul[1];
                        $var3=$resul[2];
                        $var4=$resul[3];
                        $var5=$resul[4];                   
                    }
                }

                if ($btn == "Modificar") {
                    $n_habitacion = $_POST["n_habitacion"];
                    $tipo = $_POST["tipo"];
                    $precio = $_POST["precio"];
                    $descripcion = $_POST["descripcion"];
                    $estado = $_POST["estado"];

                    $sql_modificar = "UPDATE habitaciones SET tipo='$tipo',precio='$precio',descripcion='$descripcion',estado='$estado' WHERE  n_habitacion='$n_habitacion'";
                    $con_modificar=mysql_query($sql_modificar,$con);
                    echo "<script> alert('Se actualizo correctamente');</script>";

                }

                if ($btn == "Borrar") {
                    $n_habitacion = $_POST["n_habitacion"];

                    $sql_borrar = "DELETE FROM habitaciones WHERE n_habitacion='$n_habitacion'";
                    $con_borrar = mysql_query($sql_borrar,$con);
                    echo "<script> alert('Se Borro correctamente');</script>";
                }

            
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
                                <li><a href="ventas.php"><i class="fa fa-bell fa-lg"></i> Ventas</a></li>
                                <li><a href="compras.php"><i class="fa fa-briefcase fa-lg"></i> Compras</a></li>
                                <li class="active"><a href="bodega.php"><i class="fa fa-bank fa-lg"></i> Habitaciones</a></li>
                                <li><a href="proveedores.php"><i class="fa fa-shopping-cart fa-lg"></i> Bodega</a></li>
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
                <br>
                <br>
                <div class="col-xs-7">
                    <table class="table table-bordered table-condensed table-striped text-center">
                    <tr>
                        <th class="text-center">N° Habitacion</th>
                        <th class="text-center">Tipo Habitacion</th>
                        <th class="text-center">Precio Habitacion</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Estado</th>
                    </tr>
                    <?php
                    $peticion = "SELECT * FROM habitaciones";
                    $resultado = mysql_query($peticion);
                    while ($fila = mysql_fetch_array($resultado)) {
                        echo
                        "<tr><td>" . $fila['n_habitacion'] . "</td>"
                        . "<td>" . $fila['tipo'] . "</td>"
                        . "<td>" . $fila['precio'] . "</td>"
                        . "<td>" . $fila['descripcion'] . "</td>"
                        . "<td>" . $fila['estado'] . "</td>"
                        . "</tr>";
                    }
                    ?>
                </table>
                </div>
                <div class="col-xs-5">
                    <br>
                    <br>
                    <form role="form" action="" method="POST">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="">N° Habitacion</label>
                                <input type="text" class="form-control" name="n_habitacion" placeholder="Ingrese N° Habitacion" value="<?php echo $var1?>">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">Tipo Habitacion</label>
                                <input type="text" class="form-control" name="tipo" placeholder="Ingrese tipo de habitacion" value="<?php echo $var2?>">
                            </div>
                            <div class="form-group">
                                <label for="">Precio Habitacion</label>
                                <input type="text" class="form-control" name="precio" placeholder="Ingrese precio de habitacion" value="<?php echo $var3?>">
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="">Descripcion Habitacion</label>
                                <input type="date" class="form-control" name="descripcion" placeholder="Ingrese descripcion habitacion" value="<?php echo $var4?>">
                            </div>
                            <div class="form-group">
                                <label for="">Estado Habitacion</label>
                                <select name="estado" class="form-control">
                                    <option value="<?php echo $var5?>">Estado de habitacion</option>
                                    <option >Disponible</option>
                                    <option>Ocupada</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="Buscar" class="btn btn-primary"><i class="fa fa-search fa-lg"></i> Buscar</button>
                        <button type="submit" name="submit" value="Modificar" class="btn btn-danger"><i class="fa fa-wrench fa-lg"></i> Modificar</button>
                        <button type="submit" name="submit" value="Borrar" class="btn btn-primary"><i class="fa fa-trash fa-lg"></i> Borrar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="col-xs-12">
                <br>
                
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