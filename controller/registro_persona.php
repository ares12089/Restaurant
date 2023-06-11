<?php 
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rol2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $telefono = $_POST["telefono"];
    $correo= $_POST["correo"];
    $id_cargo = $_POST["id_cargo"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, usuario, contraseña, telefono, correo, id_cargo)
            VALUES ('$nombre', '$usuario', '$contraseña', '$telefono', '$correo', '$id_cargo')";
    
    if ($conn->query($sql) === TRUE) {
        // Redireccionar después de la inserción exitosa
        header("Location:../views/gerente.php");
        exit();
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

$conn->close();
?>




