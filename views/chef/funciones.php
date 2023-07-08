<?php
session_start();

include "../../module/db.php";


function obtenerProductosEnCarrito()
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Prepara la consulta SQL para obtener los productos en el carrito
    $sentencia = $bd->prepare("SELECT ordenes.id_orden, ordenes.id_sesion, ordenes.id_plato, ordenes.extras, platos.nombre, platos.precio 
     FROM ordenes 
     INNER JOIN platos 
     ON ordenes.id_plato = platos.id
     WHERE ordenes.id_sesion = ?");

    // Obtiene el ID de sesión del usuario actual
    $idSesion = $_SESSION['userId'];

    // Ejecuta la consulta con el ID de sesión como parámetro
    $sentencia->execute([$idSesion]);

    // Retorna los resultados de la consulta como un array
    return $sentencia->fetchAll();
}

function quitarProductoDelCarrito($idOrden)
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Obtiene el ID de sesión del usuario actual
    $idSesion = $_SESSION['userId'];

    // Prepara la consulta SQL para eliminar el producto del carrito
    $sentencia = $bd->prepare("DELETE FROM ordenes WHERE id_sesion = ? AND id_orden = ?");

    // Ejecuta la consulta con el ID de sesión y el ID de orden como parámetros
    return $sentencia->execute([$idSesion, $idOrden]);
}


function obtenerProductos()
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Realiza la consulta SQL para obtener todos los productos
    $sentencia = $bd->query("SELECT id, nombre, descripcion, tipo, precio, img FROM platos");

    // Retorna los resultados de la consulta como un array
    return $sentencia->fetchAll();
}


function obtenerIdsDeProductosEnCarrito()
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Obtiene el ID de sesión del usuario actual
    $idSesion = $_SESSION['userId'];

    // Prepara la consulta SQL para obtener los IDs de los productos en el carrito
    $sentencia = $bd->prepare("SELECT id_plato FROM ordenes WHERE id_sesion = ?");

    // Ejecuta la consulta con el ID de sesión como parámetro
    $sentencia->execute([$idSesion]);

    // Retorna los resultados de la consulta como un array de una sola columna (IDs de productos)
    return $sentencia->fetchAll(PDO::FETCH_COLUMN);
}


function crearTiket($num_tiket)
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Verifica si la sesión está iniciada y la inicia si no lo está
    iniciarSesionSiNoEstaIniciada();

    // Prepara la consulta SQL para insertar un nuevo ticket basado en los datos de la tabla "ordenes"
    $sentencia = $bd->prepare("INSERT INTO tikets SELECT null,id_sesion,extras,id_plato, ?, (SELECT curtime() AS nuevo_campo),'act' FROM ordenes");

    // Ejecuta la consulta con el número de ticket como parámetro
    return $sentencia->execute([$num_tiket]);
}


function generarCodigo()
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Verifica si la sesión está iniciada y la inicia si no lo está
    iniciarSesionSiNoEstaIniciada();

    // Prepara la consulta SQL para obtener un código generado
    $sentencia = $bd->prepare("SELECT generar_codigo() AS codigo");

    // Ejecuta la consulta
    $sentencia->execute();

    // Obtiene el resultado de la consulta
    $result = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Retorna el código generado
    return $result['codigo'];
}

function obtenerPlatosTiket($num_tiket)
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Prepara la consulta SQL para obtener los platos de un ticket específico
    $sentencia = $bd->prepare("SELECT tikets.id_tiket, tikets.extras, platos.nombre, platos.precio, tikets.num_tiket
     FROM tikets 
     INNER JOIN platos 
     ON tikets.id_plato = platos.id
     WHERE tikets.num_tiket = ? AND tikets.id_sesion = ?");

    // Obtiene el ID de sesión del usuario actual
    $idSesion = $_SESSION['userId'];

    // Ejecuta la consulta con el número de ticket y el ID de sesión como parámetros
    $sentencia->execute([$num_tiket, $idSesion]);

    // Retorna los resultados de la consulta como un array
    return $sentencia->fetchAll();
}


function obtenerTikets()
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Verifica si la sesión está iniciada y la inicia si no lo está
    iniciarSesionSiNoEstaIniciada();

    // Prepara la consulta SQL para obtener los tickets activos
    $sentencia = $bd->prepare("SELECT tikets.id_tiket, tikets.extras, platos.nombre, platos.precio, platos.descripcion, tikets.num_tiket, tikets.hora 
     FROM tikets
     INNER JOIN platos 
     ON tikets.id_plato = platos.id
     WHERE estado = 'act' ORDER BY tikets.hora ASC;");

    // Ejecuta la consulta
    $sentencia->execute();

    // Retorna los resultados de la consulta como un array
    return $sentencia->fetchAll();
}

function envTiket($num_tiket)
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Prepara la consulta SQL para actualizar el estado de un ticket a 'inac'
    $sentencia = $bd->prepare("UPDATE tikets
     SET estado = ?
     WHERE num_tiket = ?;");

    // Ejecuta la consulta con el estado y el número de ticket como parámetros
    return $sentencia->execute(['inac', $num_tiket]);
}


