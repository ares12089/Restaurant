<?php
include_once "funciones.php";

// Verificar si se han enviado los datos necesarios
if (!isset($_POST["id_plato"]) || !isset($_POST["extra"])) {
    exit("No hay id_plato"); // Si alguno de los campos no está presente, muestra un mensaje y finaliza la ejecución del script
}

// Llamar a la función agregarProductoAlCarrito() para agregar el producto al carrito
agregarProductoAlCarrito($_POST["id_plato"], $_POST["extra"]);

// Redireccionar al usuario a la página de la tienda
header("Location: tienda.php");

