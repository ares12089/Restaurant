<?php 

if (!empty($_POST["xd"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["usuario"]) and !empty($_POST["contrasena"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"]) and !empty($_POST["cargo"])) {
        
        $nombre=$_POST["nombre"];
        $usuario=$_POST["usuario"];
        $contrasena=$_POST["contrasena"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $cargo=$_POST["cargo"];


        $sql = $conexion->query("INSERT INTO usuarios(nombre, usuario, contraseña, telefono, correo, id_cargo) VALUES('$nombre', '$usuario', '$contrasena', '$telefono', '$correo', '$cargo')");
        if ($sql==1) {
            echo '<div class="alert alert-success"><i class="fa-solid fa-circle-check me-2" style="color: #000000;"></i>Persona Regisrado Correctamente</div>';
        } else {
            echo '<div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation me-2" style="color: #000000;"></i>Error Al Registrar Persona</div>'; 
        }
        

    }else {
        echo '<div class="alert alert-warning"><i class="fa-solid fa-triangle-exclamation me-2" style="color: #000000;"></i>Algunos de los campos esta vacio</div>';
    }
}



?>



