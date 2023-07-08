<?php

include_once "funciones.php";

if (!isset($_POST["id_plato"]) || !isset($_POST["nombre"]) || !isset($_POST["descripcion"]) || !isset($_POST["tipo"]) || !isset($_POST["precio"])) {
    exit("No hay datos"); // Si alguno de los campos no está presente, muestra un mensaje y finaliza la ejecución del script
} else {
    $imagen = $_FILES['imagen']['tmp_name'];
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTipo = $_FILES['imagen']['type'];

    print_r($imagen); // Muestra el contenido de $imagen para depurar y verificar el valor del archivo
    
    if (!empty($imagen)) { // Si se ha seleccionado una nueva imagen
        editarProductoimg($imagen, $_POST["nombre"], $_POST["descripcion"], $_POST["tipo"], $_POST["precio"], $_POST["id_plato"]); // Llama a la función editarProductoimg() para actualizar el producto con la nueva imagen
    } else {
        editarProducto($_POST["nombre"], $_POST["descripcion"], $_POST["tipo"], $_POST["precio"], $_POST["id_plato"]); // Llama a la función editarProducto() para actualizar el producto sin cambiar la imagen
    }
}

header("Location: productos.php");


