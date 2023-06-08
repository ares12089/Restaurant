<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

// CAMBIAR EL NOMBRE SI ES NECESARIO

//nombre de la base de datos
$conexion=mysqli_connect("containers-us-west-131.railway.app","root","IgBg231bFKr62oMeSByp","railway");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);


//roles
if($filas['id_cargo']==1){ //gerente
    header("location:../views/gerente.php");

}else
if($filas['id_cargo']==2){ //cajero
header("location:../views/cajero.php");

}else
if($filas['id_cargo']==3){ //chef
header("location:../views/chef.php");
}


else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);
