<?php 
include "../module/conexion.php";

 $id=$_GET["id"];

 $sql=$conexion->$query(" SELECT * FROM usuarios WHERE id=$id ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3052f95fc5.js" crossorigin="anonymous"></script>
    <title>modificar</title>
</head>
<body>
    <h3 class="text-center text-secondary" style="margin-top: 1cm;">
    <i class="fa-solid fa-users-between-lines me-2" style="color: #000000;"></i> MODIFICAR EMPLEADOS
    </h3>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <form class="col-4 p-5 mx-auto" method="POST" style="margin-left: -1cm;">
                <?php 
                include "../controller/modificar_producto.php";
                while ($datos=$sql->fetch_object()) { ?>


                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Nombre Completo</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
                </div>

                <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Cedula</label>
                      <input type="text" class="form-control" id="cedula" name="cedula" value="<?= $datos->cedula ?>">
                  </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user me-2"></i>Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?= $datos->usuario ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-key me-2"></i>Contraseña</label>
                    <input type="text" class="form-control" name="contraseña" value="<?= $datos->contraseña ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-phone me-2" style="color: #000000;"></i>Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?= $datos->telefono ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope-open-text me-2" style="color: #000000;"></i>Correo</label>
                    <input type="text" class="form-control" name="correo" value="<?= $datos->correo ?>">
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
                


                    <button type="submit" class="btn btn-warning" name="btnmodificar"><i class="fa-solid fa-pen-to-square me-2" style="color: #000000;"></i>Modificar</button>
            </form>
</body>
</html>