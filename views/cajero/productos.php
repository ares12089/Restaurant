<?php include_once "headadmin.php" ?>
<?php
include_once "funciones.php";
$productos = obtenerProductos();
?>



<?php
// <button id="alertw">Abrir Alerta</button>

// echo '<script type="text/javascript">';
// echo 'Swal.fire({';
// echo '  title: "¡Alerta personalizada!",';
// echo '  text: "Este es un mensaje de alerta personalizado.",';
// echo '  icon: "warning",';
// echo '  confirmButtonText: "Aceptar"';
// echo '});';
// echo '</script>';
//<script>
//   document.getElementById("alertw").addEventListener("click", function() {
//        Swal.fire({
//            position: 'top',
//            icon: 'success',
//            title: 'Your work has been saved',
//            showConfirmButton: false,
//            timer: 1500
//        })
//    })
//</script>
?>

<!-- <h2 id="contador">0</h2>
<button onclick="aumentarContador()">Aumentar</button> -->

<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Platos existentes:</h2>
        <!-- Botón para abrir la ventana emergente -->
        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#agregarPlato">
            Nuevo&nbsp;<i class="fa fa-plus"></i>
        </button>
        <!-- Ventana emergente add -->
        <div class="modal fade" id="agregarPlato" tabindex="-1" aria-labelledby="agregarPlatoLabel" aria-hidden="true" style="z-index: 9999;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarPlatoLabel">Agregar Plato:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido -->
                        <!-- <div class="columns"> -->
                        <!-- <div class="column is-one-third"> -->
                        <h2 class="is-size-2">Nuevo producto</h2>
                        <form action="guardar_platos.php" method="post" enctype="multipart/form-data">
                            <div class="field">
                                <label for="nombre">Nombre</label>
                                <div class="control">
                                    <input required id="nombre" class="input" type="text" placeholder="Nombre" name="nombre">
                                </div>
                            </div>
                            <div class="field">
                                <label for="descripcion">Descripción</label>
                                <div class="control">
                                    <textarea name="descripcion" class="textarea" id="descripcion" cols="10" rows="5" placeholder="Descripción" required></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label for="nombre">Tipo</label>
                                <div class="control">
                                    <select required name="tipo" id="tipo">
                                        <option value="1">Hamburguesas</option>
                                        <option value="2">Pizzas</option>
                                        <option value="3">Alitas</option>
                                        <option value="4">Bebidas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label for="precio">Precio</label>
                                <div class="control">
                                    <input required id="precio" name="precio" class="input" type="number" placeholder="Precio">
                                </div>
                            </div>
                            <!-- img -->
                            <div class="field">
                                <label for="precio">Imagen</label>
                                <div class="control">
                                    <input type="file" name="imagen" id="imagen" required>
                                </div>
                            </div>
                            <!-- img -->
                            <!-- Contenido -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Guardar</button> -->
                        <button class="button is-success">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Ventana emergente add -->

        <style>
            
        #table1 {
          background-color: #ffffff;
          border-collapse: collapse;
          box-shadow: 0px 5px 10px -5px #333333;
        }

        #table1 th,
        #table1 td {
          border: none;
        }

        #table1 th {
          background-color: #ffffff;
          color: #000000;
          padding: 10px;
        }

        #table1 td {
          padding: 10px;
        }

        #table1 tr:nth-child(odd) {
          background-color: #f8f9fa;
        }

        #table1 tr:hover {
          background-color: #e9ecef;
        }

        </style>
        <table class="table custom-table" id="table1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>IMG</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto->nombre ?></td>
                        <td><?php echo '<img class="tbl_img" src="data:' . $producto->tipo . ';base64,' . base64_encode($producto->img) . '"/>' ?></td>
                        <td><?php echo $producto->descripcion ?></td>
                        <td><?php echo $producto->tipo ?></td>
                        <td>$<?php echo number_format($producto->precio, 2) ?></td>
                        <td>

                            <div class="btn-group" role="group" aria-label="Basic outlined example">

                                <form action="editv_plato.php" method="post">
                                    <input type="hidden" name="id_plato" value="<?php echo $producto->id ?>">
                                    <button class="btn btn-outline-primary m-2">
                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    </button>
                                </form>

                                <form action="eliminar_plato.php" method="post">
                                    <input type="hidden" name="id_plato" value="<?php echo $producto->id ?>">
                                    <button class="btn btn-outline-danger m-2">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    <?php } ?>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'pie.php' ?>