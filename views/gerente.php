<?php

// Verificar si se ha enviado la solicitud de cierre de sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.html");
    exit();
}

// Verificar si se ha enviado la solicitud de cierre de sesión
if (isset($_POST['logout'])) {
    // Eliminar todas las variables de sesión
    session_unset();

    // Destruir la sesión
    session_destroy();

    // Redirigir al usuario a la página de inicio de sesión u otra página deseada
    header("Location: ../index.html");
    exit();
}
$nombreBD = isset($_POST['nombre']) ? $_POST['nombre'] : '';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3052f95fc5.js" crossorigin="anonymous"></script>
    <title>Gerente</title>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <?php
  include "../module/conexion.php";
  include "../controller/eliminar_persona.php";
  ?>
  <div class="container-fluid">
  <style>
  .sidebar {
    position: fixed;
    right: -100cm;
    top: 50px;
    width: 250px;
    height: 100vh;
    background-color: #f9f9f9;
    transition: right 0.3s ease;
  }

  .sidebar.open {
    right: 0;
  }

  .sidebar ul {
    list-style: none;
    padding: 0;
    margin: 20px;
  }

  .sidebar li {
    margin-bottom: 10px;
  }

  .sidebar a {
    text-decoration: none;
    color: #333;
  }

  .menu-button {
    position: fixed;
    left: 34cm;
    top: -1,3cm;
    padding: 16px;
    background-color: #f9f9f9;
    border-radius: 50%;
    cursor: pointer;
    z-index: 999;
  }
</style>

<div class="sidebar" id="sidebar">
<div class="center-icon">
  <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
</div>
<div class="center-icon">
  <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
</div>
<div class="center-icon">
  <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
</div>
<div class="center-icon">
  <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
</div>
<div class="center-icon">
  <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
</div>
<div class="center-icon">
  <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
</div>


<div class="text-center" style="margin-top: -120px;">
  <div class="floating-container">
    <img src="<?php echo '../img/wallhaven-y86k3l.jpg'; ?>" alt="" class="rounded-circle img-thumbnail mx-auto" style="width: 130px; height: 130px; border: 2px solid rgb(141, 141, 141);">
  </div>
</div>
<style>
@keyframes floating {
  0% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
  100% { transform: translateY(0); }
}

.custom-table {
  font-size: 12px;
}

.hidden {
  display: none;
}



.floating-container {
  animation: floating 3s ease-in-out infinite;
}
</style>


  <ul>
  <div style="text-align: center;">
  <li><h4>MENU<i class="fa-solid fa-martini-glass-citrus ms-2" style="color: #000000;"></i></h4></li>
    </div>
    <div class="center-icon">
      <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
    </div>
    <div class="center-icon">
      <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
    </div>
    <div style="text-align: center; font-family: 'Times New Roman', Times, serif;">
    <a href="../views/cajero/productos.php">AGREGAR PLATOS<i class="fa-solid fa-utensils ms-2" style="color: #000000;"></i></a>
    </div>
    <div class="center-icon">
    <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
    </div>
    <div class="center-icon">
      <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
    </div>
    <div class="center-icon">
      <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
    </div>
    <div class="center-icon">
    <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
  </div>
  <div class="center-icon">
    <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
  </div>
  <div class="center-icon">
  <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
</div>
<div class="center-icon">
  <i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i>
</div>
    <div style="display: flex; justify-content: center;">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button type="submit" name="logout" class="btn btn-small" style="background-color: #f9f9f9;">
            <span class="me-1">Cerrar Sesión</span>
            <i class="fa-solid fa-power-off" style="color: #000000; margin-left: 1.5px;"></i>
        </button>
    </form>
</div>

  </ul>
</div>
<div class="menu-button" onclick="toggleSidebar()">&#9776;</div>
<script>
  function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("open");
  }
</script>

    <div class="d-flex justify-content-center align-items-center">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-door-open me-2" style="color: #000000;"></i>BIENVENIDO</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        </li>
      </ul>
    </div>
  </div>
