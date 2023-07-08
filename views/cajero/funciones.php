<?php
session_start();

include "../../module/db.php";

function obtenerProductosEnCarrito()
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos (se asume que hay una función llamada obtenerConexion() definida en otro lugar)

    // Prepara la consulta SQL para obtener los productos en el carrito
    $sentencia = $bd->prepare("SELECT ordenes.id_orden, ordenes.id_sesion, ordenes.id_plato, ordenes.extras, platos.nombre, platos.precio 
    FROM ordenes 
    INNER JOIN platos 
    ON ordenes.id_plato = platos.id
    WHERE ordenes.id_sesion = ?");

    $idSesion = $_SESSION['userId']; // Obtiene el ID de sesión del usuario desde la variable de sesión $_SESSION

    $sentencia->execute([$idSesion]); // Ejecuta la consulta SQL con el ID de sesión como parámetro

    return $sentencia->fetchAll(); // Retorna todas las filas de resultados obtenidas de la consulta como un array
}


function quitarProductoDelCarrito($idOrden)
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    $idSesion = $_SESSION['userId']; // Obtiene el ID de sesión del usuario desde la variable de sesión $_SESSION

    // Prepara la consulta SQL para eliminar el producto del carrito
    $sentencia = $bd->prepare("DELETE FROM ordenes WHERE id_sesion = ? AND id_orden = ?");

    return $sentencia->execute([$idSesion, $idOrden]); // Ejecuta la consulta SQL con el ID de sesión y el ID de la orden como parámetros y retorna el resultado de la ejecución
}

function obtenerProductos()
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Realiza una consulta SQL para obtener todos los productos
    $sentencia = $bd->query("SELECT id, nombre, descripcion, tipo, precio, img FROM platos");

    return $sentencia->fetchAll(); // Retorna todas las filas de resultados obtenidas de la consulta como un array
}


function obtenerIdsDeProductosEnCarrito()
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    $idSesion = $_SESSION['userId']; // Obtiene el ID de sesión del usuario desde la variable de sesión $_SESSION

    // Prepara la consulta SQL para obtener los IDs de los productos en el carrito
    $sentencia = $bd->prepare("SELECT id_plato FROM ordenes WHERE id_sesion = ?");

    $sentencia->execute([$idSesion]); // Ejecuta la consulta SQL con el ID de sesión como parámetro

    return $sentencia->fetchAll(PDO::FETCH_COLUMN); // Retorna todas las filas de resultados obtenidas de la consulta como un array de una sola columna (en este caso, los IDs de los productos en el carrito)
}


function crearTiket($num_tiket)
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    iniciarSesionSiNoEstaIniciada(); // Verifica si la sesión está iniciada y la inicia si no lo está

    // Prepara la consulta SQL para insertar un nuevo ticket en la tabla "tikets"
    $sentencia = $bd->prepare("INSERT INTO tikets SELECT null, id_sesion, extras, id_plato, ?, (SELECT curtime() AS nuevo_campo), 'act' FROM ordenes");

    return $sentencia->execute([$num_tiket]); // Ejecuta la consulta SQL con el número de ticket como parámetro y retorna el resultado de la ejecución
}


function generarCodigo()
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    iniciarSesionSiNoEstaIniciada(); // Verifica si la sesión está iniciada y la inicia si no lo está

    // Prepara la consulta SQL para obtener un código generado desde la base de datos
    $sentencia = $bd->prepare("SELECT generar_codigo() AS codigo");

    $sentencia->execute(); // Ejecuta la consulta SQL

    $result = $sentencia->fetch(PDO::FETCH_ASSOC); // Obtiene el resultado de la consulta como un array asociativo

    return $result['codigo']; // Retorna el valor del código obtenido del resultado de la consulta
}


function obtenerPlatosTiket($num_tiket)
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Prepara la consulta SQL para obtener los platos asociados al ticket
    $sentencia = $bd->prepare("SELECT tikets.id_tiket, tikets.extras, platos.nombre, platos.precio, tikets.num_tiket
    FROM tikets 
    INNER JOIN platos 
    ON tikets.id_plato = platos.id
    WHERE tikets.num_tiket = ? AND tikets.id_sesion = ?");

    $idSesion = $_SESSION['userId']; // Obtiene el ID de sesión del usuario desde la variable de sesión $_SESSION

    $sentencia->execute([$num_tiket, $idSesion]); // Ejecuta la consulta SQL con el número de ticket y el ID de sesión como parámetros

    return $sentencia->fetchAll(); // Retorna todas las filas de resultados obtenidas de la consulta como un array
}


function obtenerTikets()
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Prepara la consulta SQL para obtener los tickets
    $sentencia = $bd->prepare("SELECT tikets.id_tiket, tikets.extras, platos.nombre, platos.precio, platos.descripcion, tikets.num_tiket, tikets.hora 
    FROM tikets
    INNER JOIN platos 
    ON tikets.id_plato = platos.id
    WHERE estado = 'act';");

    $sentencia->execute(); // Ejecuta la consulta SQL

    return $sentencia->fetchAll(); // Retorna todas las filas de resultados obtenidas de la consulta como un array
}


function envTiket($num_tiket)
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Prepara la consulta SQL para actualizar el estado del ticket
    $sentencia = $bd->prepare("UPDATE tikets
    SET estado = ?
    WHERE num_tiket = ?;");

    return $sentencia->execute(['inac', $num_tiket]); // Ejecuta la consulta SQL con el nuevo estado y el número de ticket como parámetros y retorna el resultado de la ejecución
}


