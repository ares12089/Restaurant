<?php 
// Conexión a la base de datos
include '../module/conexion.php';

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $telefono = $_POST["telefono"];
    $correo= $_POST["correo"];
    $id_cargo = $_POST["id_cargo"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, cedula, usuario, contraseña, telefono, correo, id_cargo)
            VALUES ('$nombre','$cedula' , '$usuario', '$contraseña', '$telefono', '$correo', '$id_cargo')";
    
    if ($conexion->query($sql) === TRUE) {
        // Redireccionar después de la inserción exitosa
        header("Location:../views/gerente.php");
        exit();
    } else {
        echo "Error al insertar los datos: " . $conexion->error;
    }
}

$conexion->close();
?>




