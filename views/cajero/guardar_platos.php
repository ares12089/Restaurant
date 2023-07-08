<?php
// Comprueba si alguna de las variables del formulario o el archivo de imagen no está definido
if (!isset($_POST["nombre"]) || !isset($_POST["tipo"]) || !isset($_POST["precio"]) || !isset($_POST["descripcion"]) || !isset($_FILES['imagen'])) {
  exit("Faltan datos"); // Detiene la ejecución y muestra el mensaje "Faltan datos"
}
include_once "funciones.php"; // Incluye el archivo "funciones.php" en el código actual
guardarProducto($_POST["nombre"], $_POST["tipo"], $_POST["precio"], $_POST["descripcion"], $_FILES['imagen']); // Llama a la función guardarProducto() con los valores del formulario y el archivo de imagen
header("Location: productos.php"); // Redirige al usuario a la página "productos.php"

// Asigna el nombre temporal del archivo de imagen subido a la variable $imagen
$imagen = $_FILES['imagen']['tmp_name'];
// Asigna el nombre original del archivo de imagen subido a la variable $imagenNombre
$imagenNombre = $_FILES['imagen']['name'];
// Asigna el tipo MIME del archivo de imagen subido a la variable $imagenTipo
$imagenTipo = $_FILES['imagen']['type'];


