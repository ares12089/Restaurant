<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3052f95fc5.js" crossorigin="anonymous"></script>
    <title>Gerente</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
<li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
<li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
<li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
<li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
<div class="text-center" style="margin-top: -120px;">
  <img src="<?php echo '../img/wallhaven-y86k3l.jpg'; ?>" alt="" class="rounded-circle img-thumbnail mx-auto" style="width: 130px; height: 130px; border: 2px solid rgb(141, 141, 141);">
</div>

  <ul>
  <div style="text-align: center;">
  <li><h4>MENU<i class="fa-solid fa-martini-glass-citrus ms-2" style="color: #000000;"></i></h4></li>
    </div>
    <li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
    <li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
    <div style="text-align: center; font-family: 'Times New Roman', Times, serif;">
    <a href="menu.php">AGREGAR PLATOS<i class="fa-solid fa-utensils ms-2" style="color: #000000;"></i></a>
    </div>
    <li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
    <li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
    <li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
    <li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>
    <li><a href="#" class="text-aling-center"><i class="fa-solid fa-power-off" style="color: #f9f9f9; margin-left: 1.5px;"></i></a></li>

    <div style="display: flex; justify-content: center;">
    <a href="#" class="btn btn-small" style="background-color: #f9f9f9;">
        <span class="me-1">Cerrar Sesión</span>
        <i class="fa-solid fa-power-off" style="color: #000000; margin-left: 1.5px;"></i>
    </a>
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


<div class="container-fluid row">

        <div class="col-10 p-5" method="POST" style="margin: center;">
        <div class="container">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal"><i class="fa-solid fa-user-plus" style="color: #ffffff;"></i>  Agregar Usuario</button>
    </div>
    <i class="fa-solid fa-thumbtack me-2" style="color: #ffffff;"></i>

    <!-- Modal -->
    <div class="modal fade" id="agregarUsuarioModal" tabindex="-1" aria-labelledby="agregarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="text-center text-secondary"><i class="fa-solid fa-users-between-lines me-2" style="color: #000000;"></i>REGISTRO DE EMPLEADOS</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <form class="col-4 p-5" method="POST" style="margin-left: -1cm;">
                <?php 
                include "../controller/registro_persona.php";
                include "../module/conexion.php";
                ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Nombre Completo</label>
                    <input type="text" class="form-control" name="nombre">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Usuario</label>
                    <input type="text" class="form-control" name="usuario">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-key me-2"></i>Contraseña</label>
                    <input type="text" class="form-control" name="contrasena">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-phone me-2" style="color: #000000;"></i>Telefono</label>
                    <input type="text" class="form-control" name="telefono">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope-open-text me-2" style="color: #000000;"></i>Correo</label>
                    <input type="text" class="form-control" name="correo">
                </div>

                <!--<div class="mb-3">
                <label for="disabledSelect" class="form-label" name="cargo"><i class="fa-solid fa-user-tag me-2"></i>Establesca cargo</label>
                <select id="disabledSelect" class="form-select">
                    <option>Chef</option>
                    <option>Cajero</option>
                </select>
                </div>-->
                    <button type="submit" class="btn btn-success" name="btnregistrar" value="ok"><i class="fa-solid fa-user-plus me-2"></i>Registrar</button>
            </form>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
            <table class="table w-100">
                
                    <thead class="bg-info">
                        <tr>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>ID</th>
                        <th scope="col"><i class="fa-solid fa-thumbtack me-2" style="color: #1e60d2;"></i>Nombre</th>
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
                    //aqui se llamaran todos los registros de la bd
                    include "../module/conexion.php";
                    $sql=$conexion -> query(" SELECT * FROM usuarios");
                    //un while para recorrer todos los registros
                    while($datos=$sql->fetch_object()){ ?>

                        <tr>
                        <td><i class="fa-solid fa-id-card me-2"></i><?= $datos->id ?></td>
                        <td><i class="fa-solid fa-circle-user me-2"></i><?= $datos->nombre ?></td>
                        <td><i class="fa-solid fa-circle-user me-2"></i><?= $datos->usuario ?></td>
                        <td><i class="fa-solid fa-user-lock me-2"></i><?= $datos->contraseña ?></td>
                        <td><?= $datos->telefono ?></td>
                        <td><?= $datos->correo ?></td>
                        <td><i class="fa-solid fa-user-tag me-2"></i><?= $datos->id_cargo ?></td>
                        <td>
                        <a href="" class="btn btn-sm btn-warning"><i class="fa-solid fa-user-pen me-2"></i></a>
                        <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-user-xmark me-2"></i></a>
                        </td>
                        </tr>

                    <?php } 
                    ?>        
                </tbody>
            </table>
        </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>