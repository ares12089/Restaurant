<?php


include_once "./funciones.php";

if (!isset($_POST["id_plato"]) || !isset($_POST["nombre"]) || !isset($_POST["descripcion"]) || !isset($_POST["tipo"]) || !isset($_POST["precio"])) {
    exit("No hay datos");
} else {

    $imagen = $_FILES['imagen']['tmp_name'];
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTipo = $_FILES['imagen']['type'];

    print_r($imagen);
    // Verificar si se seleccionó un nuevo archivo de imagen
    if (!empty($imagen)) {

        editarProductoimg($imagen, $_POST["nombre"], $_POST["descripcion"], $_POST["tipo"], $_POST["precio"], $_POST["id_plato"]);
    } else {

        editarProducto($_POST["nombre"], $_POST["descripcion"], $_POST["tipo"], $_POST["precio"], $_POST["id_plato"]);
    }
}
header("Location: ../views/gerente/productos.php");



