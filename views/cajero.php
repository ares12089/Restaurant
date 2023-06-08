<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/chef.css">
    <title>Document</title>
</head>
<body>

    <?php 
  
    // (no borrar )recoge el nombre de usuario y lo imprime en la pantalla
    session_start();
    if (isset($_SESSION['usuario'])) {
        $nombreUsuario = $_SESSION['usuario'];
        echo "<header><h2>Bienvenido $nombreUsuario(cajero)</h2></header>";
    } else {
        header("Location: ../index.html");
        exit();
    }  
    ?>
    
    <button type="submit" onclick="window.location.href='../index.html'">Volver al inicio de sesión</button>


</body>
</html>