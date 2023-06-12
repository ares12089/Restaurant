<?php
include_once "funciones.php";
if (!isset($_POST["id_plato"]) || !isset($_POST["extra"])) {
    exit("No hay id_plato");
}
agregarProductoAlCarrito($_POST["id_plato"], $_POST["extra"]);
header("Location: tienda.php");
