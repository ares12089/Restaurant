<?php 


//si el usuario presiona el boton que quiere que haga el boton
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"]) and !empty($_POST["usuario"]) and !empty($_POST["contraseña"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"]) and !empty($_POST["cargo"]) ){

        $nombre=$_POST["nombre"];
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $cargo=$_POST["telefono"];
        $telefono=$_POST["correo"];
        $correo=$_POST["cargo"];

        $sql=$conexion->query(" INSERT INTO usuarios(nombre,usuario,contraseña,id_cargo)VALUES(' $nombre', '$usuario', '$contraseña', '$cargo', '$telefono', '$correo')  ");
        if ($sql==1) {
            echo '<div class="alert alert-success"><i class="fa-solid fa-circle-check me-2" style="color: #000000;"></i>Persona Regisrado Correctamente</div>';
        } else {
            echo '<div class="alert alert-danger"><i class="fa-solid fa-circle-exclamation me-2" style="color: #000000;"></i>Error Al Registrar Persona</div>';
        }
        

    }else{
        echo '<div class="alert alert-warning"><i class="fa-solid fa-triangle-exclamation me-2" style="color: #000000;"></i>Algunos de los campos esta vacio</div>';
    }

}


?>