<?php
// recoge el nombre de usuario y lo imprime en la pantalla
session_start();
if (isset($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario'];
    echo "<header><h2>Bienvenido $nombreUsuario que bueno verte otra vez</h2></header>";
} else {
    header("Location: ../index.html");
    exit();
}

$host = "containers-us-west-131.railway.app";
$user = "root";
$password = "IgBg231bFKr62oMeSByp";
$dbname = "railway";
$port = 7141;

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $id_cargo = $_POST["id_cargo"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, usuario, contraseña, id_cargo)
            VALUES ('$nombre', '$usuario', '$contraseña', '$id_cargo')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario agregado correctamente";
    } else {
        echo "Error al agregar el usuario: " . $conn->error;
    }
}

$conn->close();


//--------------------------------VISTA GERENTE-------------------------------------//
?>


