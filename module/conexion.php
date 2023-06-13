<?php
$servername = "containers-us-west-188.railway.app";
$username = "root";
$password = "6PVYWFn7XmUboNA8phF1";
$dbname = "railway";
$port = "6523";

$conexion = new mysqli($servername, $username, $password, $dbname, $port);
$conexion->set_charset("utf8");

?>