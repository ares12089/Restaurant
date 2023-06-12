<?php
include_once "funciones.php";
if (!isset($_POST["id_orden"])) {
    exit("No hay id_orden");
}
quitarProductoDelCarrito($_POST["id_orden"]);
# Saber si redireccionamos a tienda o al carrito, esto es porque
# llamamos a este archivo desde la tienda y desde el carrito
if (isset($_POST["redireccionar_carrito"])) {
    header("Location: tienda.php");
} else {
    header("Location: tienda.php");
}