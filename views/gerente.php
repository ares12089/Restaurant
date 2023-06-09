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
    

    <h1 class="text-center p-3"><i class="fa-solid fa-user-tie"></i>GERENTE</h1>
<div class="container-fluid row">
            <form class="col-4 p-3" method="POST">
                <h3 class="text-center text-secondary"><i class="fa-solid fa-users"></i>REGISTRO DE EMPLEADOS</h3>
                <?php 
                include "../controller/registro_persona.php";
                include "../module/conexion.php";
                ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user"></i>Nombre Completo</label>
                    <input type="text" class="form-control" name="nombre">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user"></i>Usuario</label>
                    <input type="text" class="form-control" name="usuario">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-key"></i>Contraseña</label>
                    <input type="text" class="form-control" name="contrasena">
                </div>

                <div class="mb-3">
                <label for="disabledSelect" class="form-label" name="cargo"><i class="fa-solid fa-user-tag"></i>Establesca cargo</label>
                <select id="disabledSelect" class="form-select">
                    <option>Chef</option>
                    <option>Cajero</option>
                </select>
                </div>
                    <button type="submit" class="btn btn-success" name="btnregistrar" value="ok"><i class="fa-solid fa-user-plus"></i>Registrar</button>
            </form>
        <div class="col-8 p-4">
            <table class="table">
                    <thead class="bg-info">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Cargo</th>
                        <th scope="col"></th>
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
                        <td><i class="fa-solid fa-id-card"></i><?= $datos->id ?></td>
                        <td><i class="fa-solid fa-circle-user"></i><?= $datos->nombre ?></td>
                        <td><i class="fa-solid fa-circle-user"></i><?= $datos->usuario ?></td>
                        <td><i class="fa-solid fa-user-lock"></i><?= $datos->contraseña ?></td>
                        <td><i class="fa-solid fa-user-tag"></i><?= $datos->id_cargo ?></td>
                        <td>
                            <a href="" class="btn btn-small btn-warning"><i class="fa-solid fa-user-pen"></i>Editar</a>
                            <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-user-xmark"></i>Eliminar</a>
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