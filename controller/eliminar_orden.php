<?php
include_once "./funciones.php";
if (!isset($_POST["id_orden"])) {
    exit("No hay id_orden");
}
quitarProductoDelCarrito($_POST["id_orden"]);
# Saber si redireccionamos a tienda, esto es porque
# llamamos a este archivo desde la tienda
if (isset($_POST["redireccionar_carrito"])) {
    header("Location: ../views/cajero/tienda.php");
} else {
    header("Location: ../views/cajero/tienda.php");
}