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

    </div>

    <div class="row-fluid">
        <div class="col-xs-2">
            <a href="ventas.php"><i class="fa fa-arrow-left fa-lg"></i> Volver</a>
        </div>
        <div class="col-xs-10">
            <h2 class="text-muted text-center">Informe de Ventas</h2>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="">Mes</label>
                <select class="form-control" name="Mes> 
                        <option value="<?php echo $var9 ?>">Seleccione mes</option>
                            <?php
                            $sql = "SELECT * FROM sedes";
                            $rec = mysql_query($sql);
                            while ($row = mysql_fetch_array($rec)) {
                                echo "<option>";
                                echo $row['nombre_sede'];
                                echo "</option>";
                            }
                            ?>
                </select>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="">Sede</label>
                <select class="form-control" name="Sede> 
                        <option value="<?php echo $var9 ?>">Seleccione la habitacion</option>
                            <?php
                            $sql = "SELECT * FROM sedes";
                            $rec = mysql_query($sql);
                            while ($row = mysql_fetch_array($rec)) {
                                echo "<option>";
                                echo $row['nombre_sede'];
                                echo "</option>";
                            }
                            ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12">
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