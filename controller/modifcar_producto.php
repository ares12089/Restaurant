<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rol4";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!empty($_POST[""])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["cedula"]) && !empty($_POST["usuario"]) && !empty($_POST["contraseña"]) && !empty($_POST["telefono"]) && !empty($_POST["correo"]) && !empty($_POST["id_cargo"])) {

        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $cedula = $_POST["cedula"];
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $id_cargo = $_POST["id_cargo"];

        $sql = "UPDATE usuarios SET nombre='$nombre', cedula='$cedula', usuario='$usuario', contraseña='$contraseña', telefono='$telefono', correo='$correo', id_cargo='$id_cargo' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("location: ../views/gerente.php");
        } else {
            echo '<div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation me-2" style="color: #000000;"></i>Error al modificar</div>';
        }
    } else {
        echo '<div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation me-2" style="color: #000000;"></i>Campos vacios</div>';
    }
}

$conn->close();
?>
