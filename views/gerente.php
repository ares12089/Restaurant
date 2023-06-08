<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rol";

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
//----------------------------------------------------------------------------------//
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="../css/addusuario.css">
</head>
<body>
    <h2>Agregar Usuario</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <label for="id_cargo">ID Cargo:</label>
        <input type="number" id="id_cargo" name="id_cargo" required><br><br>

        <input type="submit" value="Agregar Usuario">
    </form>

    <button type="submit" onclick="window.location.href='../index.html'">Volver al inicio de sesión</button>

</body>
</html>
