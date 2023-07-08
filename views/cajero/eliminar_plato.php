<?php
if (!isset($_POST["id_plato"])) {
    exit("No hay datos"); // Si no se ha enviado el parámetro "id_plato", muestra un mensaje y finaliza la ejecución del script
}

include_once "funciones.php"; // Incluye el archivo "funciones.php" que contiene las funciones necesarias
eliminarProducto($_POST["id_plato"]); // Llama a la función eliminarProducto() pasando el valor del parámetro "id_plato" para eliminar el producto correspondiente
header("Location: productos.php"); // Redirige al usuario a la página "productos.php" después de eliminar el producto
