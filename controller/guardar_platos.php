<?php
if (!isset($_POST["nombre"]) || !isset($_POST["tipo"]) || !isset($_POST["precio"]) || !isset($_POST["descripcion"]) || !isset($_FILES['imagen'])) {
  exit("Faltan datos");
}
include_once "./funciones.php";
guardarProducto($_POST["nombre"], $_POST["tipo"], $_POST["precio"], $_POST["descripcion"], $_FILES['imagen']);
header("Location: ../views/gerente/productos.php");

$imagen = $_FILES['imagen']['tmp_name'];
$imagenNombre = $_FILES['imagen']['name'];
$imagenTipo = $_FILES['imagen']['type'];
