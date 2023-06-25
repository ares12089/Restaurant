<?php
include_once "funciones.php";
if (!isset($_POST["tiket"])) {
    exit("No hay numero de tiket");
}

crearTiket($_POST["tiket"]);

header("Location: tienda.php");

