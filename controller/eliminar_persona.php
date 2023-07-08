<?php
include "../module/conexion.php";

// Verificar si se ha enviado el ID del usuario a eliminar
if (!empty($_POST["id"])) {

    // Obtener el ID del usuario a eliminar
    $id = $_POST["id"];

    // Ejecutar la consulta SQL para eliminar al usuario
    $sql=$conexion->query(" DELETE FROM usuarios WHERE id=$id ");
 
    // Verificar si la consulta se ejecutó correctamente
    if ($sql == 1) {
        // Empleado eliminado con éxito
        header("Location: ../views/gerente.php");
    } else {
        // Error al eliminar al empleado
        header("Location: ../views/gerente.php:err");
    }
}
?>