function mostrarTiketEnv()
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    iniciarSesionSiNoEstaIniciada(); // Verifica si la sesión está iniciada y la inicia si no lo está

    // Prepara la consulta SQL para obtener los tickets enviados con estado "inac"
    $sentencia = $bd->prepare("SELECT id_tiket, num_tiket, hora FROM tikets WHERE estado = 'inac' ORDER BY id_tiket DESC;");

    $sentencia->execute(); // Ejecuta la consulta SQL

    return $sentencia->fetchAll(); // Retorna todas las filas de resultados obtenidas de la consulta como un array
}


function eliminarordenes()
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    $idSesion = $_SESSION['userId']; // Obtiene el ID de sesión del usuario desde la variable de sesión $_SESSION

    // Prepara la consulta SQL para eliminar todas las órdenes asociadas a la sesión de usuario
    $sentencia = $bd->prepare("DELETE FROM ordenes where id_sesion = ?");

    return $sentencia->execute([$idSesion]); // Ejecuta la consulta SQL con el ID de sesión como parámetro y retorna el resultado de la ejecución
}


function agregarProductoAlCarrito($idProducto, $extra)
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    $idSesion = $_SESSION['userId']; // Obtiene el ID de sesión del usuario desde la variable de sesión $_SESSION

    $idOrden = null; // Establece el valor de $idOrden como null, posiblemente para que se genere automáticamente en la base de datos

    // Prepara la consulta SQL para agregar un producto al carrito
    $sentencia = $bd->prepare("INSERT INTO ordenes(id_orden, id_sesion, extras, id_plato) VALUES (?, ?, ?, ?)");

    return $sentencia->execute([$idOrden, $idSesion, $extra, $idProducto]); // Ejecuta la consulta SQL con los valores correspondientes y retorna el resultado de la ejecución
}


function sesion()
{
    $_SESSION['userId'];
    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: ../../index.html");
        exit();
    }

    if (isset($_POST['logout'])) {
        if ($_SESSION['userId'] === $_POST['id_us']) {
        session_unset();

        session_destroy();

        // Redirigir al usuario a la página de inicio de sesión
        header("Location: ../../index.html");
        exit();
        }
    }

    $nombreBD = isset($_POST['nombre']) ? $_POST['nombre'] : '';

}
function iniciarSesionSiNoEstaIniciada()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function editarProducto($nombre, $descripcion, $tipo, $precio, $id)
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Prepara la consulta SQL para actualizar los datos del producto
    $sentencia = $bd->prepare("UPDATE platos
    SET nombre = ?, descripcion = ?, tipo = ?, precio = ?
    WHERE id = ?;");

    return $sentencia->execute([$nombre, $descripcion, $tipo, $precio, $id]); // Ejecuta la consulta SQL con los nuevos valores y el ID del producto como parámetros y retorna el resultado de la ejecución
}


function editarProductoimg($imagen, $nombre, $descripcion, $tipo, $precio, $id)
{
    $datosImagen = file_get_contents($imagen); // Lee el contenido de la imagen y lo guarda en la variable $datosImagen

    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Prepara la consulta SQL para actualizar los datos del producto, incluyendo la imagen
    $sentencia = $bd->prepare("UPDATE platos
    SET img = ?, nombre = ?, descripcion = ?, tipo = ?, precio = ?
    WHERE id = ?;");

    return $sentencia->execute([$datosImagen, $nombre, $descripcion, $tipo, $precio, $id]); // Ejecuta la consulta SQL con los nuevos valores y el ID del producto como parámetros y retorna el resultado de la ejecución
}


function obtenerUnProducto($id)
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Prepara la consulta SQL para obtener los datos de un producto específico
    $sentencia = $bd->prepare("SELECT id, nombre, descripcion, tipo, precio, img FROM platos WHERE id = ?");

    $sentencia->execute([$id]); // Ejecuta la consulta SQL con el ID del producto como parámetro

    return $sentencia->fetchAll(); // Retorna todas las filas de resultados obtenidas de la consulta como un array
}


function eliminarProducto($id)
{
    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Prepara la consulta SQL para eliminar un producto
    $sentencia = $bd->prepare("DELETE FROM platos WHERE id = ?");

    return $sentencia->execute([$id]); // Ejecuta la consulta SQL con el ID del producto como parámetro y retorna el resultado de la ejecución
}


function guardarProducto($nombre, $tipo, $precio, $descripcion, $imagen)
{
    $imagen = $_FILES['imagen']['tmp_name']; // Obtiene la ruta temporal de la imagen subida
    $imagenNombre = $_FILES['imagen']['name']; // Obtiene el nombre original de la imagen subida
    $imagenTipo = $_FILES['imagen']['type']; // Obtiene el tipo de la imagen subida

    $datosImagen = file_get_contents($imagen); // Lee el contenido de la imagen y lo guarda en la variable $datosImagen

    $bd = obtenerConexion(); // Obtiene la conexión a la base de datos

    // Prepara la consulta SQL para guardar un nuevo producto
    $sentencia = $bd->prepare("INSERT INTO platos(nombre, tipo, precio, descripcion, img) VALUES(?, ?, ?, ?, ?)");

    return $sentencia->execute([$nombre, $tipo, $precio, $descripcion, $datosImagen]); // Ejecuta la consulta SQL con los valores correspondientes y retorna el resultado de la ejecución
}

