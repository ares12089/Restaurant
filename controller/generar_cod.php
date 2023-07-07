<?php

include_once "./funciones.php";

$codigo = generarCodigo();

if (!isset($codigo)) {
    exit("No hay numero de tiket");
}

crearTiket($codigo);

eliminarordenes();

header("Location: ../views/cajero/terminar_compra.php?cod=".$codigo);