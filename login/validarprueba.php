<?php
// Iniciar sesión
session_start();

// Almacenar valor de sesión
$_SESSION['logged_in'] = true;

// Obtener los datos del formulario
$user = $_POST['user'];
$pass = $_POST['pass'];

// Conectarse a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectof";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para verificar las credenciales del usuario
$sql = "SELECT c.descripcion AS cargo
        FROM usuarios u
        INNER JOIN cargo c ON u.id_cargo = c.id
        WHERE u.usuario = '$user' AND u.contraseña = '$pass'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Usuario autenticado correctamente

    // Obtener el cargo del usuario
    $row = $result->fetch_assoc();
    $cargo = $row['cargo'];

    // Redireccionar a la página correspondiente según el cargo
    switch ($cargo) {
        case 'Gerente':
            header("Location:../views/gerente.php");
            break;
        case 'Cajero':
            header("Location:../views/cajero/tienda.php");
            break;
        case 'Chef':
            header("Location:../views/chef.php");
            break;
        default:
            // Cargo no reconocido
            echo '<div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation me-2" style="color: #000000;"></i>Cargo no valido</div>';
            break;
    }
} else {
    // Autenticación fallida
    header("Location: ../index.html?error=1");
    exit();
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
