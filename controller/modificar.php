<?php

include "../module/conexion.php";

$id = $_POST["id"];
$sql = $conexion->query(" select * from usuarios where id=$id ");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3052f95fc5.js" crossorigin="anonymous"></script>
    <title>Modificar</title>
</head>

<body>
    <h3 class="text-center text-secondary p-3"><i class="fa-solid fa-users-between-lines me-2" style="color: #000000;"></i>MODIFICAR EMPLEADO</h3>
    <form class="col-4 p-3 m-auto" method="POST">
        <input type="hidden" name="id" value="<?= $_POST["id"] ?>">
        <?php
        include "../controller/botonact.php";
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" value="<?= $datos->cedula ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $datos->usuario ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-key me-2"></i>Contraseña</label>
                <input type="text" class="form-control" id="contraseña" name="contraseña" value="<?= $datos->contraseña ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-phone me-2" style="color: #000000;"></i>Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $datos->telefono ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope-open-text me-2" style="color: #000000;"></i>Correo</label>
                <input type="text" class="form-control" id="correo" name="correo" value="<?= $datos->correo ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user-tag me-2"></i>Cargo</label>
                <select class="form-control" id="id_cargo" name="id_cargo" value="<?= $datos->id_cargo ?>">
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
        <?php } ?>



        <button type="submit" class="btn btn-warning" name="btnregistrar" value="ok"><i class="fa-solid fa-pen-to-square me-2" style="color: #000000;"></i>Modificar</button>
        <a href="../views/gerente.php" class="btn btn-danger">Volver</a>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</body>

</html>