</nav> 
          <button id="modoOscuroBtn" onclick="cambiarModo()"><i class="fa-solid fa-moon fa-bounce" style="color: #000000;"></i></button>
          <script>
          var modoOscuro = false;


          function cambiarModo() {
          var boton = document.getElementById("modoOscuroBtn");


          if (modoOscuro) {
          document.body.style.backgroundColor = "white";
          document.body.style.color = "#060B12";
          boton.innerHTML = '<i class="fa-solid fa-sun fa-bounce" style="color: #000000;"></i>';
          modoOscuro = false;
          } else {
          document.body.style.backgroundColor = "#060B12";
          document.body.style.color = "white";
          boton.innerHTML = '<i class="fa-solid fa-moon fa-bounce" style="color: #000000;"></i>';
          modoOscuro = true;
          }
          }
          </script>


          <style>
          #modoOscuroBtn {
          position: relative;
          left: 31cm;
          top: -1.1cm;
          width: 80px;
          height: 30px;
          border-radius: 15px;
          background-color: transparent;
          transition: background-color 0.3s ease;
          }


          #modoOscuroBtn:focus {
          outline: none;
          }


          #modoOscuroBtn:hover {
          cursor: pointer;
          background-color: #ccc;
          }


          #modoOscuroBtn:active {
          background-color: #aaa;
          }
          </style>






          <div class="container-fluid row">
          <div class="col-10 p-5" method="POST" style="margin: center;">
          <div class="container">
          <div style="position: relative; top: 20px;">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">
          <i class="fa-solid fa-user-plus" style="color: #ffffff;"></i> Agregar Usuario
          </button>
          </div>




          <div style="position: relative; left: 19cm; top: -8px;">
          <input class="form-control-sm col-4 col-sm-3 me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
          </div>




          </div>



    <!-- Modal Agregar -->
    <div class="modal fade" id="agregarUsuarioModal" tabindex="-1" aria-labelledby="agregarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="text-center text-secondary"><i class="fa-solid fa-users-between-lines me-2" style="color: #000000;"></i>REGISTRO DE EMPLEADOS</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form class="col-12 p-5" method="POST" action="../controller/registro_persona.php" >
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Nombre Completo</label>
                      <input type="text" class="form-control" id="nombre" name="nombre">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Cedula</label>
                      <input type="text" class="form-control" id="cedula" name="cedula">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Usuario</label>
                      <input type="text" class="form-control" id="usuario" name="usuario">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-key me-2"></i>Contraseña</label>
                      <input type="text" class="form-control" id="contraseña" name="contraseña">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-phone me-2" style="color: #000000;"></i>Telefono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope-open-text me-2" style="color: #000000;"></i>Correo</label>
                      <input type="text" class="form-control" id="correo" name="correo">
                  </div>
                  <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user-tag me-2"></i>Cargo</label>
                        <select class="form-control" id="id_cargo" name="id_cargo">
                            <?php
                            // Consultar los cargos disponibles en la base de datos
                            $query = "SELECT * FROM cargo";
                            $result = mysqli_query($conexion, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" value="agregar" class="btn btn-success" name="agregar">Agregar</button>
              </form>

            
                </div>
            </div>
        </div>
    </div>
    
    



<!-- Modal Actualizar-->
<div class="modal fade" id="modificarUsuarioModal" tabindex="-1" aria-labelledby="modificarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="text-center text-secondary"><i class="fa-solid fa-users-between-lines me-2" style="color: #000000;"></i>MODIFICAR EMPLEADO</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form class="col-12 p-5" method="POST">

                 <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
              



                  <div class="mb-3">
                    <label for="nombre" class="form-label"><i class="fa-solid fa-user me-2"></i>Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"> 
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Cedula</label>
                      <input type="text" class="form-control" id="cedula" name="cedula">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Usuario</label>
                      <input type="text" class="form-control" id="usuario" name="usuario">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-key me-2"></i>Contraseña</label>
                      <input type="text" class="form-control" id="contraseña" name="contraseña">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-phone me-2" style="color: #000000;"></i>Telefono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope-open-text me-2" style="color: #000000;"></i>Correo</label>
                      <input type="text" class="form-control" id="correo" name="correo">
                  </div>
                  <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user-tag me-2"></i>Cargo</label>
                        <select class="form-control" id="id_cargo" name="id_cargo">
                            <?php
                            // Consultar los cargos disponibles en la base de datos
                            $query = "SELECT * FROM cargo";
                            $result = mysqli_query($conexion, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                

                    <button type="submit" class="btn btn-warning" name="btnmodificar"><i class="fa-solid fa-pen-to-square me-2" style="color: #000000;"></i>Modificar</button>
              </form>

            
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    
    <table id="table1" class="table table-striped table-dark table_id custom-table">

  
                    <thead>
                        <tr>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>ID</th>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>Nombre</th>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>Cedula</th>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>Usuario</th>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>Contraseña</th>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>Telefono</th>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>Correo</th>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>Cargo</th>
                        <th scope="col" class="text-center align-middle"><i class="fa-solid fa-sliders" style="color: #005eff;"></i>
                        </th>
                        </tr>
                    </thead>
                <tbody>

                        <?php 
                        include "../controller/actualizar_persona.php";
                        include "../controller/registro_persona.php";
                        $sql = $conexion->query("SELECT usuarios.id, usuarios.nombre, usuarios.cedula,usuarios.usuario, usuarios.contraseña, usuarios.telefono, usuarios.correo, cargo.descripcion AS cargo FROM usuarios JOIN cargo ON usuarios.id_cargo = cargo.id");

                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <td><i class="fa-solid fa-id-card  me-2"></i><?= $datos->id ?></td>
                                <td><i class="fa-solid fa-circle-user  me-2" style="color: #ffffff;"></i><?= $datos->nombre ?></td>
                                <td><i class="fa-solid fa-id-card  me-2"></i><?= $datos->cedula ?></td>
                                <td><i class="fa-solid fa-circle-user  me-2" style="color: #ffffff;"></i><?= $datos->usuario ?></td>
                                <td><i class="fa-solid fa-lock  me-2" style="color: #000000;"></i><?= $datos->contraseña ?></td>
                                <td><i class="fa-solid fa-phone  me-2" style="color: #ffffff;"></i><?= $datos->telefono ?></td>
                                <td><i class="fa-solid fa-envelope me-2" style="color: #ffffff;"></i><?= $datos->correo ?></td>
                                <td><i class="fa-solid fa-user-tag me-2"></i><?= $datos->cargo ?></td>
                                <td>
                                <button class="btn btn-warning btn-sm editar-btn" data-bs-toggle="modal" data-bs-target="#modificarUsuarioModal" data-id="<?php echo $row['id']; ?>">
                                  <i class="fa-solid fa-user-edit"></i>
                                </button>
                                <a href="../views/gerente.php?id=<?= $datos->id ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-user-xmark me-2"></i></a>                                </td> 
                              </tr>
                        <?php } ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              <button onclick="previousTable()" class="btn">Anterior</button>
              <button onclick="nextTable()" class="btn">Siguiente</button>
            </div>
        </div>
</div>

<script src="../js/buscador.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!--  PARA TRAER LOS DATOS AL EDITAR-->
<script>
    var editarBtns = document.querySelectorAll('.editar-btn');

    editarBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var idUsuario = this.getAttribute('data-id');
            document.getElementById('id_usuario').value = idUsuario;
        });
    });
</script>

</body>
</html>