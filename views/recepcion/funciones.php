<?php
 include "../../module/db.php";

 function obtenerProductosEnCarrito()
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Verifica si la sesión está iniciada y la inicia si no lo está
     iniciarSesionSiNoEstaIniciada();
 
     // Prepara la consulta SQL para obtener los productos en el carrito
     $sentencia = $bd->prepare("SELECT ordenes.id_orden, ordenes.id_sesion, ordenes.id_plato, ordenes.extras, platos.nombre, platos.precio 
     FROM ordenes 
     INNER JOIN platos 
     ON ordenes.id_plato = platos.id
     WHERE ordenes.id_sesion = ?");
 
     // Obtiene el ID de la sesión actual
     $idSesion = session_id();
 
     // Ejecuta la consulta con el ID de la sesión actual como parámetro
     $sentencia->execute([$idSesion]);
 
     // Retorna los resultados de la consulta como un array
     return $sentencia->fetchAll();
 }
 
 function quitarProductoDelCarrito($idOrden)
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Verifica si la sesión está iniciada y la inicia si no lo está
     iniciarSesionSiNoEstaIniciada();
 
     // Obtiene el ID de la sesión actual
     $idSesion = session_id();
 
     // Prepara la consulta SQL para eliminar un producto del carrito
     $sentencia = $bd->prepare("DELETE FROM ordenes WHERE id_sesion = ? AND id_orden = ?");
 
     // Ejecuta la consulta con los parámetros de la sesión y el ID de la orden a eliminar
     return $sentencia->execute([$idSesion, $idOrden]);
 }
 

 function obtenerProductos()
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Realiza una consulta SQL para obtener todos los productos
     $sentencia = $bd->query("SELECT id, nombre, descripcion, tipo, precio, img FROM platos");
 
     // Retorna los resultados de la consulta como un array
     return $sentencia->fetchAll();
 }
 

 function obtenerIdsDeProductosEnCarrito()
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Verifica si la sesión está iniciada y la inicia si no lo está
     iniciarSesionSiNoEstaIniciada();
 
     // Prepara la consulta SQL para obtener los IDs de los productos en el carrito
     $sentencia = $bd->prepare("SELECT id_plato FROM ordenes WHERE id_sesion = ?");
 
     // Obtiene el ID de la sesión actual
     $idSesion = session_id();
 
     // Ejecuta la consulta con el ID de la sesión actual como parámetro
     $sentencia->execute([$idSesion]);
 
     // Retorna los resultados de la consulta como un array de una sola columna (IDs de los productos)
     return $sentencia->fetchAll(PDO::FETCH_COLUMN);
 }
 

 function crearTiket($num_tiket)
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Verifica si la sesión está iniciada y la inicia si no lo está
     iniciarSesionSiNoEstaIniciada();
 
     // Prepara la consulta SQL para crear un nuevo ticket
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
 
     // Prepara la consulta SQL para generar un código
     $sentencia = $bd->prepare("SELECT generar_codigo() AS codigo");
 
     // Ejecuta la consulta
     $sentencia->execute();
 
     // Obtiene el resultado de la consulta como un array asociativo
     $result = $sentencia->fetch(PDO::FETCH_ASSOC);
 
     // Retorna el valor del código obtenido
     return $result['codigo'];
 }
 

 function obtenerPlatosTiket($num_tiket)
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Verifica si la sesión está iniciada y la inicia si no lo está
     iniciarSesionSiNoEstaIniciada();
 
     // Prepara la consulta SQL para obtener los platos de un ticket específico
     $sentencia = $bd->prepare("SELECT tikets.id_tiket, tikets.extras, platos.nombre, platos.precio, tikets.num_tiket
     FROM tikets 
     INNER JOIN platos 
     ON tikets.id_plato = platos.id
     WHERE tikets.num_tiket = ? AND tikets.id_sesion = ?");
 
     // Obtiene el ID de la sesión actual
     $idSesion = session_id();
 
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
     WHERE estado = 'act'");
 
     // Ejecuta la consulta
     $sentencia->execute();
 
     // Retorna los resultados de la consulta como un array
     return $sentencia->fetchAll();
 }
 

 function envTiket($num_tiket)
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Prepara la consulta SQL para actualizar el estado de un ticket
     $sentencia = $bd->prepare("UPDATE tikets
     SET estado = ?
     WHERE num_tiket = ?;");
 
     // Ejecuta la consulta con los parámetros proporcionados (estado e número de ticket)
     return $sentencia->execute(['inac', $num_tiket]);
 }
 

 function mostrarTiketEnv()
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Verifica si la sesión está iniciada y la inicia si no lo está
     iniciarSesionSiNoEstaIniciada();
 
     // Prepara la consulta SQL para mostrar los tickets enviados
     $sentencia = $bd->prepare("SELECT id_tiket, num_tiket, hora FROM tikets WHERE estado = 'inac' ORDER BY id_tiket DESC");
 
     // Ejecuta la consulta
     $sentencia->execute();
 
     // Retorna los resultados de la consulta como un array
     return $sentencia->fetchAll();
 }
 

 function eliminarordenes()
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Prepara la consulta SQL para eliminar todas las órdenes
     $sentencia = $bd->prepare("DELETE FROM ordenes");
 
     // Ejecuta la consulta
     return $sentencia->execute();
 }
 

 function agregarProductoAlCarrito($idProducto, $extra)
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Verifica si la sesión está iniciada y la inicia si no lo está
     iniciarSesionSiNoEstaIniciada();
 
     // Obtiene el ID de la sesión actual
     $idSesion = session_id();
 
     // Define el ID de la orden como null (si se utiliza algún mecanismo de autoincremento en la base de datos, el valor será asignado automáticamente)
     $idOrden = null;
 
     // Prepara la consulta SQL para agregar un producto al carrito
     $sentencia = $bd->prepare("INSERT INTO ordenes(id_orden, id_sesion, extras, id_plato) VALUES (?, ?, ?, ?)");
 
     // Ejecuta la consulta con los parámetros de la orden (ID de orden, ID de sesión, extras y ID de producto)
     return $sentencia->execute([$idOrden, $idSesion, $extra, $idProducto]);
 }
 


 function iniciarSesionSiNoEstaIniciada()
 {
     // Verifica si la sesión no está activa (no iniciada)
     if (session_status() !== PHP_SESSION_ACTIVE) {
         // Inicia la sesión
         session_start();
     }
 }
 

 function editarProducto($nombre, $descripcion, $tipo, $precio, $id)
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Prepara la consulta SQL para editar un producto
     $sentencia = $bd->prepare("UPDATE platos
     SET nombre = ?, descripcion = ?, tipo = ?, precio = ?
     WHERE id = ?;");
 
     // Ejecuta la consulta con los parámetros proporcionados (nombre, descripción, tipo, precio e ID)
     return $sentencia->execute([$nombre, $descripcion, $tipo, $precio, $id]);
 }
 

 function editarProductoimg($imagen, $nombre, $descripcion, $tipo, $precio, $id)
 {
     // Lee los datos de la imagen en un string binario
     $datosImagen = file_get_contents($imagen);
 
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Prepara la consulta SQL para editar un producto con imagen
     $sentencia = $bd->prepare("UPDATE platos
     SET img = ?, nombre = ?, descripcion = ?, tipo = ?, precio = ?
     WHERE id = ?;");
 
     // Ejecuta la consulta con los parámetros proporcionados (datos de imagen, nombre, descripción, tipo, precio e ID)
     return $sentencia->execute([$datosImagen, $nombre, $descripcion, $tipo, $precio, $id]);
 }
 

 function obtenerUnProducto($id)
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Prepara la consulta SQL para obtener un producto específico
     $sentencia = $bd->prepare("SELECT id, nombre, descripcion, tipo, precio, img FROM platos WHERE id = ?");
 
     // Ejecuta la consulta con el ID del producto como parámetro
     $sentencia->execute([$id]);
 
     // Retorna los resultados de la consulta como un array
     return $sentencia->fetchAll();
 }
 

 function eliminarProducto($id)
 {
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Prepara la consulta SQL para eliminar un producto
     $sentencia = $bd->prepare("DELETE FROM platos WHERE id = ?");
 
     // Ejecuta la consulta con el ID del producto como parámetro
     return $sentencia->execute([$id]);
 }
 

 function guardarProducto($nombre, $tipo, $precio, $descripcion, $imagen)
 {
     // Obtiene la información de la imagen subida
     $imagen = $_FILES['imagen']['tmp_name'];
     $imagenNombre = $_FILES['imagen']['name'];
     $imagenTipo = $_FILES['imagen']['type'];
 
     // Lee los datos de la imagen en un string binario
     $datosImagen = file_get_contents($imagen);
 
     // Obtiene la conexión a la base de datos
     $bd = obtenerConexion();
 
     // Prepara la consulta SQL para guardar un producto
     $sentencia = $bd->prepare("INSERT INTO platos(nombre, tipo, precio, descripcion, img) VALUES(?, ?, ?, ?, ?)");
 
     // Ejecuta la consulta con los parámetros proporcionados (nombre, tipo, precio, descripción y datos de imagen)
     return $sentencia->execute([$nombre, $tipo, $precio, $descripcion, $datosImagen]);
 }
 
