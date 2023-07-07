<?php
if (!isset($_POST["id_plato"])) {
    exit("No hay datos");
}

include_once "./funciones.php";
eliminarProducto($_POST["id_plato"]);
header("Location: ../views/cajero/productos.php");
