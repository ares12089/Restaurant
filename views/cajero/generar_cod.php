<?php

include_once "funciones.php"; // Incluye el archivo "funciones.php" en el código actual

$codigo = generarCodigo(); // Genera un código utilizando la función generarCodigo()

if (!isset($codigo)) {
    exit("No hay numero de tiket"); // Si el código no está definido, detiene la ejecución y muestra el mensaje "No hay número de tiket"
}

crearTiket($codigo); // Crea un ticket utilizando la función crearTiket() y pasa el código como argumento

eliminarordenes(); // Elimina las órdenes utilizando la función eliminarordenes()

header("Location: terminar_compra.php?cod=".$codigo); // Redirige al usuario a la página "terminar_compra.php" con el código como parámetro en la URL

