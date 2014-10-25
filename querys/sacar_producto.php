<?php
require_once '../conexion.php';
$peticion_s = "SELECT * FROM bodega WHERE descripcion= '" . $_POST['descripcion'] . "'";
$resultado_s = mysql_query($peticion_s);

while ($fila = mysql_fetch_array($resultado_s)) {

    $peticion = "UPDATE bodega SET cantidad= '" . $fila['cantidad'] . "' - '" . $_POST['cantidad'] . "' WHERE descripcion= '" . $_POST['descripcion'] . "'";
    $resultado = mysql_query($peticion);
} 
?>
<script type="text/javascript">
    window.location = "../bodega.php";
</script>