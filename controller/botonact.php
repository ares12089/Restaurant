<?php 

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["cedula"]) and !empty($_POST["usuario"]) and !empty($_POST["contraseña"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"]) and !empty($_POST["id_cargo"])) {

        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $cedula=$_POST["cedula"];
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $id_cargo=$_POST["id_cargo"];

        $sql=$conexion->query(" update usuarios set nombre='$nombre', cedula='$cedula', usuario='$usuario', contraseña='$contraseña', telefono='$telefono', correo='$correo', id_cargo='$id_cargo' where id=$id ");
        if ($sql==1) {
            header("location:../views/gerente.php");
        } else {
            echo '<div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation me-2" style="color: #000000;"></i>Error al modificar</div>';
        }
        




    }else {
        echo '<div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation me-2" style="color: #000000;"></i>Campos vacios</div>';
    }
}

?>