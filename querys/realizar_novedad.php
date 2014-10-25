<?php
require_once '../conexion.php';

$peticion_r = "DELETE FROM novedades WHERE id= '" . $_POST['id_nocedad'] . "'";
$resultado_r = mysql_query($peticion_r);

?>
<script type="text/javascript">
    window.location = "../novedades.php";
</script>