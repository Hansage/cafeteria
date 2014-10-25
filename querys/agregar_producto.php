<?php
require_once '../conexion.php';

$peticion = "INSERT INTO bodega VALUES (NULL,'" . $_POST['descripcion'] . "','" . $_POST['tipo'] . "','" 
        . $_POST['cantidad'] . "')";
$resultado = mysql_query($peticion);

mysqli_close($conexion);
?>
<script type="text/javascript">
    window.location = "../bodega.php";
</script>