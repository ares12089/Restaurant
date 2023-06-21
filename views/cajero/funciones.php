<?php
include "db.php";

function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    // $sentencia = $bd->prepare("SELECT platos.id, platos.nombre, platos.descripcion, platos.tipo, platos.precio
    // FROM platos
    // INNER JOIN ordenes
    // ON platos.id = ordenes.id_plato
    // WHERE ordenes.id_sesion = ?");
    $sentencia = $bd->prepare("SELECT ordenes.id_orden, ordenes.id_sesion, ordenes.id_plato, ordenes.extras, platos.nombre, platos.precio 
    FROM ordenes 
    INNER JOIN platos 
    ON ordenes.id_plato = platos.id
    WHERE ordenes.id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}
function quitarProductoDelCarrito($idOrden)
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $sentencia = $bd->prepare("DELETE FROM ordenes WHERE id_sesion = ? AND id_orden = ?");
    return $sentencia->execute([$idSesion, $idOrden]);
}

function obtenerProductos()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id, nombre, descripcion, tipo, precio, img FROM platos");
    return $sentencia->fetchAll();
}

// function productoYaEstaEnCarrito($idProducto)
// {
//     $ids = obtenerIdsDeProductosEnCarrito();
//     foreach ($ids as $id) {
//         if ($id == $idProducto) return true;
//     }
//     return false;
// }

function obtenerIdsDeProductosEnCarrito()
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT id_plato FROM ordenes WHERE id_sesion = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function agregarProductoAlCarrito($idProducto, $extra)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    $idSesion = session_id();
    $idOrden = null;
    $sentencia = $bd->prepare("INSERT INTO ordenes(id_orden, id_sesion, extras, id_plato) VALUES (?, ?, ?, ?)");
    return $sentencia->execute([$idOrden, $idSesion, $extra, $idProducto]);
}


function iniciarSesionSiNoEstaIniciada()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function eliminarProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM platos WHERE id = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($nombre, $tipo, $precio, $descripcion, $imagen)
{
    //img
    //$contenidoImagen = file_get_contents($imagen['tmp_name']);
    $imagen = $_FILES['imagen']['tmp_name'];
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTipo = $_FILES['imagen']['type'];

    $datosImagen = file_get_contents($imagen);

    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO platos(nombre, tipo, precio, descripcion, img) VALUES(?, ?, ?, ?, ?)");
    return $sentencia->execute([$nombre, $tipo, $precio, $descripcion,$datosImagen]);
}

function editarProducto($nombre, $descripcion, $tipo, $precio, $id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE platos
    SET nombre = ?, descripcion = ?, tipo = ?, precio = ?
    WHERE id = ?;");
    return $sentencia->execute([$nombre,$descripcion,$tipo,$precio,$id]);
}

function editarProductoimg($imagen, $nombre, $descripcion, $tipo, $precio, $id)
{
    // $imagen = $_FILES['imagen']['tmp_name'];
    $datosImagen = file_get_contents($imagen);

    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE platos
    SET img = ?, nombre = ?, descripcion = ?, tipo = ?, precio = ?
    WHERE id = ?;");
    return $sentencia->execute([$datosImagen,$nombre,$descripcion,$tipo,$precio,$id]);
}

function obtenerUnProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT id, nombre, descripcion, tipo, precio, img FROM platos WHERE id = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll();
}
