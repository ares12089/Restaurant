<?php
// Verificar si se ha enviado el formulario de actualización
if (isset($_POST['actualizar'])) {
    // Obtener los datos del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $id_cargo = $_POST['id_cargo'];

    // Validar y procesar los datos aquí (ejemplo: validación, sanitización, etc.)

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "rol2");

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Construir la consulta de actualización
    $query = "UPDATE usuarios SET nombre = '$nombre', cedula = '$cedula', usuario = '$usuario', contraseña = '$contraseña', telefono = '$telefono', correo = '$correo', id_cargo = '$id_cargo'";

    // Ejecutar la consulta de actualización
    if (mysqli_query($conexion, $query)) {
        // La actualización se realizó correctamente
        echo "La persona se ha actualizado exitosamente.";
    } else {
        // Ocurrió un error al ejecutar la consulta
        echo "Error al actualizar la persona: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>
