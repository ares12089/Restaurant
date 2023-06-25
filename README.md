NOMBRE DEL SISTEMA:

Digital Evolution Food.

El proyecto de nosotros es un aplicativo enfocado en el servicio al cliente de un restaurante. 

Requerimientos:

JavaScript, version: ECMAScript 2021

Php, versión: 8.2.6

Librerias adicionales: domPDF

Instalación:

Acceder a GutHub (https://github.com/ares12089/Restaurant.git), y descargar el repositorio.

Una vez descargado lo pasamos al escritorio, lo seleccionamos y le damos click derecho buscamos WINRAR y seleccionamos extraer aquí. Descargar WINRAR en caso de no tenerlo.

Uso:

Después de la descarga abrimos Visual Studio Code o el editor de código fuente de su preferencia, en caso de usar Visual Studio Code presionamos las teclas Ctrl + k + O nos abrirá una ventana y buscamos la ubicación del repositorio y lo abrimos. 

Acceder a través de un navegador web compatible, preferiblemente google chrome a la dirección: ‘file:///C:/Users/Brayner%20Stick/OneDrive/Datos%20adjuntos%20de%20correo%20electr%C3%B3nico/Escritorio/Restaurant-main/index.html’

Funcionalidades:

Carpeta Views / Cajero / Funciones.php

function obtenerOrdene():

La función se encarga de obtener y capturar el dato del plato ordenado por el cliente y pedido por el cajero para recibirlo en la vista del chef.

function quitarOrden($idOrden):

Se encarga de quitar un plato pedido por el cliente del carrito de compras en caso de que el cliente ya no desee ese plato.

function obtenerPLatos():

Se encarga de hacer una consulta a la base de datos para mostrar los platos agregados en la vista del gerente.

function agregarPlatoAlaOrden($idProducto, $extra):

Se encarga de seleccionar el plato que el cliente desee y enviarlo al carrito de compras para su posterior envío a la vista del chef.

function eliminarPlato($id):

Se encarga de eliminar platos almacenados en la base de datos.

function guardarPlato($nombre, $tipo, $precio, $descripcion, $imagen):

Se encarga de insertar y almacenar un plato en la base de datos.

function editarPlato($nombre, $descripcion, $tipo, $precio, $id):

Se encarga de actualizar un plato almacenado en la base de datos.

function obtenerIdsDeOrdenes():

Se encarga de hacer un conteo de los platos que hay en el carrito.

function editarPlatoimg($imagen, $nombre, $descripcion, $tipo, $precio, $id):

Se encarga de actualizar la imagen almacenada en la base de datos.

function obtenerUnPlato($id):

Se encarga de obtener la id del plato al cual se le harán cambios.

function getOrdenes():

Se encarga de capturar las órdenes que envía el cajero y las envía a la vista del chef mostrando en tiempo real.



Contribuir:

Corrección de errores.

Optimización de código.

Nuevas funcionalidades.

Informar sobre los cambios realizados.

Créditos:

Daniel Muñoz Vidal.

Jhon Efrain Monsalve.

Yunier de Jesús Villa.

Correa Madrid Brayner S.

Licencia: 

JavaScript licencia de software libre. 

DIAGRAMA DE ARQUITECTURA:




ESPECIFICACIONES TÉCNICAS:


Tecnologías utilizadas:

Lenguajes de programación: JavaScript, Python, Php.

Base de datos: MySQL o PhpMyAdmin.

Fronted: HTML5 Y CSS.

Librerías de terceros: Bootstrap 5.

Procesador: Intel core i5 o superior.

Memoria RAM: 8GB.

Espacio en disco duro: 2GB.

Requerimientos de software:

Sistema operativo: Windows 10 o superior, distribución de linux compatible con python.

Navegador web: Google Chrome u otro navegador compatible con javascript, python y bootstrap. 

Herramientas utilizadas:

GitHub.
