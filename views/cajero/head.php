<!DOCTYPE html>
<html lang="es">
<?php
include_once './funciones.php';
sesion();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>

    <link rel="stylesheet" href="styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- sweetAlert -->
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- sweetAlert -->

    <script src="https://kit.fontawesome.com/3052f95fc5.js" crossorigin="anonymous"></script>

    <script src="sir.js"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light sticky-nav" style="position: sticky; top: 0; z-index: 100;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="food-and-restaurant.png" alt="Logo" width="40" height="30" class="d-inline-block align-text-top">
                Restaurant
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="tienda.php">Menú</a>
                    </li>
                </ul>
                <!-- btn con js contador -->
                <button type="button" class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#ordenes">
                    Ordenes - <span id="contador"><?php
                                                    include_once "funciones.php";
                                                    $conteo = count(obtenerIdsDeProductosEnCarrito());
                                                    if ($conteo > 0) {
                                                        printf("(%d)", $conteo);
                                                    }
                                                    // echo $conteo;
                                                    ?>
                    </span>&nbsp;<i class="fa fa-shopping-cart"></i>
                </button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sesionModal">
                    <i class="fa-solid fa-power-off"></i>
                </button>
                
            </div>
        </div>
    </nav>
    <script>
        // Función para obtener el número actualizado del contador del servidor
        function obtenerContador() {
            // Realizar una solicitud AJAX al servidor
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Actualizar el contenido del contador con la respuesta del servidor
                    document.getElementById("contador").textContent = this.responseText;
                }
            };
            xhttp.open("GET", "obtener_contador.php", true); // Archivo PHP que devuelve el número actualizado
            xhttp.send();
        }
        // Llamar a la función obtenerContador inicialmente y luego cada cierto intervalo de tiempo
        obtenerContador();
        setInterval(obtenerContador, 1000); // Actualizar el contador cada segundo
    </script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            const boton = document.querySelector(".navbar-burger");
            const menu = document.querySelector(".navbar-menu");
            boton.onclick = () => {
                menu.classList.toggle("is-active");
                boton.classList.toggle("is-active");
            };
        });
    </script>