<?php 

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query(" DELETE FROM usuarios WHERE id=$id ");
    if ($sql==1) {
    } else {
        echo '<div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation me-2" style="color: #000000;"></i>Error Al Eliminar Persona</div>';
    }
    
}


?>