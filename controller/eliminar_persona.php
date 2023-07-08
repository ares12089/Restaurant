<?php
include "../module/conexion.php";

if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    $sql=$conexion->query(" DELETE FROM usuarios WHERE id=$id ");
 
    if ($sql == 1) {
        // Empleado eliminado con éxito
        header("Location: ../views/gerente.php");
    } else {
        // Error al eliminar al empleado
    }
}
?>



