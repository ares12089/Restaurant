<?php 


//si el usuario presiona el boton que quiere que haga el boton
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"]) and !empty($_POST["usuario"]) and !empty($_POST["contraseña"]) and !empty($_POST["cargo"]) ){

        $nombre=$_POST["nombre"];
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $cargo=$_POST["cargo"];



    }else{
        echo "Algunos de los campos esta vacio";
    }

}


?>