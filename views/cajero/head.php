<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>

    <link rel="stylesheet" href="styles.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-light">
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
                        <a class="nav-link active" aria-current="page" href="productos.php"><i class="fa-solid fa-burger me-2"></i>Platos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tienda.php"><i class="fa-solid fa-burger me-2" style="color: #000000;"></i>Menú</a>
                    </li>
                </ul>
                <!--  -->
                <!-- Botón para abrir la ventana emergente -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ordenes">
                    Ordenes<?php
                            include_once "funciones.php";
                            $conteo = count(obtenerIdsDeProductosEnCarrito());
                            if ($conteo > 0) {
                                printf("(%d)", $conteo);
                            }
                            ?>&nbsp;<i class="fa fa-shopping-cart"></i>
                </button>
                <!--  -->
                <!-- <a class="nav-link active" aria-current="page" href="ver_orden.php">Ordenes<strong><?php
                                                                                                    //include_once "funciones.php";
                                                                                                    //$conteo = count(obtenerIdsDeProductosEnCarrito());
                                                                                                    //if ($conteo > 0) {
                                                                                                    //    printf("(%d)", $conteo);
                                                                                                    //}
                                                                                                    ?>&nbsp;<i class="fa fa-shopping-cart"></i></strong></a> -->
                <!-- filtrar platos -->
                <!--                 
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>

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

    <div class="columns">
        <div class="column">
            <h1 class="is-size-2">Menú<i class="fa-solid fa-burger ms-2" style="color: #000000;"></i></h1>
        </div>
    </div>

    <section class="section">