<?php 

 

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
    <form class="col-4 p-5 mx-auto" method="POST" style="margin-left: -1cm;">
                <?php 
                
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
               
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user-tag me-2"></i>Cargo</label>
                    <input type="number" class="form-control" name="cargo">
                </div>


                    <button type="submit" class="btn btn-success" name="btnregistrar"><i class="fa-solid fa-user-plus me-2"></i>Registrar</button>
            </form>
</body>
</html>