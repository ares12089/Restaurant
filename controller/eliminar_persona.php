<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql=$conexion->query(" DELETE FROM usuarios WHERE id=$id ");
 
    if ($sql == 1) {
        // Empleado eliminado con éxito
    } else {
        // Error al eliminar al empleado
    }
}
?>



