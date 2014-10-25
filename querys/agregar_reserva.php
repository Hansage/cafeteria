<?php
require_once '../conexion.php';

$peticion_r = "INSERT INTO reservas VALUES (NULL,'" . $_POST['rut'] . "','" . $_POST['nombres'] . "','" 
        . $_POST['apellidos'] . "','" . $_POST['nacionalidad'] . "','" . $_POST['procedencia'] . "','" 
        . $_POST['fecha_ing']."','" . $_POST['fecha_sal'] . "','" . $_POST['habitacion'] . "','Pendiente')";
$resultado_r = mysql_query($peticion_r);

$peticion_p = "INSERT INTO pasajeros VALUES ('" . $_POST['rut'] . "','" . $_POST['nombres'] . "','" 
        . $_POST['apellidos'] . "','" . $_POST['nacionalidad'] . "','" . $_POST['procedencia'] . "')";
$resultado_p = mysql_query($peticion_p);

$peticion_h = "UPDATE habitaciones SET estado = 'Ocupada' WHERE tipo='" . $_POST['habitacion'] . "'";
$resultado_h = mysql_query($peticion_h);

mysql_close($conexion);
?>
<script type="text/javascript">
    window.location = "../reservas.php";
</script>