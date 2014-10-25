<?php
if (isset($_POST["password"]) && isset($_POST["usuario"])) {
	$con = mysql_connect("localhost","root","");
	$db = mysql_select_db("cafeteria",$con);
	$query = mysql_query("SELECT * FROM login WHERE usuario = '". $_POST["usuario"] ."' and password = '". $_POST["password"] ."'");
	if (mysql_num_rows($query)>0) {
		session_start();
		$_SESSION['usuario'] = $_POST["usuario"];
		?>
		<script type="text/javascript">
			window.location = "ventas.php";
		</script>
		<?php
	}
	else{
		echo "<center><p>Datos erroneos</p></center>";
	}
}
?>