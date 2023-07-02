<?php
include "../../module/db.php";

session_start();

function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion();
    // iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT ordenes.id_orden, ordenes.id_sesion, ordenes.id_plato, ordenes.extras, platos.nombre, platos.precio 
    FROM ordenes 
    INNER JOIN platos 
    ON ordenes.id_plato = platos.id
    WHERE ordenes.id_sesion = ?");
    // $idSesion = session_id();
    $idSesion = $_SESSION['userId'];
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}
function quitarProductoDelCarrito($idOrden)
{
    $bd = obtenerConexion();
    // iniciarSesionSiNoEstaIniciada();
    // $idSesion = session_id();
    $idSesion = $_SESSION['userId'];
    $sentencia = $bd->prepare("DELETE FROM ordenes WHERE id_sesion = ? AND id_orden = ?");
    return $sentencia->execute([$idSesion, $idOrden]);
}

function obtenerProductos()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id, nombre, descripcion, tipo, precio, img FROM platos");
    return $sentencia->fetchAll();
}

function obtenerIdsDeProductosEnCarrito()
{
    $bd = obtenerConexion();
    // iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['userId'];
    $sentencia = $bd->prepare("SELECT id_plato FROM ordenes WHERE id_sesion = ?");
    // $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}

function crearTiket($num_tiket)
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    // $idSesion = session_id();
    // $idtiket = null;
    $sentencia = $bd->prepare("INSERT INTO tikets SELECT null,id_sesion,extras,id_plato, ?, (SELECT curtime() AS nuevo_campo),'act' FROM ordenes");
    return $sentencia->execute([$num_tiket]);
}

function generarCodigo()
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    // sesion();
    $sentencia = $bd->prepare("SELECT generar_codigo() AS codigo");
    $sentencia->execute();
    $result = $sentencia->fetch(PDO::FETCH_ASSOC);
    return $result['codigo'];
}

function obtenerPlatosTiket($num_tiket)
{
    $bd = obtenerConexion();
    // iniciarSesionSiNoEstaIniciada();
    $sentencia = $bd->prepare("SELECT tikets.id_tiket, tikets.extras, platos.nombre, platos.precio, tikets.num_tiket
    FROM tikets 
    INNER JOIN platos 
    ON tikets.id_plato = platos.id
    WHERE tikets.num_tiket = ? AND tikets.id_sesion = ?");
    // $idSesion = session_id();
    $idSesion = $_SESSION['userId'];
    $sentencia->execute([$num_tiket, $idSesion]);
    return $sentencia->fetchAll();
}

function obtenerTikets()
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    // sesion();
    $sentencia = $bd->prepare("SELECT tikets.id_tiket, tikets.extras, platos.nombre, platos.precio, platos.descripcion, tikets.num_tiket, tikets.hora 
    FROM tikets
    INNER JOIN platos 
    ON tikets.id_plato = platos.id
    WHERE estado = 'act';");
    // $idSesion = session_id();
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function envTiket($num_tiket)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE tikets
    SET estado = ?
    WHERE num_tiket = ?;");
    return $sentencia->execute(['inac', $num_tiket]);
}

function mostrarTiketEnv()
{
    $bd = obtenerConexion();
    iniciarSesionSiNoEstaIniciada();
    // sesion();
    $sentencia = $bd->prepare("SELECT id_tiket, num_tiket, hora FROM tikets WHERE estado = 'inac' ORDER BY id_tiket DESC;");
    // $idSesion = session_id();
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function eliminarordenes()
{
    $bd = obtenerConexion();
    $idSesion = $_SESSION['userId'];
    $sentencia = $bd->prepare("DELETE FROM ordenes where id_sesion = ?");
    return $sentencia->execute([$idSesion]);
}

function agregarProductoAlCarrito($idProducto, $extra)
{
    // Ligar el id del producto con el usuario a través de la sesión
    $bd = obtenerConexion();
    // iniciarSesionSiNoEstaIniciada();
    // $idSesion = session_id();
    $idSesion = $_SESSION['userId'];
    $idOrden = null;
    $sentencia = $bd->prepare("INSERT INTO ordenes(id_orden, id_sesion, extras, id_plato) VALUES (?, ?, ?, ?)");
    return $sentencia->execute([$idOrden, $idSesion, $extra, $idProducto]);
}

function sesion()
{
    $_SESSION['userId'];
    
    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: ../../index.html");
        exit();
    }

    // Verificar si se ha enviado la solicitud de cierre de sesión
    if (isset($_POST['logout'])) {
        // Eliminar todas las variables de sesión
        session_unset();

        // Destruir la sesión
        session_destroy();

        // Redirigir al usuario a la página de inicio de sesión
        header("Location: ../../index.html");
        exit();
    }

}
function iniciarSesionSiNoEstaIniciada()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function editarProducto($nombre, $descripcion, $tipo, $precio, $id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE platos
    SET nombre = ?, descripcion = ?, tipo = ?, precio = ?
    WHERE id = ?;");
    return $sentencia->execute([$nombre, $descripcion, $tipo, $precio, $id]);
}

function editarProductoimg($imagen, $nombre, $descripcion, $tipo, $precio, $id)
{
    // $imagen = $_FILES['imagen']['tmp_name'];
    $datosImagen = file_get_contents($imagen);

    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE platos
    SET img = ?, nombre = ?, descripcion = ?, tipo = ?, precio = ?
    WHERE id = ?;");
    return $sentencia->execute([$datosImagen, $nombre, $descripcion, $tipo, $precio, $id]);
}

function obtenerUnProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT id, nombre, descripcion, tipo, precio, img FROM platos WHERE id = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll();
}

function eliminarProducto($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM platos WHERE id = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($nombre, $tipo, $precio, $descripcion, $imagen)
{
    $imagen = $_FILES['imagen']['tmp_name'];
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTipo = $_FILES['imagen']['type'];

    $datosImagen = file_get_contents($imagen);

    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO platos(nombre, tipo, precio, descripcion, img) VALUES(?, ?, ?, ?, ?)");
    return $sentencia->execute([$nombre, $tipo, $precio, $descripcion, $datosImagen]);
}
