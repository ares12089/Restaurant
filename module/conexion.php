<?php
$host = "containers-us-west-131.railway.app";
$user = "root";
$password = "IgBg231bFKr62oMeSByp";
$dbname = "railway";
$port = 7141;

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>