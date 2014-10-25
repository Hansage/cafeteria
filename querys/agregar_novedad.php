<?php
require_once '../conexion.php';

$peticion = "INSERT INTO novedades VALUES (NULL,'" . $_POST['fecha_novedad'] . "','" . $_POST['novedad'] . "','" . $_POST['encargado']."')";
$resultado = mysql_query($peticion);

mysqli_close($conexion);
?>
<script type="text/javascript">
    window.location = "../novedades.php"
</script>