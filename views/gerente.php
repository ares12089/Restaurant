<?php
// recoge el nombre de usuario y lo imprime en la pantalla
session_start();
if (isset($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario'];
    echo "<header><h2>Bienvenido $nombreUsuario(admin)</h2></header>";
} else {
    header("Location: ../index.html");
    exit();
}

$host = "containers-us-west-131.railway.app";
$user = "root";
$password = "IgBg231bFKr62oMeSByp";
$dbname = "railway";
$port = "7141";

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
<!DOCTYPE html>
<html>
<head>
    <title>VISTA ADMIN</title>
    <link rel="stylesheet" href="../css/addusuario.css">
</head>
<body>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Agregar Usuario</h2>

        <section id="campos">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required><br><br>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required><br><br>

            <label for="id_cargo">Cargo:</label>
            <option value="">>--Selecione--<</option>
            <option value="chef">Chef</option>
            <option value="Cajero">Cajero</option>

            </select>

        </section>

    </form>

    <button type="submit" onclick="window.location.href='../index.html'">Volver al inicio de sesión</button>


</body>
</html>

