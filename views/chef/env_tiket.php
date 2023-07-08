<?php
// Verifica si no se ha recibido el valor "num_tiket" en la solicitud POST
if (!isset($_POST["num_tiket"])) {
    exit("No hay datos"); // Muestra un mensaje y finaliza la ejecución del script
}

include_once "funciones.php"; // Incluye el archivo "funciones.php" para acceder a las funciones necesarias
envTiket($_POST['num_tiket']); // Llama a la función envTiket() con el valor recibido

header("Location: chef.php"); // Redirige al usuario a la página "chef.php"
?>