function mostrarTiketEnv()
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Verifica si la sesión está iniciada y la inicia si no lo está
    iniciarSesionSiNoEstaIniciada();

    // Prepara la consulta SQL para obtener los tickets enviados (inactivos)
    $sentencia = $bd->prepare("SELECT id_tiket, num_tiket, hora FROM tikets WHERE estado = 'inac' ORDER BY id_tiket DESC;");

    // Ejecuta la consulta
    $sentencia->execute();

    // Retorna los resultados de la consulta como un array
    return $sentencia->fetchAll();
}

function eliminarordenes()
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Obtiene el ID de sesión del usuario actual
    $idSesion = $_SESSION['userId'];

    // Prepara la consulta SQL para eliminar todas las órdenes de un usuario específico
    $sentencia = $bd->prepare("DELETE FROM ordenes WHERE id_session = ?");

    // Ejecuta la consulta con el ID de sesión como parámetro
    return $sentencia->execute([$idSesion]);
}

function agregarProductoAlCarrito($idProducto, $extra)
{
    // Obtiene la conexión a la base de datos
    $bd = obtenerConexion();

    // Obtiene el ID de sesión del usuario actual
    $idSesion = $_SESSION['userId'];

    // Define el ID de orden como nulo
    $idOrden = null;

    // Prepara la consulta SQL para agregar un producto al carrito
    $sentencia = $bd->prepare("INSERT INTO ordenes(id_orden, id_sesion, extras, id_plato) VALUES (?, ?, ?, ?)");

    // Ejecuta la consulta con el ID de orden, ID de sesión, extra y ID de producto como parámetros
    return $sentencia->execute([$idOrden, $idSesion, $extra, $idProducto]);
}


function sesion()
{
    // Accede al ID de usuario almacenado en la variable de sesión
    $_SESSION['userId'];

    // Verifica si el usuario no ha iniciado sesión o la sesión ha expirado
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // Redirecciona al usuario a la página de inicio de sesión
        header("Location: ../../index.html");
        exit();
    }

    // Verifica si se ha enviado una solicitud de cierre de sesión
    if (isset($_POST['logout'])) {
        // Verifica que el ID de usuario en la solicitud coincida con el almacenado en la sesión actual
        if ($_SESSION['userId'] === $_POST['id_us']) {
            // Elimina todas las variables de sesión y destruye la sesión
            session_unset();
            session_destroy();

            // Redirecciona al usuario a la página de inicio de sesión
            header("Location: ../../index.html");
            exit();
        }
    }

    // Obtiene el valor del campo 'nombre' enviado en el formulario, o una cadena vacía si no se envió
    $nombreBD = isset($_POST['nombre']) ? $_POST['nombre'] : '';
}


function iniciarSesionSiNoEstaIniciada()
{
    // Verifica si la sesión no está activa
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Inicia la sesión
        session_start();
    }
}

function editarProducto($nombre, $descripcion, $tipo, $precio, $id)
{
    $bd = obtenerConexion();
    // Prepara la consulta SQL para actualizar el producto con el ID especificado
    $sentencia = $bd->prepare("UPDATE platos
     SET nombre = ?, descripcion = ?, tipo = ?, precio = ?
     WHERE id = ?;");
    // Ejecuta la consulta con los valores proporcionados
    return $sentencia->execute([$nombre, $descripcion, $tipo, $precio, $id]);
}


function editarProductoimg($imagen, $nombre, $descripcion, $tipo, $precio, $id)
{
    // Lee el contenido de la imagen
    $datosImagen = file_get_contents($imagen);

    $bd = obtenerConexion();
    // Prepara la consulta SQL para actualizar la imagen y otros campos del producto con el ID especificado
    $sentencia = $bd->prepare("UPDATE platos
     SET img = ?, nombre = ?, descripcion = ?, tipo = ?, precio = ?
     WHERE id = ?;");
    // Ejecuta la consulta con los valores proporcionados
    return $sentencia->execute([$datosImagen, $nombre, $descripcion, $tipo, $precio, $id]);
}

function obtenerUnProducto($id)
{
    $bd = obtenerConexion();
    // Prepara la consulta SQL para obtener un producto con el ID especificado
    $sentencia = $bd->prepare("SELECT id, nombre, descripcion, tipo, precio, img FROM platos WHERE id = ?");
    // Ejecuta la consulta con el valor del ID proporcionado
    $sentencia->execute([$id]);
    // Retorna los resultados obtenidos como un arreglo asociativo
    return $sentencia->fetchAll();
}


function eliminarProducto($id)
{
    $bd = obtenerConexion();
    // Prepara la consulta SQL para eliminar un producto con el ID especificado
    $sentencia = $bd->prepare("DELETE FROM platos WHERE id = ?");
    // Ejecuta la consulta con el valor del ID proporcionado
    return $sentencia->execute([$id]);
}

function guardarProducto($nombre, $tipo, $precio, $descripcion, $imagen)
{
    $imagen = $_FILES['imagen']['tmp_name'];
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTipo = $_FILES['imagen']['type'];

    // Lee el contenido de la imagen
    $datosImagen = file_get_contents($imagen);

    $bd = obtenerConexion();
    // Prepara la consulta SQL para insertar un nuevo producto con los datos proporcionados
    $sentencia = $bd->prepare("INSERT INTO platos(nombre, tipo, precio, descripcion, img) VALUES(?, ?, ?, ?, ?)");
    // Ejecuta la consulta con los valores proporcionados
    return $sentencia->execute([$nombre, $tipo, $precio, $descripcion, $datosImagen]);
}

 

