<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Proveedores Cafeteria</title>

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
            $var1="";
            $var2="";
            $var3="";
            $var4="";
            $var5="";
            $var6="";
            $var7="";
            $var8="";
            $var9="";
            
            if (isset($_POST["submit"])) {
                $btn = $_POST["submit"];
                $bus = $_POST["n_reserva"];

                if ($btn == "Buscar") {
                    $sql_buscar = "SELECT * FROM reservas WHERE n_reserva='$bus'";
                    $con_buscar = mysql_query($sql_buscar,$con);
                    while ($resul = mysql_fetch_array($con_buscar)) {
                        $var1=$resul[0];
                        $var2=$resul[1];
                        $var3=$resul[2];
                        $var4=$resul[3];
                        $var5=$resul[4];
                        $var6=$resul[5];
                        $var7=$resul[6];
                        $var8=$resul[7];
                        $var9=$resul[8];
                    }
                }

                if ($btn == "Agregar") {
                    $rut = $_POST["rut"];
                    $nombres = $_POST["nombres"];
                    $apellidos = $_POST["apellidos"];
                    $nacionalidad = $_POST["nacionalidad"];
                    $procedencia = $_POST["procedencia"];
                    $fecha_ingreso = $_POST["fecha_ingreso"];
                    $fecha_salida = $_POST["fecha_salida"];
                    $habitacion = $_POST["habitacion"];
                    $estado = "Pendiente";

                    $sql_reserva = "INSERT INTO reservas VALUES ('','$rut','$nombres','$apellidos','$nacionalidad','$procedencia','$fecha_ingreso','$fecha_salida','$habitacion','$estado')";
                    $sql_pasajero = "INSERT INTO pasajeros VALUES ('$rut','$nombres','$apellidos','$nacionalidad','$procedencia')";
                    $sql_habitacion = "UPDATE habitaciones SET estado='Ocupada' WHERE tipo='$habitacion'";

                    $con_reserva=mysql_query($sql_reserva,$con);
                    $con_pasajero=mysql_query($sql_pasajero,$con);
                    $con_habitacion=mysql_query($sql_habitacion,$con);

                    echo "<script> alert('Se insertó; correctamente');</script>";
                }

               if ($btn == "Modificar") {
                    $rut = $_POST["rut"];
                    $nombres = $_POST["nombres"];
                    $apellidos = $_POST["apellidos"];
                    $nacionalidad = $_POST["nacionalidad"];
                    $procedencia = $_POST["procedencia"];
                    $fecha_ingreso = $_POST["fecha_ingreso"];
                    $fecha_salida = $_POST["fecha_salida"];
                    $habitacion = $_POST["habitacion"];

                    $sql_modificar = "UPDATE reservas SET rut='$rut',nombres='$nombres',apellidos='$apellidos',nacionalidad='$nacionalidad',procedencia='$procedencia',fecha_ingreso='$fecha_ingreso','fecha_salida='$fecha_salida',habitacion='$habitacion'";
                    $con_modificar=mysql_query($sql_modificar,$con);
                    echo "<script> alert('Se actualizo correctamente');</script>";
                        
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
                                <li><a href="bodega.php"><i class="fa fa-bank fa-lg"></i> Inventario</a></li>
                                <li class="active"><a href="proveedores.php"><i class="fa fa-shopping-cart fa-lg"></i> Proveedores</a></li>
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
                <div class="col-xs-7">
                    <br>
                    <br>
                    <table class="table table-bordered table-condensed table-striped text-center">
                    <tr>
                        <th class="text-center">Rut</th>
                        <th class="text-center">Nombre Completo</th>
                        <th class="text-center">Habitacion</th>
                        <th class="text-center">Fecha de Ingreso</th>
                        <th class="text-center">Fecha de Salida</th>
                        <th class="text-center">Estado Reserva</th>
                    </tr>
                    <?php
                    $peticion = "SELECT * FROM reservas";
                    $resultado = mysql_query($peticion);
                    while ($fila = mysql_fetch_array($resultado)) {
                        echo
                        "<tr><td>" . $fila['rut'] . "</td>"
                        . "<td>" . $fila['nombres'] ." ". $fila['apellidos'] .  "</td>"
                        . "<td>" . $fila['habitacion'] . "</td>"
                        . "<td>" . $fila['fecha_ingreso'] . "</td>"
                        . "<td>" . $fila['fecha_salida'] . "</td>"
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
                                                    <label for="">Buscar Reserva</label>
                                                    <input type="text" class="form-control" name="n_reserva" value="" placeholder="Buscar Reserva">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Rut</label>
                                                    <input type="text" class="form-control" id="" name="rut" value="<?php echo $var2?>" placeholder="Ingrese Rut">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nombres</label>
                                                    <input type="text" class="form-control" id="" name="nombres" value="<?php echo $var3?>" placeholder="Ingrese Nombres">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Apellidos</label>
                                                    <input type="text" class="form-control" id="" name="apellidos" value="<?php echo $var4?>" placeholder="Ingrese Apellidos">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nacionalidad</label>
                                                    <input type="text" class="form-control" id="" name="nacionalidad" value="<?php echo $var5?>" placeholder="Ingrese Nacionalidad">
                                                </div>
                                            </div>

                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Fecha de Ingreso</label>
                                                    <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $var6?>" placeholder="Ingrese Fecha de Ingreso">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Fecha de Salida</label>
                                                    <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="<?php echo $var7?>" placeholder="Ingrese Fecha de Salida">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Procedencia</label>
                                                    <input type="text" class="form-control" id="" name="procedencia" value="<?php echo $var8?>" placeholder="Ingrese Procedencia">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Habitacion</label>
                                                    <select class="form-control" name="habitacion> 
                                                        <option value="<?php echo $var9?>">Seleccione la habitacion</option>
                                                        <?php
                                                        $sql = "SELECT * FROM habitaciones WHERE estado ='Disponible'";
                                                        $rec = mysql_query($sql);
                                                        while ($row = mysql_fetch_array($rec)) {
                                                            echo "<option>";
                                                            echo $row['tipo'];
                                                            echo "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" value="Buscar" class="btn btn-primary"><i class="fa fa-search fa-lg"></i> Buscar</button>
                                            <button type="submit" class="btn btn-primary" name="submit" value="Agregar"><i class="fa fa-star fa-lg"></i> Crear</button>
                                            <button type="submit" name="submit" value="Modificar" class="btn btn-danger"><i class="fa fa-wrench fa-lg"></i> Modificar</button>
                                            <button type="submit" name="submit" value="Borrar" class="btn btn-primary"><i class="fa fa-trash fa-lg"></i> Borrar</button>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-cc-visa fa-lg"></i> Pagar</button>
                                        </form>
                </div>
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