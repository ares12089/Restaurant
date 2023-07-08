<?php


// include_once "funciones.php";

// if (!empty($_FILES["imagen"])) {

//     if (!isset($_POST["id_plato"]) || !isset($_POST["nombre"]) || !isset($_POST["descripcion"]) || !isset($_POST["tipo"]) || !isset($_POST["precio"]) || !isset($_FILES['imagen'])) {
//         exit("No hay datos -img");
//     }

//     editarProductoimg($_FILES["imagen"], $_POST["nombre"], $_POST["descripcion"], $_POST["tipo"], $_POST["precio"], $_POST['id_plato']);
//     header("Location: productos.php");

//     $imagen = $_FILES['imagen']['tmp_name'];
//     $imagenNombre = $_FILES['imagen']['name'];
//     $imagenTipo = $_FILES['imagen']['type'];
// }

// if (!isset($_POST["id_plato"]) || !isset($_POST["nombre"]) || !isset($_POST["descripcion"]) || !isset($_POST["tipo"]) || !isset($_POST["precio"])) {
//     exit("No hay datos");
// }

// editarProducto($_POST["id_plato"], $_POST["nombre"], $_POST["descripcion"], $_POST["tipo"], $_POST["precio"]);
// header("Location: productos.php");

include_once "funciones.php";

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
header("Location: productos.php");



// if (!isset($_POST["id_plato"]) || !isset($_POST["nombre"]) || !isset($_POST["descripcion"]) || !isset($_POST["tipo"]) || !isset($_POST["precio"]) || !isset($_FILES["imagen"])) {
//     exit("No hay datos");
// }


// editarProducto($_POST["id_plato"], $_POST["nombre"], $_POST["img"], $_POST["descripcion"], $_POST["tipo"], $_POST["precio"]);
// header("Location: productos.php");
