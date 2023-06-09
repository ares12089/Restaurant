<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>GERENTE</title>
            <script src="https://kit.fontawesome.com/3052f95fc5.js" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        </head>
        <body>
            
    <h1 class="text-center p-3">holaaaaa</h1>
<div class="container-fluid row"> 


     <form class="col-4 p-3" method="POST">
        <h3 class="text-center text-secondary">REGISTRO DE EMPLEADOS</h3>

            <?php
            include "../module/conexion.php";
            include "../controller/registro_persona.php";
            ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" name="nombre">
            </div>        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario">
            </div>  
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                <input type="text" class="form-control" name="contraseña">
            </div>  
            <div class="mb-3">
                <label for="disabledSelect" class="form-label" name="cargo">Cargo</label>
                <select id="disabledSelect" class="form-select">
                    <option>Chef</option>
                    <option>Cajero</option>

                </select>
             </div>
            <button type="submit" class="btn btn-success" name="btnregistrar" value="ok"><i class="fa-solid fa-user-plus p-1"></i>Registrar</button>

    </form>

<div class="col-4 p-3">


    <div class="col-4 p-3">
            <table class="table">
                <thead> 
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Cargo</th>

                    <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../module/conexion.php";
                    $sql=$conexion->query(" SELECT * from  usuario");
                    while($datos=$sql->fetch_object()){ ?>

                <tr>
                    <td><?= $datos->id ?></td>
                    <td><?= $datos->nombre ?></td>
                    <td><?= $datos->usuario ?></td>
                    <td><?= $datos->contraseña ?></td>
                    <td><?= $datos->id_cargo ?></td>

                    <!--BOTONES-->

                    <td>
                        <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="" class="btn btn-small btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                    </td>
                    
                </tr>                

                    <?php } 
                    ?>             


                </tbody>
            </table>
    </div>
</div>
</div>



     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        </body>
</html>



