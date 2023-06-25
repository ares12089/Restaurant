<?php
// Código para obtener el número actualizado del contador desde tu lógica de backend

include_once "funciones.php";
$conteo = count(obtenerIdsDeProductosEnCarrito());
echo $conteo;
