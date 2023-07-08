<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  include_once './funciones.php';

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

    // Redirigir al usuario a la página de inicio de sesión u otra página deseada
    header("Location: ../../index.html");
    exit();
  }

  $nombreBD = isset($_POST['nombre']) ? $_POST['nombre'] : '';
  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="stylesnav.css">
  <link rel="stylesheet" href="styles.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- sweetAlert -->
  <script src="sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- img -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/gerente.css">
  <script src="https://kit.fontawesome.com/3052f95fc5.js" crossorigin="anonymous"></script>
  <title>Gerente</title>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <style>

  </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light <?php if ($modoOscuro) echo 'dark-mode'; ?>">
  <div class="container-fluid">

    <div class="sidebar" id="sidebar">
      <!-- Espacios en blanco para separación -->
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <!-- Imagen del logotipo -->
      <div class="text-center" style="margin-top: -120px;">
        <div class="floating-container">
          <img src="../../img/food-and-restaurant.png" alt="" class="rounded-circle img-thumbnail mx-auto" style="width: 130px; height: 130px; border: 2px solid rgb(141, 141, 141);">
        </div>
      </div>

      <ul>
        <!-- Espacio en blanco -->
        <div style="text-align: center;"></div>
        <!-- Enlace para agregar empleados -->
        <div class="link-container">
          <a href="../gerente.php"><i class="fa-solid fa-users-between-lines" style="color: #000000;"></i>AGREGAR EMPLEADOS</a>
        </div>
        <!-- Enlace para agregar platos -->
        <div class="link-container">
          <a href="/Restaurant/views/cajero/productos.php"><i class="fa-solid fa-utensils ms-2" style="color: #000000;"></i> AGREGAR PLATOS</a>
        </div>
        <!-- Formulario para cerrar sesión -->
        <div style="display: flex; justify-content: center;">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- Espacios en blanco para separación -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <!-- Botón para cerrar sesión -->
            <button type="submit" name="logout" class="btn btn-small" style="background-color: #f9f9f9;">
              <span class="me-1">Cerrar Sesión</span>
              <i class="fa-solid fa-power-off" style="color: #000000; margin-left: 1.5px;"></i>
            </button>
          </form>
        </div>
      </ul>

      </div>
        <!-- Botón del menú lateral -->
        <div class="menu-button" onclick="toggleSidebar()">&#9776;</div>
        <script>
          function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("open");
          }
        </script>

        <!-- Marca de navegación -->
        <div class="d-flex justify-content-center align-items-center">
          <a class="navbar-brand" href="#"><i class="fa-solid fa-door-open me-2" style="color: #000000;"></i>BIENVENIDO</a>
        </div>

        <!-- Navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            </li>
          </ul>
        </div>
        </div>
        </nav>


 <script type="text/javascript">
  // Este evento se ejecuta cuando el contenido del documento HTML ha sido completamente cargado
  document.addEventListener("DOMContentLoaded", () => {
    // Selecciona el elemento del botón de la barra de navegación con la clase "navbar-burger" y lo guarda en la variable `boton`
    const boton = document.querySelector(".navbar-burger");
    // Selecciona el menú de navegación con la clase "navbar-menu" y lo guarda en la variable `menu`
    const menu = document.querySelector(".navbar-menu");
    // Se asigna una función al evento `onclick` del botón
    boton.onclick = () => {
      // Alterna la clase "is-active" en el menú y el botón para mostrar u ocultar el menú al hacer clic en el botón
      menu.classList.toggle("is-active");
      boton.classList.toggle("is-active");
    };
  });
</script>

