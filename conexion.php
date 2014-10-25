<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "cafeteria";

$con = mysql_connect($server, $username, $password) or die("Error");
$sdb = mysql_select_db($db, $con) or die("Error Db");
